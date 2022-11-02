<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BloodStock;
use App\Models\BloodType;
use App\Models\Hospital;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function dashboard(Request $request)
    {
        return view('admin.dashboard');
    }

    public function hsptlmanage(Request $request)
    {
        $hospitals = Hospital::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.hsptl.manage')->with('hospitals', $hospitals);
    }

    public function bloodmanage(Request $request)
    {
        $bloodstocks = BloodStock::orderBy('created_at', 'desc')->paginate(5);
        $bloodtypes = BloodType::all();
        return view('admin.blood.manage')->with('bloodstocks', $bloodstocks)->with('bloodtypes', $bloodtypes);
    }
}
