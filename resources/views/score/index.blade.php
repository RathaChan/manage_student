
@extends('dashboard.master')
@section('title', 'scores')
@section('content')
{{--@php(dd($scores));--}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <a href="{{url('/scores/create')}}" type="button" class="btn btn-info ">New</a>
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Student Name</th>
                    <th>Subject</th>
                    <th>Attendance</th>
                    <th>Homework</th>
                    <th>Mid-Term</th>
                    <th>Assignment</th>
                    <th>Final</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody>
                @forelse($scores as $score )
                <tr>
                    <td>{{$score->id}}</td>
                    <td>{{$score->student->first_name .''.$score->student->last_name }}</td>
                    <td>{{$score->subject->title}}</td>
                    <td>{{$score->attendance}}</td>
                    <td>{{$score->homework}}</td>
                    <td>{{$score->mid_term}}</td>
                    <td>{{$score->assignment}}</td>
                    <td>{{$score->final}}</td>
                    <td><a href="#"> Edit</a> | <a href="#">Delete</a></td>
                    @empty
                        <td>No record</td>
                </tr>

                @endforelse


                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

@endsection



