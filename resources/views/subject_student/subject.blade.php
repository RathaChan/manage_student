@extends('dashboard.master')
@section('title', 'subject')
@section('subject_student')

    @if (session('success'))
        <div class="alert alert-success ">
            {{ session('success') }}
        </div>
    @endif

    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Create Subject</h3>
            <a  href="{{url('#')}}" type="button" id="btn-add"  class="btn btn-warning float-right">Subject Student</a>

        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{url('#')}}" method="POST" id="form_add">
            @csrf
            <input type="hidden" name="sub_student" value="">
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Code:</label>
                    <div class="col-sm-10">
                        <input type="date" name="date" class="" placeholder="code" id="date" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <textarea type="date" name="description" class="" placeholder="description" id="date" value="">
                        </textarea>
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
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Cost:</label>
                    <div class="col-sm-10">
                        <input type="text" name="cost" class="" placeholder="cost" id="cost" value="">

                    </div>
                </div>

            </div>
            <div class="card-footer">
                <button type="button" id="btn-add"  class="btn btn-info" value="add" onclick="AddData()">Add</button>
                <button type="submit" class="btn btn-success float-right" name="action" value="summit" formaction="{{url('attendance/store')}}">Summit</button>
                <button type="button" id="btn-add"  class="btn btn-secondary center-bloc" value="add" onclick="reset()" style="margin: 10px">Reset</button>
            </div>
        </form>
    </div>
@endsection
