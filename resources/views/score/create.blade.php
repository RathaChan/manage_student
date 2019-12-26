
@extends('dashboard.master')
@section('title', 'scores create')
@section('content')
{{--    @php(dd($students));--}}
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">create score</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" method="POST" action="{{url('/scores')}}" id="score_form">
            @csrf
            <input type="hidden" name="score_student">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="">Student Name: </label>
                            <select name="student_id" id="student_id" class="form-control" autocomplete="off">
                                @foreach($students as $student)
                                <option value="{{$student->id}}">{{$student->first_name .' '.$student->last_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Subject: </label>
                            <select name="subject_id" id="subject_id" class="form-control" autocomplete="off">
                                @foreach($subjects as $subject)
                                <option value="{{$subject->id}}">{{$subject->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-10 col-sm offset-2 ">
                    <label for="" >Scores:</label> <hr>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Attendance:</label>
                        <div class="col-sm-5">
                            <input type="text" name="attendance" id="attendance" class="form-control " placeholder="attendance" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Homework:</label>
                        <div class="col-sm-5">
                            <input type="text" name="homework" id="homework" class="form-control " placeholder="homework" autocomplete="off">                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Midterm:</label>
                        <div class="col-sm-5">
                            <input type="text" name="midterm" id="midterm" class="form-control " placeholder="midterm" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Assignment:</label>
                        <div class="col-sm-5">
                            <input type="text" name="assignment"  id="assignment" class="form-control " placeholder="assignment" autocomplete="off">

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Final:</label>
                        <div class="col-sm-5">

                            <input type="text" name="final_score" id="final_score" class="form-control " placeholder="final" autocomplete="off">                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-info" id="btn-add" name="btn_addData" onclick="addData(), reset();">Add</button>
                <button type="submit" class="btn btn-primary float-right">Summit</button>
            </div>
        </form>
    </div>

@include('score.list_summit')

@endsection


@section('pagescript')
    <script>
        var store_data = [];
        var index = 0, get_index_for_update = 0, save = true, get_student_id_for_update = 0,get_subject_id_for_update = 0;
        {{-- function --}}
        function addData()
        {
            var data = {
                attendance  : document.getElementById("attendance").value,
                homework    : document.getElementById("homework").value,
                midterm     : document.getElementById("midterm").value,
                assignment  : document.getElementById("assignment").value,
                final_score : document.getElementById("final_score").value,
                student_id  : document.getElementById("student_id").value,
                subject_id  : document.getElementById("subject_id").value,
                student_name: $("#student_id option:selected" ).text(),
                subject_name: $("#subject_id option:selected" ).text(),
            };
            if(save){
                var rows = "";

                store_data.push({attendance: data.attendance, homework: data.homework, midterm: data.midterm, assignment: data.assignment,final_score: data.final_score,student_id : data.student_id,subject_id : data.subject_id});
                rows += `<tr id='att_${index}'><td>${data.student_name}</td><td>${data.subject_name}</td><td>${data.attendance}</td><td> ${data.homework}</td><td>${data.midterm}</td><td>${data.assignment}</td><td>${data.final_score}</td><td>
                    <button data-stu-id='${data.student_id}'data-sub-id='${data.subject_id}' data-index='${index}' type='button' class='btn-edit btn btn-link'>Edit</button></td></tr>`;
                $(rows).appendTo("#list_summit tbody");
                index++;

            }else {
                var update_td = `<td>${data.student_id}</td><td>${data.subject_id}</td><td>${data.attendance}</td><td>${data.homework}</td><td>${data.midterm}</td><td>${data.assignment}</td><td>${data.final_score}</td><td>
                    <button data-index='${get_index_for_update}' type='button' class='btn-edit btn btn-link'>Edit</button></td>`;
                $('#att_'+get_index_for_update).html(update_td);
                save = true
                document.getElementById("btn-add").innerHTML = "Add";
            }

            $.each(store_data, function( index, value ) {
                if(get_student_id_for_update == value.student_id && get_subject_id_for_update == value.subject_id )
                {
                    store_data[index].attendance = data.attendance;
                    store_data[index].homework = data.homework;
                    store_data[index].midterm = data.midterm;
                    store_data[index].assignment = data.assignment;
                    store_data[index].final_score =data.final_score;
                    store_data[index].subject_id = data.subject_id;
                    store_data[index].student_id =data.student_id;
                }
            });

        }
        $(document).ready(function(){
            {{--Convert data to json--}}
            $('#score_form').submit(function(){
                $("input[name='score_student']").val(JSON.stringify(store_data));
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
                            $('#attendance').val(txt);
                            break;
                        case 3 :
                            $('#homework').val(txt);
                            break;
                        case 4 :
                            $('#midterm').val(txt);
                            break;
                        case 5 :
                            $('#assignment').val(txt);
                            break;
                        case 6 :
                            $('#final_score').val(txt);
                            break;
                        default: break;
                    }
                });
            });
        });
        function reset() {
            document.getElementById("score_form").reset();
        }
    </script>
@endsection




