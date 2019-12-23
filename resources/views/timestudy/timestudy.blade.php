@extends('dashboard.master')
@section('title', 'list student')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <a href="{{url('/time_study/create')}}" type="button" class="btn btn-info ">New</a>
                    </h3>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Student Name</th>
                        <th>Subject</th>
                        <th>Time Start</th>
                        <th>Time End</th>
                        <th>Day</th>
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

@section('pagescript')
    <script type="text/javascript">
        function update() {

            document.getElementById("changetoupdate").innerHTML('update');

        }

    </script>

@endsection

