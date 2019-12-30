<?php

namespace App\Http\Controllers;

use App\Score;
use App\Students;
use App\Subject;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scores =Score::whereHas('student')->with(['student','subject'])->get();

        session(['active_menu' => 'score']);
        return  view('score.index', compact('scores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::all();
        $students = Students::all();

        return view('score.create',[
            'subjects'=>$subjects,
            'students'=>$students,
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
        $params = $request->all();
//        dd($params);
        $score_students = json_decode($params['score_student']);
//        dd($score_students);
        $scores = [];
        foreach ($score_students as $score_student){
            $scores[] = [
               "homework"    => $score_student->homework,
               "mid_term"    => $score_student->midterm,
               "assignment"  => $score_student->assignment,
               "final"       => $score_student->final_score,
               "student_id"  => $score_student->student_id,
               "subject_id"  => $score_student->subject_id,
                "attendance" => $score_student->attendance,
            ];
        }
//        dd($scores);
        \App\Score::insert($scores);
        return back()->with('success','successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function show(Score $score)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function edit(Score $score)
    {
        $subjects = Subject::all();
        $students = Students::all();

        return view('score.edit',[
            'subjects'  => $subjects,
            'students'  => $students,
            'score'     => $score
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Score $score)
    {
        $params = $request->all();
//        dd($params);
//        $score_students = json_decode($params['score_student']);
////        dd($score_students);
//        $scores = [];
//        foreach ($score_students as $score_student){
//            $scores[] = [
//                "homework"    => $score_student->homework,
//                "mid_term"    => $score_student->midterm,
//                "assignment"  => $score_student->assignment,
//                "final"       => $score_student->final_score,
//                "student_id"  => $score_student->student_id,
//                "subject_id"  => $score_student->subject_id,
//                "attendance" => $score_student->attendance,
//            ];
//        }
//        dd($scores);
        $score->update($params);
//        dd($score);
        return redirect(url('/scores'))->with('success','successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function destroy(Score $score)
    {
        $score->detele();
        return redirect(url('/scores'))->with('success', ' successfully');
    }
}
