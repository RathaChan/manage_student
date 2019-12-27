@extends('dashboard.master')
@section('title', 'edit student')
{{--@php(dd($student));--}}
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
                    <div class="edit-profile-photo">
                        <img id="image-upload" src="{{asset('/images/' . $student->image)}}" alt="" name="image">
                        <div class="change-photo-btn">
                            <div class="photoUpload">
                                <span><i class="fa fa-upload"></i> Upload Photo</span>
                                <input type="file" id="image" class="upload img-responsive" name="image"/>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="">Student Id:</label>
                            <input type="text" class="form-control" placeholder="Student Id" autocomplete="off" name="student_code" value="{{$student->student_code}}">
                            @error('student_code')<p style="color: red">{{$message}}</p>@enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="">First Name:</label>
                            <input type="text" class="form-control" placeholder="First Name" autocomplete="off" name="first_name" value="{{$student->first_name}}">
                            @error('first_name')<p style="color: red">{{$message}}</p>@enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Last Name:</label>
                            <input type="text" class="form-control" placeholder="Last Name" autocomplete="off" name="last_name" value="{{$student->last_name}}">
                            @error('last_name')<p style="color: red">{{$message}}</p>@enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="">Gender:</label>
                            <select name="gender" id="gender" class="form-control">
                                @foreach(['Male','Female'] as $gender)
                                <option {{$student->gender == $gender ? 'selected' : ''}}>{{$gender}}</option>
                                @endforeach
                            </select>
                            @error('gender')<p style="color: red">{{$message}}</p>@enderror
                        </div>
                    </div>
                </div>
                <div class="form-actions right">
                    <button class="btn btn-warning mr-1" type="button">
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

@section('pagescript')
    <script>
        $(document).ready(function () {
            $('#image').change(function () {
                //check if browser support all upload file feature
                if (!window.File && !window.FileReader && !window.FileList && !window.Blob)
                    alert('The File APIs are not fully supported in this browser.');

                if ($(this).get(0).files.length === 1) {
                    $('#removed_img').val(0);
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#image-upload').attr('src',e.target.result)
                    };
                    reader.readAsDataURL($(this).get(0).files[0]);
                }
            });
        });
    </script>
@endsection
