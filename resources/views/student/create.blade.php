@extends('dashboard.master')
@section('title', 'create student')

@section('content')
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Create Student</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form role="form" action="{{url('students')}}" method="POST" enctype="multipart/form-data" class="md-form">
                {{ csrf_field() }}
                <div class="row">
                    <div class="edit-profile-photo">
                        <img id="image-upload" src="/images/1298461.png" alt="">
                        <div class="change-photo-btn">
                            <div class="photoUpload">
                                <span><i class="fa fa-upload"></i> Upload Photo</span>
                                <input type="file" id="image" class="upload img-responsive" name="image" style="border: 1"/>
                            </div>
                        </div>
                    </div>
                </div>
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
                        <!-- text input -->
                        <div class="form-group">
                            <label for="">First Name:</label>
                            <input type="text" class="form-control" placeholder="First Name" autocomplete="off" name="first_name" value="{{old('first_name')}}">
                            @error('first_name')<p style="color: red">{{$message}}</p>@enderror
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Last Name:</label>
                            <input type="text" class="form-control" placeholder="Last Name" autocomplete="off" name="last_name" value="{{old('last_name')}}">
                            @error('last_name')<p style="color: red">{{$message}}</p>@enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Gender:</label>
                            <select name="gender" id=""  class="form-control" >
                                <option value="Male" class="form-control">Male</option>
                                <option value="Female" class="form-control">Female</option>

                            </select>
                            @error('gender')<p style="color: red">{{$message}}</p>@enderror
                        </div>
                    </div>
                </div>
                <div class="form-actions right">
                    <a href="{{url('/students')}}"><button class="btn btn-warning mr-1" type="button">
                        <i class="ft-x"></i> Cancel
                    </button>
                    </a>
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
