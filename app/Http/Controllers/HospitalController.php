<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\BloodStock;
use App\Models\BloodType;
use App\Models\Hospital;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HospitalController extends Controller
{

    use UploadTrait;

    // Hospital List View
    public function index()
    {
        $hospitals = Hospital::orderBy('created_at', 'desc')->paginate(5);
        return view('hospitals.index')->with('hospitals', $hospitals);
    }

    public function hsptlbrowser()
    {
        $hospitals = Hospital::orderBy('created_at', 'desc')->paginate(5);
        return view('hospitals.index')->with('hospitals', $hospitals);
    }

    public function myhsptl()
    {
        $owner = Auth::user()->id;
        $data = Order::where('user_id', $owner)->first();

        $hospitals = Hospital::where('user_id', $owner)->orderBy('created_at', 'desc')->paginate(5);
        $hsptlorders = Order::where('user_id', $owner)->orderBy('created_at', 'desc')->paginate(5);

        if ($data == null) {
            $client = null;
        } else {
            $client = User::where('id', $data->user_id)->first();
        }

        return view('hospitals.myhsptl', compact('hospitals', 'client', 'hsptlorders'));
    }

    public function create()
    {
        return view('hospitals.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'hsptl_name' => 'required|max:100',
            'hsptl_category' => 'required|max:100',
            'hsptl_address' => 'required|max:255',
            'hsptl_city' => 'required|max:50',
            'hsptl_desc' => 'required|max:255',
            'hsptl_web' => 'required|max:255',
            'hsptl_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'hsptl_cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $newHsptl = new Hospital;

        $newHsptl->hsptl_name = $request->input('hsptl_name');
        $newHsptl->hsptl_category = $request->input('hsptl_category');
        $newHsptl->hsptl_address = $request->input('hsptl_address');
        $newHsptl->hsptl_city = $request->input('hsptl_city');
        $newHsptl->hsptl_desc = $request->input('hsptl_desc');
        $newHsptl->hsptl_web = $request->input('hsptl_web');

        // Check if a image has been uploaded
        if ($request->has('hsptl_logo')) {
            // Get image file
            $image = $request->file('hsptl_logo');
            // Make a image name based on user name and current timestamp
            $name = Str::slug(Auth::user()->name) . '_' . time();
            // Define folder path
            $folder = '/hsptl/images/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set image path in database to filePath
            $newHsptl->hsptl_logo = 'storage' . $filePath;
        }

        // Check if a image has been uploaded
        if ($request->has('hsptl_cover')) {
            // Get image file
            $image = $request->file('hsptl_cover');
            // Make a image name based on user name and current timestamp
            $name = Str::slug(Auth::user()->name) . '_' . time();
            // Define folder path
            $folder = '/hsptl/images/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set image path in database to filePath
            $newHsptl->hsptl_cover = 'storage' . $filePath;
        }

        $newHsptl->user_id = Auth::user()->id;
        $newHsptl->save();

        session()->flash('success', 'You have successfully added a Hospital.');

        return redirect(route('hospital.index'));
    }

    public function show($id)
    {
        $hospital = Hospital::find($id);

        $bloodstocks = BloodStock::where('hospital_id', $id)->groupBy(['blood_type_id'])
            ->selectRaw('sum(count) as count, blood_type_id')
            ->get();

        return view('hospitals.show', compact('hospital', 'bloodstocks'));
    }

    public function edit($id)
    {
        $hospital = Hospital::find($id);
        return view('hospitals.edit', compact('hospital'));
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'hsptl_name' => 'required|max:255',
            'hsptl_category' => 'required|max:255',
            'hsptl_address' => 'required|max:255',
            'hsptl_city' => 'required',
            'hsptl_desc' => 'required',
            'hsptl_web' => 'required'
        ]);

        $hospitals = Hospital::find($id);
        $hospitals->hsptl_name = $request->input('hsptl_name');
        $hospitals->hsptl_category = $request->input('hsptl_category');
        $hospitals->hsptl_address = $request->input('hsptl_address');
        $hospitals->hsptl_city = $request->input('hsptl_city');
        $hospitals->hsptl_desc = $request->input('hsptl_desc');
        $hospitals->hsptl_web = $request->input('hsptl_web');
        $hospitals->updated_by = Auth::user()->id;
        $hospitals->save();

        return redirect()->route('admin.hsptl.manage')
            ->with('success', 'Hospital details updated successfully');
    }

    public function destroy($id)
    {
        Hospital::find($id)->delete();
    }
}
