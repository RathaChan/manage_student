@extends('dashboard.master')
@section('title', 'create student')

@section('content')
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Create Student</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form role="form" action="{{url('students')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="">Student Id:</label>
                            <input type="text" class="form-control" placeholder="Student Id" autocomplete="off" name="student_code" value="{{old('student_code')}}">
                            @error('student_code')<p style="color: red">{{$message}}</p>@enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Image:</label>
                            <input type="text" class="form-control" placeholder="image" autocomplete="off" name="image" value="{{old('image')}}">
                            @error('image')<p style="color: red">{{$message}}</p>@enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="">First Name:</label>
                            <input type="text" class="form-control" placeholder="First Name" autocomplete="off" name="first_name" value="{{old('first_name')}}">
                            @error('first_name')<p style="color: red">{{$message}}</p>@enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Last Name:</label>
                            <input type="text" class="form-control" placeholder="Last Name" autocomplete="off" name="last_name" value="{{old('last_name')}}">
                            @error('last_name')<p style="color: red">{{$message}}</p>@enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="">Gender:</label>
                            <input type="text" class="form-control" placeholder="Gender" autocomplete="off" name="gender" value="{{old('gender')}}">
                            @error('gender')<p style="color: red">{{$message}}</p>@enderror
                        </div>
                    </div>
                </div>

                <div class="form-actions right">
                    <button class="btn btn-warning mr-1">
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
