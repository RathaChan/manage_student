<?php

namespace App\Http\Controllers;

use App\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Url;
use Symfony\Component\Console\Input\Input;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset($request->s))
        {
            $students = Students::where('first_name','LIKE',"%$request->s%")->orWhere('last_name','LIKE',"%$request->s%")
                ->orWhere('gender','LIKE',"$request->s%")->get();
        }else {
            $students = Students::all();
        }
        return view('content.list', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'student_code'=>'required',
            'image'=>'required',
            'first_name'=>'required',
            'last_name'=>'required',
            'gender'=>'required',
        ]);
//        DB::table('students')->insert($data);
//        dd($data);
         Students::create($data);
        return redirect('students/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Students $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Students $student)
    {
        return view('content.edit_student',compact('student'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Students $student)
    {
        $params = $request->all();
//        dd($params);
        $student->update($params);
        return redirect('/students')->with('success','successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Students $student)
    {
        $student->delete();
        return redirect('/students')->with('success','successfully');
    }
}
