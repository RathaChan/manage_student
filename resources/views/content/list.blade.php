@extends('dashboard.master')
@section('title', 'list student')
@section('list')

    @if (session('success'))
        <div class="alert alert-primary" role="alert">
            {{ session('success') }}
        </div>
    @endif
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">

                    <a href="{{url('/students/create')}}" type="button" class="btn btn-info ">New</a>

                </h3>

                <div class="card-tools">
                    <form method="GET">
                        <div class="input-group " style="padding-top: 4px;">
                            <!-- Search form -->
                            <input value="{{request('s')}}" name="s" class="form-control" type="text" placeholder="Search" aria-label="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
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
                    @forelse($students as $student)
                    <tr>
                        <td>{{$student->id}}</td>
                        <td>{{$student->student_code}}</td>
                        <td>{{$student->first_name}}</td>
                        <td>{{$student->last_name}}</td>
                        <td>{{$student->gender}}</td>
                        <td><a href="students/{{$student->id}}"> Delete</a> | <a href="students/{{$student->id}}/edit">Edit</a></td>
                    </tr>
                   @empty
                        <td>no record</td>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



    @endsection
