@extends(' dashboard.master ')
@section(' title', ' edit attendance')
@section('content')
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Update Attendance Student</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
{{--    @foreach($attends as $attend)--}}
{{--    @endforeach--}}
    @foreach($student as $students)

    @endforeach
    <form action="/attendance/{{$attend->id}}"  method="POST">
        @method('PUT')
        @csrf
        <div class="card-body">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Date:</label>
                <div class="col-sm-10">
                    <input type="date" name="date" class="" placeholder="date" id="date" value="{{$attend->date}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Student Name:</label>
                <div class="col-sm-10">
                    <select name="student_select" id="student_select" class="field-search" title="all students" value="">
                        <option value="{{$attend->id}}">{{$attend->students->first_name}} {{$attend->students->last_name}}</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Status:</label>
                <div class="col-sm-10">
                    <select name="status" id="status_select" class="field-search">
                        @foreach(['absent','permission'] as $status)
                            <option {{$attend->status == $status ? 'selected' : '' }} value="{{$status}}">{{$status}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Reason:</label>
                <div class="col-sm-10">
{{--                    <input type="textarea" id="reason" class="form-control" rows="3" placeholder="............" value="{{$attend->reason}}"></input>--}}
                    <textarea name="reason" id="reason" class="form-control" rows="3" id="comment">{{$attend->reason}}</textarea>
                </div>
            </div>

        </div>
        <div class="card-footer col-sm-3">
            <button type="submit" class="btn btn-info float-right" >Update</button>
            <button type="cancel" class="btn btn-success " >Cancel</button>
        </div>
    </form>

</div>
@endsection
