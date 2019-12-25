@extends('dashboard.master')
@section('title', 'list timestudy')
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
                        <th>Status</th>
                        <th>Day</th>
                        <th>Description</th>
                        <th>Action</th>


                    </tr>
                    </thead>
                    <tbody>
                    @forelse($time_studys as $time_study)
                        <tr>


                        <td>{{$time_study->id}}</td>
                        <td>{{$time_study->students->first_name .' '.$time_study->students->last_name }}</td>
                        <td>{{$time_study->subjects->title}}</td>
                        <td>{{$time_study->time_start}}</td>
                        <td>{{$time_study->time_end}}</td>
                        <td>{{$time_study->status}}</td>
                        <td>{{$time_study->day}}</td>
                        <td>{{$time_study->description}}</td>
                        <td><a  href="{{url('/time_study/' .''. $time_study->id . '/edit')}}">Edit</a> | <a href="{{url('/time_study/' .''. $time_study->id)}}">Delete</a></td>
                    @empty
                    <td>no record</td>
                        </tr>
                    @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>

@endsection

{{--@section('pagescript')--}}
{{--    <script type="text/javascript">--}}
{{--        function update() {--}}

{{--            document.getElementById("changetoupdate").innerHTML('update');--}}

{{--        }--}}

{{--    </script>--}}

{{--@endsection--}}

