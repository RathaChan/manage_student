
@extends('dashboard.master')
@section('title', 'scores create')
@section('content')
    {{--    @php(dd($students));--}}
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">edit score</h3>
        </div>
        <form class="form-horizontal" method="POST" action="{{url('/scores/'.''.$score->id)}}" id="score_form">
            @csrf
            @method('put')
{{--            <input type="hidden" name="score_student">--}}
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="">Student Name: </label>
                            <select name="student_id" id="student_id" class="form-control" autocomplete="off">
                                @foreach($students as $student)
                                    <option value="{{$student->id}}">{{$student->first_name .' '.$student->last_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Subject: </label>
                            <select name="subject_id" id="subject_id" class="form-control" autocomplete="off">
                                @foreach($subjects as $subject)
                                    <option value="{{$subject->id}}">{{$subject->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-10 col-sm offset-2 ">
                    <label for="" >Scores:</label> <hr>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Attendance:</label>
                        <div class="col-sm-5">
                            <input type="text" name="attendance" id="attendance" class="form-control " placeholder="attendance" autocomplete="off" value="{{$score->attendance}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Homework:</label>
                        <div class="col-sm-5">
                            <input type="text" name="homework" id="homework" class="form-control " placeholder="homework" autocomplete="off" value="{{$score->homework}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Midterm:</label>
                        <div class="col-sm-5">
                            <input type="text" name="mid_term" id="midterm" class="form-control " placeholder="midterm" autocomplete="off" value="{{$score->mid_term}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Assignment:</label>
                        <div class="col-sm-5">
                            <input type="text" name="assignment"  id="assignment" class="form-control " placeholder="assignment" autocomplete="off" value="{{$score->assignment}}">

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Final:</label>
                        <div class="col-sm-5">

                            <input type="text" name="final" id="final_score" class="form-control " placeholder="final" autocomplete="off" value="{{$score->final}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-info" id="btn-add" name="btn_addData">Update</button>
                <a href="{{url('/scores')}}"> <button type="button" class="btn btn-primary float-right">Cancel</button></a>
            </div>
        </form>
    </div>


@endsection







