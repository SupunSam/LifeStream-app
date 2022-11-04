<?php

namespace App\Http\Controllers;

use App\Models\BloodStock;
use App\Models\BloodType;
use App\Models\Hospital;
use App\Models\Event;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BloodStockController extends Controller
{
    use UploadTrait;

    function __construct()
    {
        $this->middleware('permission:bloodstock-list|bloodstock-create|bloodstock-edit|bloodstock-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:bloodstock-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:bloodstock-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:bloodstock-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $bloodstocks = BloodStock::latest()->paginate(5);
        return view('bloodstocks.index', compact('bloodstocks'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $owner = Auth::user()->id;
        $hospital = Hospital::where('user_id', $owner)->first();
        $bldtypes['data'] = BloodType::orderby('id', 'asc')->select('id', 'bloodtype_name')->get();
        $events['data'] = Event::orderby('id', 'asc')->select('id', 'name')->get();
        return view('bloodstocks.create', compact('hospital', 'bldtypes', 'events'));
    }

    public function store(Request $request)
    {
        dd( $request->input('bldstk_hospital'));
        request()->validate([
            'bldstk_hospital' => 'required',
            'bldstk_event' => 'required',
            'bldstk_group' => 'required',
            'bldstk_source' => 'required|max:255',
            'bldstk_count' => 'required'
        ]);

        $newBloodStock = new BloodStock;

        $newBloodStock->hospital_id = $request->input('bldstk_hospital');
        $newBloodStock->event_id = $request->input('bloodstock_event');
        $newBloodStock->blood_type_id = $request->input('bldstk_group');
        $newBloodStock->source = $request->input('bldstk_source');
        $newBloodStock->bloodstock_count = $request->input('bldstk_count');

        $newBloodStock->user_id = Auth::user()->id;
        $newBloodStock->hospital_id = (Hospital::firstWhere('user_id', $newBloodStock->user_id))->id;
        $newBloodStock->save();

        return redirect()->route('hospital.show', $newBloodStock->hospital_id)
            ->with('success', 'BloodStock added successfully.');
    }

    public function show($id)
    {
        $bloodstock = BloodStock::find($id);
        return view('bloodstocks.show', compact('bloodstock'));
    }

    public function edit(BloodStock $bloodstock)
    {
        return view('bloodstocks.edit', compact('bloodstock'));
    }

    public function update(Request $request, BloodStock $bloodstock)
    {
        request()->validate([
            'bloodstock_group' => 'required|max:255',
            'bloodstock_name' => 'required|max:255',
            'bloodstock_source' => 'required|max:255',
            'bloodstock_count' => 'required'
        ]);

        $bloodstock->update($request->all());

        return redirect()->route('bloodstocks.index')
            ->with('success', 'BloodStock updated successfully');
    }

    public function destroy(BloodStock $bloodstock)
    {
        $bloodstock->delete();

        return redirect()->route('bloodstocks.index')
            ->with('success', 'BloodStock deleted successfully');
    }
}
