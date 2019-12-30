@extends('dashboard.master')
@section('title', 'edit teacher')
@section('content')

    @if (session('success'))
        <div class="alert alert-success ">
            {{ session('success') }}
        </div>
    @endif

    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Update Teacher</h3>

        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{url('/teachers/'.''.$teacher->id)}}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="edit-profile-photo">
                    <img id="image-summit" src="{{asset('/images/' . $teacher->image)}}" alt="" name="image">
                    <div class="change-photo-btn">
                        <div class="photoUpload">
                            <span><i class="fa fa-upload"></i> Upload Photo</span>
                            <input type="file" id="image" class="upload img-responsive" name="image" style="border: 1" value=""/>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="">Teacher Id:</label>
                        <input type="text" name="code" placeholder="teacher id" class="form-control" autocomplete="off" value="{{$teacher->code}}">
                    </div>
                    <div class="col-sm-6">
                        <label for="">First Name</label>
                        <input type="text" name="first_name" placeholder="first name" class="form-control" autocomplete="off" value="{{$teacher->first_name}}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="">Last Name:</label>
                        <input type="text" name="last_name" placeholder="last name" class="form-control" autocomplete="off" value="{{$teacher->last_name}}">
                    </div>
                    <div class="col-sm-6">
                        <label for="">Gender:</label>
                        <select name="gender" id="" class="form-control">
                            @foreach(['Male', 'Female'] as $gender)
                            <option {{$teacher->gender == $gender ? 'selected' : ''}}>{{$gender}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="">Date of Birth:</label>
                        <input type="date" name="dob" placeholder="date of birth" class="form-control" autocomplete="off" value="{{$teacher->dob}}">
                    </div>
                    <div class="col-sm-6">
                        <label for="">Education:</label>
                        <input type="text" name="education" placeholder="education" class="form-control" autocomplete="off" value="{{$teacher->education}}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="">Email:</label>
                        <input type="email" name="email" placeholder="email" class="form-control" autocomplete="off" value="{{$teacher->email}}" >
                    </div>
                    <div class="col-sm-6">
                        <label for="">Salary:</label>
                        <input type="text" name="salary" placeholder="salary" class="form-control" autocomplete="off" value="{{$teacher->salary}}" >
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="" class="text-center">Address:</label>
                        <textarea type="text" name="address" placeholder="address" class="form-control" autocomplete="off" value="" >{{$teacher->address}}
                        </textarea>
                    </div>
                    <div class="col-sm-12" >
                        <label for="" class="text-center">Status:</label>
                        <select name="action" id="" class="form-control">
                           @foreach(['Enable', 'Disable'] as $status)
                            <option {{$teacher->action == $status ? 'selected' : '' }}>{{$status}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="summit" class="btn btn-info">Update</button>
                <a href="{{url('/teachers')}}"><button type="button" class="btn btn-success float-right" >Cancel</button></a>
            </div>
        </form>
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
                        $('#image-summit').attr('src',e.target.result)
                    };
                    reader.readAsDataURL($(this).get(0).files[0]);
                }
            });
        });
    </script>
@endsection
