@extends('dashboard.master')
@section('create_attendance')
    <form action="{{url('attendance')}}" method="POST" id="form_add" >
        @csrf
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title"></h3>
            </div>
            <div class="card-body">
                <td>
                    <label for="">Date:</label>
                    <input type="date" name="date" class="" placeholder="date">
                </td>
                <td>
                    <label for="">Student Name:</label>
                    <select name="student_select" id="" class="field-search" title="all students">
                        @foreach($student as $students)
                        <option value="{{$students->first_name}}">{{$students->first_name}}</option>
{{--                        <option value="">World</option>--}}
                            @endforeach
                    </select>
                </td>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label for="">Status: </label>
                                <select name="status_select" id="" class="field-search">
                                    <option value="absent">Absent</option>
                                    <option value="permission">Permission</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- textarea -->
                            <div class="form-group right">
                                <label>Reason</label>
                                <textarea class="form-control" rows="3" placeholder="reason........lazy"></textarea>
                            </div>
                        </div>
                    </div>

            </div>
            <div>
                <td>
                    <button type="submit" class="btn btn-block btn-info col-sm-2" value="add">Add</button>
                    <button type="submit" class="btn btn-block btn-success col-sm-2" value="summit">Summit</button>
                </td>

            </div>

        </div>
    </form>
@include('content.list_add')




@endsection
