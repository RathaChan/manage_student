@extends('dashboard.master')
@section('title', 'edit subject')
{{--@php(dd($subjects));--}}
@section('content')
    @if (session('success'))
        <div class="alert alert-primary" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Create subject</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form role="form" action="{{url('/subjects/'.$subject->id)}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('put')
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="">Code</label>
                            <input type="text" class="form-control" placeholder="code" autocomplete="off" name="code" value="{{$subject->code}}">
                            @error('code')<p style="color: red">{{$message}}</p>@enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Subject</label>
                            <input type="text" class="form-control" placeholder="subject" autocomplete="off" name="title" value="{{$subject->title}}">
                            @error('title')<p style="color: red">{{$message}}</p>@enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="">Cost</label>
                            <input type="text" class="form-control" placeholder="cost" autocomplete="off" name="cost" value="{{$subject->cost}}">
                            @error('cost')<p style="color: red">{{$message}}</p>@enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea type="text" class="form-control"  placeholder="description..." autocomplete="off" name="description" value="{{$subject->description}}">{{$subject->description}}
                            </textarea>
                            @error('description')<p style="color: red">{{$message}}</p>@enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Status: </label>
                            <select name="action" id="" class="field-search">
                                @foreach(['enable','disable'] as $status)
                                    <option {{$subject->action == $status ? 'selected' : '' }}>{{$status}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-actions right">
                    <button class="btn btn-warning mr-1" type="button">
                        <i class="ft-x"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="la la-check-square-o"></i> Update
                    </button>
                </div>





            </form>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
