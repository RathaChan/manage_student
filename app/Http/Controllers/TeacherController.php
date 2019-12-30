<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        session(['active_menu' => 'teacher']);
        if(isset($request->s))
        {
            $teachers = Teacher::where('first_name','LIKE',"%$request->s%")->orWhere('last_name','LIKE',"%$request->s%")
                ->orWhere('gender','LIKE',"$request->s%")->get();
        }else {
            $teachers = Teacher::all();        }
        return view('teacher.index',[
            'teachers'=>$teachers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $params = $request->all();
//        dd($params);
        $data = $request->validate([
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'first_name'=>'required',
            'last_name'=>'required',
            'gender'=>'required',
            'dob'=>'required',
            'address'=>'required',
            'education'=>'required',
            'salary'=>'required',
            'action'=>'required',
            'code'=>'required',
            'email'=>'required',
        ]);

        $data['image'] = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $data['image'] );
//        dd($data);
       Teacher::insert($data);
        return redirect(url('teachers'))->with('success', 'successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        return view('teacher.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        $datas = $request->all();
        if (isset( $datas['image'])){
        $datas['image'] = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $datas['image'] );
        }
       // dd($datas);
        $teacher->update($datas);
        return redirect(url('/teachers'))->with('success', 'successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect(url('/teachers'))->with('success', 'successfully');

    }
}
