<?php

namespace App\Http\Controllers;

use App\Students;
use App\Subject;
use App\TimeStudy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\VarDumper\Dumper\DataDumperInterface;

class TimeStudyController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $time_studys = TimeStudy::whereHas('students')->with(['students','subjects'])->get();
//        dd($time_studys);
        session(['active_menu' => 'time_study']);
        return view('timestudy.timestudy', [
            'time_studys'=> $time_studys,
        ]);
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

    function hoursToMinutes2($hours_base)
    {
        $hours = 0;
        $minutes = 0;

        if (substr($hours_base, 0, 2) < 10) {
            $hours_base = "0" . $hours_base;
        }

        $hours_sample = substr($hours_base, 0, 5);
        if (strpos($hours_sample, ':') !== false) {
            // Split hours and minutes.
            list($hours, $minutes) = explode(':', $hours_sample);
        }
        $ampm = substr($hours_base, -2);
        if ((strtoupper($ampm) == "PM") && $hours < 12) {
            $hours += 12;
        }

        if (substr($hours_base, 0, 2) == "12" && substr($hours_base, -2) == "AM") {
            $hours = 0;
        }

        return (int) $hours * 60 + (int) $minutes;
    }
    public function store(Request $request)
    {
        $params = $request->all();
        $params['time_start'] = $this->hoursToMinutes2($params['time_start']);
        $params['time_end'] = $this->hoursToMinutes2($params['time_end']);
        dd($params);
        \App\TimeStudy::create($params);
        return redirect('/time_study')->with('success','successfully');
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
        /*       Insert direct to database */


//        \App\TimeStudy::create([
//            'student_id' => $params['student_id'],
//            'subject_id' => $params['subject_id'],
//            'day' => $params['day'],
//            'status' => $params['status'],
//            'time_start' => $params['time_start'],
//            'time_end' => $params['time_end'],
//            'description' => $params['description'],
//        ]);


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
    public function edit( TimeStudy $time_study)
    {
//        dd($time_study);
//        $time_study = DB::table('timestudys')->find($time_study);
        $time_studys = TimeStudy::whereHas('students')->with(['students','subjects'])->get();
//        dd($time_study->time_start);
        $time_study->time_start = date("H:i", strtotime($time_study->time_start));
        $time_study->time_end   = date("H:i", strtotime($time_study->time_end));

        return view('timestudy.edit',[
            'time_study' => $time_study,
            'time_studys'=> $time_studys
        ] );
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
        $params = $request->all();
        $params['time_start'] = $this->hoursToMinutes2($params['time_start']);
        $params['time_end'] = $this->hoursToMinutes2($params['time_end']);

        $timeStudy->update($params);
        return redirect('/time_study')->with('success','successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TimeStudy  $timeStudy
     * @return \Illuminate\Http\Response
     */
    public function destroy(TimeStudy $timeStudy)
    {
        $timeStudy->delete();
        return redirect('/time_study')->with('success','successfully');
    }
}
