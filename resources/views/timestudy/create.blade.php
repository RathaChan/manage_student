@extends('dashboard.master')
@section('title', 'create timestudy')
@section('content')

    @if (session('success'))
        <div class="alert alert-success ">
            {{ session('success') }}
        </div>
    @endif
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Create subject</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form role="form" action="{{url('/time_study')}}" method="POST" enctype="multipart/form-data" id="timestudy_summit">
                {{ csrf_field() }}
                <input type="hidden" name="timestudy" value="">
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="">Student Name: </label>
                            <select name="student_id" id="student_id" class="form-control">
                                @foreach($students as $student)
                                <option value="{{$student->id}}">{{$student->first_name .' '. $student->last_name}}</option>
                                @endforeach
                            </select>
                            @error('student_name')<p style="color: red">{{$message}}</p>@enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Subject: </label>
                            <select name="subject_id" id="subject_id" class="form-control">
                                @foreach($subjects as $subject)

                                    <option value="{{$subject->id}}">{{$subject->title}}</option>
                                @endforeach
                            </select>
                            @error('subject')<p style="color: red">{{$message}}</p>@enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Day: </label>
                            <select name="day" id="day" class="form-control">
                                <option value="monday">Monday</option>
                                <option value="tuesday">Tuesday</option>
                                <option value="wednesday">Wednesday</option>
                                <option value="thursday">Thursday</option>
                                <option value="friday">Friday</option>
                                <option value="saturday">Saturday</option>
                                <option value="sunday">Sunday</option>
                            </select>
                            @error('day')<p style="color: red">{{$message}}</p>@enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Status: </label>
                            <select name="status" id="status" class="form-control">
                                <option  value="morning">Morning</option>
                                <option value="afternoon">Afternoon</option>
                                <option value="evening">Evening</option>
                            </select>
                            @error('subject')<p style="color: red">{{$message}}</p>@enderror
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="">Time Start:</label>
                            <input type="time" class="form-control" placeholder="time start" autocomplete="off" name="time_start" value="{{old('time_start')}}" id="time_start">
                            @error('time_start')<p style="color: red">{{$message}}</p>@enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Time End:</label>
                            <input type="time" class="form-control" placeholder="time end" autocomplete="off" name="time_end" value="{{old('time_end')}}" id="time_end">
                            @error('time_end')<p style="color: red">{{$message}}</p>@enderror
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Description:</label>
                            <textarea class="form-control" autocomplete="off" name="description"  id="description" rows="3" placeholder="............"></textarea>
                            @error('description')<p style="color: red">{{$message}}</p>@enderror
                        </div>
                    </div>
                </div>


                <div class="form-actions right">
                    <button class="btn btn-info" type="button" id="btn-add" onclick="addData(), reset();">
                        <i class="ft-x"></i> Add
                    </button>
                    <button type="submit" class="btn btn-primary float-right">
                        <i class="la la-check-square-o"></i> Summit
                    </button>
                </div>





            </form>
        </div>
        <!-- /.card-body -->
    </div>
@include('timestudy.list_summit')
@endsection

@section('pagescript')
    <script>
        var store_data = [];
        var index = 0, get_index_for_update = 0, save = true, get_student_id_for_update = 0,get_subject_id_for_update = 0;
        {{-- function --}}
        function addData()
        {
            var data = {
                student_id  : document.getElementById("student_id").value,
                subject_id  : document.getElementById("subject_id").value,
                day         : document.getElementById("day").value,
                status      : document.getElementById("status").value,
                time_start  : document.getElementById("time_start").value,
                time_end    : document.getElementById("time_end").value,
                description : document.getElementById("description").value,
                student_name: ("#student_id option:selected" ).text(),
                subject_name: ("#subject_id option:selected" ).text(),
            };
            if(save){
                var rows = "";

                store_data.push({student_id: data.student_id, subject_id: data.subject_id, day: data.day, status: data.status,time_start: data.time_start,time_end : data.time_end,description : data.description});
                rows += `<tr id='att_${index}'><td>${data.student_name}</td><td>${data.subject_name}</td><td>${data.day}</td><td> ${data.status}</td><td>${data.time_start}</td><td>${data.time_end}</td><td>${data.description}</td><td>
                    <button data-stu-id='${data.student_id}'data-sub-id='${data.subject_id}' data-index='${index}' type='button' class='btn-edit btn btn-link'>Edit</button></td></tr>`;
                $(rows).appendTo("#list_summit tbody");
                index++;

            }else {
                var update_td = `<td>${data.student_id}</td><td>${data.subject_id}</td><td>${data.day}</td><td>${data.status}</td><td>${data.time_start}</td><td>${data.time_end}</td><td>${data.description}</td><td>
                    <button data-index='${get_index_for_update}' type='button' class='btn-edit btn btn-link'>Edit</button></td>`;
                $('#att_'+get_index_for_update).html(update_td);
                save = true
                document.getElementById("btn-add").innerHTML = "Add";
            }

            $.each(store_data, function( index, value ) {
                if(get_student_id_for_update == value.student_id && get_subject_id_for_update == value.subject_id )
                {
                    store_data[index].day = data.day;
                    store_data[index].status = data.status;
                    store_data[index].time_start = data.time_start;
                    store_data[index].time_end = data.time_end;
                    store_data[index].description =data.description;
                    store_data[index].subject_id = data.subject_name;
                    store_data[index].student_id =data.student_name;
                }
            });

        }
        $(document).ready(function(){
            {{--Convert data to json--}}
            $('#score_form').submit(function(){
                $("input[name='timestudy']").val(JSON.stringify(store_data));
            });


            $(document).on('click','.btn-edit', function() {
                document.getElementById("btn-add").innerHTML = "Update";
                save = false
                get_index_for_update      = $(this).data('index');
                get_student_id_for_update = $(this).data('stu-id');
                get_subject_id_for_update = $(this).data('sub-id');

                var $row = $(this).closest("tr");
                $row.find('td').each (function(idx) {
                    var txt = $(this).text();
                    switch(idx){
                        case 0 :
                            $('#student_id').val(get_student_id_for_update);
                            break;
                        case 1 :
                            $('#subject_id').val(get_subject_id_for_update);
                            break;
                        case 2 :
                            $('#day').val(txt);
                            break;
                        case 3 :
                            $('#status').val(txt);
                            break;
                        case 4 :
                            $('#time_start').val(txt);
                            break;
                        case 5 :
                            $('#time_end').val(txt);
                            break;
                        case 6 :
                            $('#description').val(txt);
                            break;
                        default: break;
                    }
                });
            });
        });
        function reset() {
            document.getElementById("timestudy_summit").reset();
        }
    </script>
@endsection

