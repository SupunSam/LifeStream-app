<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\UserRequest;
use Illuminate\Http\Request;

class UserRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function myrequests()
    {
        $user = Auth::user()->id;
        $reqdata = UserRequest::where('user_id', $user)->first();

        $userrequests = UserRequest::where('user_id', $user)->orderBy('created_at', 'desc')->paginate(5);

        return view('userrequests.myrequests', compact('userrequests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            $user = Auth::user()->id;
        } else {
            $user = 4;
        }
        return view('userrequests.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'usrrqst_user' => 'required',
            'usrrqst_email' => 'required',
            'usrrqst_request_type' => 'required',
            'usrrqst_desc' => 'required',
        ]);

        $newUserRequest = new UserRequest;

        $newUserRequest->user_id = $request->input('usrrqst_user');
        $newUserRequest->email = $request->input('usrrqst_email');
        $newUserRequest->request_type = $request->input('usrrqst_request_type');
        $newUserRequest->description = $request->input('usrrqst_desc');

        $newUserRequest->save();

        $user = Auth::user()->id;
        $reqdata = UserRequest::where('user_id', $user)->first();

        $userrequests = UserRequest::where('user_id', $user)->orderBy('created_at', 'desc')->paginate(5);

        return view('userrequests.myrequests', compact('userrequests'))->with('success', 'User Request Sent successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        UserRequest::find($id)->delete();
        $user = Auth::user()->id;
        $reqdata = UserRequest::where('user_id', $user)->first();

        $userrequests = UserRequest::where('user_id', $user)->orderBy('created_at', 'desc')->paginate(5);

        return view('userrequests.myrequests', compact('userrequests'))->with('error', 'User Request Deleted successfully.');
    }
}
