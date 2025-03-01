<?php

namespace App\Http\Controllers;

use App\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Url;
use Symfony\Component\Console\Input\Input;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        session(['active_menu' => 'list_student']);
        if(isset($request->s))
        {
            $students = Students::where('first_name','LIKE',"%$request->s%")->orWhere('last_name','LIKE',"%$request->s%")
                ->orWhere('gender','LIKE',"$request->s%")->get();
        }else {
            $students = Students::all();
        }
        return view('student.list', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        session(['active_menu' => 'create_student']);
        return view('student.create');
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
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'first_name'=>'required',
            'last_name'=>'required',
            'gender'=>'required',
        ]);
        $data['image'] = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $data['image'] );

//        DB::table('students')->insert($data);
//        dd($data);
         Students::create($data);
        return redirect('students/create')->with('success', 'successfully');
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

        return view('student.edit_student',compact('student'));

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
        $data = $request->all();
        if (isset($data['image'])){
            $data['image'] = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $data['image'] );
        }

//        dd($data['image']);
        $student->update($data);
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
