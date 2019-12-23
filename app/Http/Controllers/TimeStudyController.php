<?php

namespace App\Http\Controllers;

use App\Students;
use App\Subject;
use App\TimeStudy;
use Illuminate\Http\Request;

class TimeStudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('timestudy.timestudy');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Students::all();
        $subjects = Subject::all();
//        dd($subjects);
        return view('timestudy.create',[
            'students'=> $students,
            'subjects'=> $subjects

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TimeStudy  $timeStudy
     * @return \Illuminate\Http\Response
     */
    public function show(TimeStudy $timeStudy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TimeStudy  $timeStudy
     * @return \Illuminate\Http\Response
     */
    public function edit(TimeStudy $timeStudy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TimeStudy  $timeStudy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TimeStudy $timeStudy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TimeStudy  $timeStudy
     * @return \Illuminate\Http\Response
     */
    public function destroy(TimeStudy $timeStudy)
    {
        //
    }
}
