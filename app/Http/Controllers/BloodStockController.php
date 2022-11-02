<?php

namespace App\Http\Controllers;

use App\Models\BloodStock;
use App\Models\Hospital;
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
        return view('bloodstocks.create', compact('hospital'));
    }

    public function store(Request $request)
    {
        request()->validate([
            'bloodstock_name' => 'required|max:255',
            'bloodstock_group' => 'required|max:255',
            'bloodstock_source' => 'required|max:255',
            'bloodstock_count' => 'required'
        ]);

        $newBloodStock = new BloodStock;

        $newBloodStock->bloodstock_name = $request->input('bloodstock_name');
        $newBloodStock->bloodstock_group = $request->input('bloodstock_group');
        $newBloodStock->bloodstock_source = $request->input('bloodstock_source');
        $newBloodStock->bloodstock_count = $request->input('bloodstock_count');

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
