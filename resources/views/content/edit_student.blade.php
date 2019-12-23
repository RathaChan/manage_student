@extends('dashboard.master')
@section('title', 'edit student')

@section('content')
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Update Student</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form role="form" action="/students/{{$student->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Student Code" autocomplete="off" name="student_code" value="{{$student->student_code}}">
                            @error('student_code')<p style="color: red">{{$message}}</p>@enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="image" autocomplete="off" name="image" value="{{$student->image}}">
                            @error('image')<p style="color: red">{{$message}}</p>@enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="First Name" autocomplete="off" name="first_name" value="{{$student->first_name}}">
                            @error('first_name')<p style="color: red">{{$message}}</p>@enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Last Name" autocomplete="off" name="last_name" value="{{$student->last_name}}">
                            @error('last_name')<p style="color: red">{{$message}}</p>@enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <!-- text input -->
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Gender" autocomplete="off" name="gender" value="{{$student->gender}}">
                            @error('gender')<p style="color: red">{{$message}}</p>@enderror
                        </div>
                </div>

                <div class="form-actions right">
                    <button class="btn btn-warning mr-1">
                        <i class="ft-x"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="la la-check-square-o"></i> Update
                    </button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
