@extends('dashboard.master')
@section('title', 'edit time_study')
@section('content')
{{--@php(dd($time_studys ));--}}
    @if (session('success'))
        <div class="alert alert-success ">
            {{ session('success') }}
        </div>
    @endif
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title"> edit time_study</h3>
        </div>
        @foreach($time_studys as $time_study)
            <div class="card-body">
                <form role="form" action="{{url('/time_study/'.''.$time_study->id)}}" method="POST" enctype="multipart/form-data" id="form_summit">
                    {{ csrf_field() }}
                    @method('PUT')
                    <input type="hidden" name="student_time" value="">
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label for="">Student Name: </label>
                                <select name="student_id" id="student_name" class="field-search">

                                    <option class="col-sm-9" value="{{$time_study->students->id}}">{{$time_study->students->first_name .' '.$time_study->students->last_name}}</option>
                                    @endforeach
                                </select>
                                @error('student_name')<p style="color: red">{{$message}}</p>@enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Subject: </label>
                                <select name="subject_id" id="subject" class="field-search">

                                    <option value="{{$time_study->subjects->id}}">{{$time_study->subjects->title}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Day: </label>
                                <select name="day" id="day" class="field-search">
                                    @foreach([
                                        "Monday",
                                        "Tuesday",
                                        "Wednesday",
                                        "Thursday",
                                        "Friday",
                                        "Saturday",
                                        "Sunday",
                                    ] as $dataDay)
                                        <option {{$time_study->day == $dataDay ? 'selected' : '' }}>{{$dataDay}}</option>
                                    @endforeach


                                </select>
                                @error('day')<p style="color: red">{{$message}}</p>@enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Status: </label>
                                <select name="status" id="status" class="field-search">
                                    @foreach(["Morning", "Afternoon","Evening"] as $status)
                                        <option {{$time_study->status == $status ? 'selected' : '' }}>{{$status}}</option>
                                    @endforeach
                                </select>
                                @error('status')<p style="color: red">{{$message}}</p>@enderror
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label for="">Time Start</label>
                                <input type="time" class="form-control" placeholder="time start" autocomplete="off" name="time_start"  id="time_start" value="{{$time_study->time_start}}">
                                @error('time_start')<p style="color: red">{{$message}}</p>@enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Time End</label>
                                <input type="time" class="form-control" placeholder="time end" autocomplete="off" name="time_end" value="{{$time_study->time_end}}" id="time_end">
                                @error('time_end')<p style="color: red">{{$message}}</p>@enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea class="form-control" autocomplete="off" name="description"  id="description" placeholder="............"> {{$time_study->description}}</textarea>
                                @error('description')<p style="color: red">{{$message}}</p>@enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-actions right">
                        <button class="btn btn-warning mr-1" type="button">
                            <i class="ft-x"></i> Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="la la-check-square-o"></i> Save
                        </button>
                    </div>





                </form>
            </div>
            <!-- /.card-body -->
    </div>
@endsection





