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
    public function editAttend(Attendance $attend, Students $student){
//    $attend = Attendance::with('students')->get();
        return view('content.edit_attend',compact('attend', 'student'));
    }

    public function index(Request $request)
    {
        if(isset($request->r))
        {
            $attendances = Attendance::where('reason','LIKE',"%$request->r%")->orWhere('status','LIKE',"%$request->r%")->get();
        }else {
            $attendances = Attendance::all();
        }
//        return view('content.attendance',compact('attendances'));
        $attends = Attendance::with('students')->get();
//        dd($attends);
        return view('content.attendance',compact('attends','attendances'));
    }
    public function index1()
    {
        $student = Students::all();
        return view('content.create_attendance',compact('student'));
    }
    public function getData(){

        return view('content.list_add');
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
        $params = $request->all();

        $attent_students = json_decode($params['attendent_student']);
        $attents = [];
        foreach ($attent_students as $attent_student){
            $attents[] = [
                        'date'       => date('Y-m-d',strtotime($attent_student->date)),
                        'status'     => $attent_student->status,
                        'reason'     => $attent_student->reason,
                        'student_id' => $attent_student->student_id
                ];
        }
        \App\Attendance::insert($attents);
        return back()->with('success','successfully');
//        dd($attent_students[0]->status);
//        return 'hello';
//        $data = $request->validate([
//            'date'=>'required',
//            'student_id'=>'required',
//            'status'=>'required',
//            'reason'=>'required',
//        ]);
//        if ($_POST['action'] == 'add'){
//return 'hello';
////            return view('content.list_add', compact('data'));
//        }else{
////            $data = $request->all();
////                    Attendance::create($data);
////        return redirect()->back();
//            return 'hi';
//
//        }

//        dd($request->all());
//        return 'hello';

//        Attendance::create($data);
//        return redirect(url('/students/attendance'));
//        return  view('content.list_add',compact('data'));
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
     * @param \Illuminate\Http\Request $request
     * @param Attendance $attend
     * @return void
     */
    public function update(Request $request,\App\Attendance $attend)
    {
        $params = $request->all();
//        dd($params);
        $attend->update($params);
        return redirect(url('/students/attendance'))->with('success','successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Attendance $attend
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Attendance $attend)
    {
        $attend->delete();
        return redirect('/students/attendance')->with('success','successfully');
    }
}
