<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Students;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Students::all();
        return view('content.attendance',compact('student'));
    }
    public function index1()
    {
        $student = Students::all();
        return view('content.create_attendance',compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.create_attendance');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
//        dd($request->all());
//        return 'hello';

//        Attendance::create($data);
//        return redirect(url('/students/attendance'));
        return  view('content.list_add',compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Attendance  $attendancce
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendancce)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Attendance  $attendancce
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendancce)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attendance  $attendancce
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendancce)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attendance  $attendancce
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendancce)
    {
        //
    }
}
