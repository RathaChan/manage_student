<?php

namespace App\Http\Controllers;

use App\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session(['active_menu' => 'list_subject']);
        $subjects = Subject::all();
        return view('subject.subject',compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subject.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'code'=>'required',
            'title'=>'required',
            'cost'=>'required',
            'description'=>'required',
            'action'=>'required',
        ]);
        Subject::create($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subject = Subject::all()->find($id);
        return view('subject.edit',compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        $data = $request->all();
        $subject->update($data);
//        dd($subject->update($data));
        return redirect('/subjects')->with('success', 'successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect('/subjects')->with('success','successfully');
    }
}
