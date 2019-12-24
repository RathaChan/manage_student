<?php

namespace App\Http\Controllers;

use App\Students;
use App\Subject;
use App\TimeStudy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TimeStudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session(['active_menu' => 'time_study']);
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
/*       Insert direct to database */
//        DB::table('timestudys')->insert([
//            'student_id'=>$request->student_name,
//            'subject_id'=>$request->subject,
//            'day'=>$request->day,
//            'status'=>$request->status,
//            'time_start'=>$request->time_start,
//            'time_end'=>$request->time_end,
//            'description'=>$request->description,
//        ]);
//        return redirect('/time_study');
        /*       Insert direct to database */
        $params = $request->all();
//        $stu_times = json_decode($params['student_time']);
//        dd(TimeStudy::create($params));
//         TimeStudy::create($params);
//         return redirect()->back();
////        dd($params);
//
//        $timeStudys = json_decode($params['time_study']);
//        dd(json_decode($params['time_study']));
//        $times = [];
//        foreach ($timeStudys as $time){
//            $times[] = [
//                'student_name'       =>  $time->student_id,
//                'subject'     => $time->subject_id,
//                'day'     => $time->day,
//                'time_start' => $time->time_start,
//                'time_end'     => $time->time_end,
//                'description' => $time->description
//            ];
//        }
//      dd(\App\TimeStudy::insert($times));
////        \App\TimeStudy::insert($times);
//        return back()->with('success','successfully');

//        $data = $request->validate([
//            'student_name'=>'required',
//            'subject'=>'required',
//            'day'=>'required',
//            'status'=>'required',
//            'time_start'=>'required',
//            'time_end'=>'required',
//            'description'=>'required',
//        ]);
//        TimeStudy::create($data);
//        return redirect()->back();
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
