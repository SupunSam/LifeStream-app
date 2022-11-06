<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BloodStock;
use App\Models\BloodType;
use App\Models\Event;
use App\Models\Hospital;
use App\Models\UserRequest;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function dashboard(Request $request)
    {
        return view('admin.dashboard');
    }

    public function hsptlsmanage()
    {
        $hospitals = Hospital::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.hsptls.manage')->with('hospitals', $hospitals);
    }

    public function eventsmanage()
    {
        $events = Event::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.events.manage')->with('events', $events);
    }

    public function userrequestsmanage()
    {
        $userrequests = UserRequest::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.userrequests.manage')->with('userrequests', $userrequests);
    }

    public function bloodmanage()
    {
        $bloodstocks = BloodStock::orderBy('created_at', 'desc')->paginate(5);
        $bloodtypes = BloodType::all();
        return view('admin.blood.manage')->with('bloodstocks', $bloodstocks)->with('bloodtypes', $bloodtypes);
    }
}
