@extends('dashboard.master')
@section('title', 'subject student')
@section('subject_student')

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

                        <a href="{{url('/students/create')}}" type="button" class="btn btn-info">Add Subject</a>

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
                            <th>Subject</th>
                            <th>Cost</th>
                            <th>Description</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



@endsection

