@extends('dashboard.master')
@section('title', 'list student')
@section('content')
{{--@php(dd($subjects));--}}
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
                        <a href="{{url('/subjects/create')}}" type="button" class="btn btn-info ">New</a>
                    </h3>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Code</th>
                            <th>Title</th>
                            <th>Cost</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($subjects as $subject)

                            <tr>
                                <td>{{$subject->id}}</td>
                                <td>{{$subject->code}}</td>
                                <td>{{$subject->title}}</td>
                                <td>{{$subject->cost}}</td>
                                <td>{{$subject->description}}</td>
                                <td>
                                    <select name="status" id="status_id" class="field-search" >
                                        @foreach(['enable','disable'] as $action)
                                            <option {{$subject->action == $action ? 'selected' : '' }} value="{{$action}}">{{$action}}</option>
                                        @endforeach
                                    </select>

                                </td>
                                <td id="changetoupdate"><a href="{{url('/subjects/'.$subject->id.'/edit')}}">Edit</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

