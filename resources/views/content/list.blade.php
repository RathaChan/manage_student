@extends('dashboard.master')
@section('title', 'list student')
@section('list')


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <td>
                        <a href="{{url('/students/create')}}" type="button" class="btn btn-block btn-outline-info btn-flat">New</a>
                    </td>
                </h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Code</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @forelse($student as $students)
                    <tr>
                        <td>{{$students->id}}</td>
                        <td>{{$students->student_code}}</td>
                        <td>{{$students->first_name}}</td>
                        <td>{{$students->last_name}}</td>
                        <td>{{$students->gender}}</td>
                        <td><a href="#"> Delete</a> | <a href="#">Edit</a></td>
                    </tr>
                   @empty
                        no record
                    @endforelse
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>



    @endsection
