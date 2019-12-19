@extends(' dashboard.master ')
@section(' title', ' edit attendance')
@section('edit_attend')
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Update Attendance Student</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="#" >
        @csrf
        <input type="hidden" name="attendent_student" value="">
        <div class="card-body">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Date:</label>
                <div class="col-sm-10">
                    <input type="date" name="date" class="" placeholder="date" id="date">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Student Name:</label>
                <div class="col-sm-10">
                    <select name="student_select" id="student_select" class="field-search" title="all students">

                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Status:</label>
                <div class="col-sm-10">
                    <select name="status_select" id="status_select" class="field-search">
                        <option value="absent">Absent</option>
                        <option value="permission">Permission</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Reason:</label>
                <div class="col-sm-10">
                    <textarea id="reason" class="form-control" rows="3" placeholder="............"></textarea>

                </div>
            </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-info" >Update</button>
            <button type="button" class="btn btn-success float-right" >Cancel</button>
        </div>
    </form>
</div>
@endsection