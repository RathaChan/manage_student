
@extends('dashboard.master')
@section('title', 'student attendance')
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
                        <td>
                            <a href="{{url('/students/attendance/create')}}" type="button" class="btn btn-block btn-outline-info btn-flat-right">New</a>
                        </td>
                    </h3>
                    <div class="card-tools">
                        <form method="GET">
                            <div class="input-group ">
                                <!-- Search form -->
                                <input value="{{request('r')}}" name="s" class="form-control" type="text" placeholder="Search" aria-label="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">

                        </div>
                    </div>
                </div>

                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>date</th>
                            <th>Name</th>
                            <th>Reason</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($attends as $attend)
                        <tr>
                            <td>{{$attend->id}}</td>
                            <td>{{$attend->date}}</td>
                            <td> @if(!empty($attend->students)){{$attend->students->first_name}} {{$attend->students->last_name}}@endif</td>
                            <td>{{$attend->reason}}</td>
                            <td>{{$attend->status}}</td>
                            <td><a href="/attendance/{{$attend->id}}/edit">Edit</a> | <a href="/attendance/{{$attend->id}}">Delete</a></td>
                        </tr>
                          @empty
                             <td>no record</td>
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
