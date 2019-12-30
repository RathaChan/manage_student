@extends('dashboard.master')
@section('title', 'list teacher')
@section('content')

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

                        <a href="{{url('/teachers/create')}}" type="button" class="btn btn-info ">New</a>

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
                            <th>Image</th>
                            <th>Code</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Gender</th>
                            <th>DoB</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Education</th>
                            <th>Salary</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @forelse($teachers as $teacher)
                            <tr>
                                <td>{{$teacher->id}}</td>
                                <td><img src="{{asset('/images/' . $teacher->image)}}" width="60" height="60" /></td>
                                <td>{{$teacher->code}}</td>
                                <td>{{$teacher->first_name}}</td>
                                <td>{{$teacher->last_name}}</td>
                                <td>{{$teacher->gender}}</td>
                                <td>{{$teacher->dob}}</td>
                                <td>{{$teacher->address}}</td>
                                <td>{{$teacher->email}}</td>
                                <td>{{$teacher->education}}</td>
                                <td>{{$teacher->salary}}</td>
                                <td>{{$teacher->action}}</td>
                                <td><a href="teachers/{{$teacher->id}}"> Delete</a> | <a href="teachers/{{$teacher->id}}/edit">Edit</a></td>
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
