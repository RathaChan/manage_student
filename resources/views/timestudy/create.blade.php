@extends('dashboard.master')
@section('title', 'create timestudy')
@section('content')
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Create subject</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form role="form" action="{{url('/time_study')}}" method="POST" enctype="multipart/form-data" id="form_summit">
                {{ csrf_field() }}
{{--                <input type="hidden" name="student_time" value="">--}}
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="">Student Name: </label>
                            <select name="student_name" id="" class="field-search">
                                @foreach($students as $student)
                                <option value="{{$student->id}}">{{$student->first_name .' '. $student->last_name}}</option>
                                @endforeach
                            </select>
                            @error('student_name')<p style="color: red">{{$message}}</p>@enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Subject: </label>
                            <select name="subject" id="" class="field-search">
                                @foreach($subjects as $subject)

                                    <option value="{{$subject->id}}">{{$subject->title}}</option>
                                @endforeach
                            </select>
                            @error('subject')<p style="color: red">{{$message}}</p>@enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Day: </label>
                            <select name="day" id="" class="field-search">
                                <option value="monday">Monday</option>
                                <option value="tuesday">Tuesday</option>
                                <option value="wednesday">Wednesday</option>
                                <option value="thursday">Thursday</option>
                                <option value="friday">Friday</option>
                                <option value="saturday">Saturday</option>
                                <option value="sunday">Sunday</option>
                            </select>
                            @error('day')<p style="color: red">{{$message}}</p>@enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Status: </label>
                            <select name="status" id="" class="field-search">
                                <option value="morning">Morning</option>
                                <option value="afternoon">Afternoon</option>
                                <option value="evening">Evening</option>
                            </select>
                            @error('subject')<p style="color: red">{{$message}}</p>@enderror
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="">Time Start</label>
                            <input type="time" class="form-control" placeholder="time start" autocomplete="off" name="time_start" value="{{old('time_start')}}">
                            @error('time_start')<p style="color: red">{{$message}}</p>@enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Time End</label>
                            <input type="time" class="form-control" placeholder="time end" autocomplete="off" name="time_end" value="{{old('time_end')}}">
                            @error('time_end')<p style="color: red">{{$message}}</p>@enderror
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea type="text" class="form-control" autocomplete="off" name="description">
                            </textarea>
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

@section('pagescript')
    <script type="text/javascript">
        $(document).ready(function () {

            $('#form_summit').submit(function () {
                $("input[name='student_time']").val(JSON.stringify(data));
            });
        });


    </script>
@endsection

