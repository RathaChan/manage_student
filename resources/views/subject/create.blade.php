@extends('dashboard.master')
@section('title', 'create student')

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
            <form role="form" action="{{url('/subjects')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="">Code</label>
                            <input type="text" class="form-control" placeholder="code" autocomplete="off" name="code" value="{{old('code')}}">
                            @error('code')<p style="color: red">{{$message}}</p>@enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Subject</label>
                            <input type="text" class="form-control" placeholder="subject" autocomplete="off" name="title" value="{{old('title')}}">
                            @error('title')<p style="color: red">{{$message}}</p>@enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="">Cost</label>
                            <input type="text" class="form-control" placeholder="cost" autocomplete="off" name="cost" value="{{old('cost')}}">
                            @error('cost')<p style="color: red">{{$message}}</p>@enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea type="text" class="form-control"  placeholder="description..." autocomplete="off" name="description" value="{{old('description')}}">
                            </textarea>
                            @error('description')<p style="color: red">{{$message}}</p>@enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Status: </label>
                            <select name="action" id="" class="field-search">
                                <option value="enable">Enable</option>
                                <option value="disable">Disable</option>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-actions right">
                    <button class="btn btn-warning mr-1" type="button">
                        <i class="ft-x"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="la la-check-square-o"></i> Save
                    </button>
                </div>





            </form>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
