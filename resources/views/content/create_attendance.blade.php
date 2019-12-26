@extends('dashboard.master')
@section('title', 'create attendance')
@section('content')

    @if (session('success'))
        <div class="alert alert-success ">
            {{ session('success') }}
        </div>
    @endif

    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Create Attendance Student</h3>
            <a  href="{{url('/students/attendance')}}" type="button" id=""  class="btn btn-warning float-right">Attendance</a>

        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{url('attendance/store')}}" method="POST" id="form_add">
            @csrf
            <input type="hidden" name="attendent_student" value="">
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Date:</label>
                    <div class="col-sm-10">
                        <input type="date" name="date" class="form-control col-sm-5" placeholder="date" id="date" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Student Name:</label>
                    <div class="col-sm-10">
                        <select name="student_select" id="student_select"  class="form-control col-sm-5" title="all students">
                            @foreach($student as $students)
                                <option class="form-control" value="{{$students->id}}">{{$students->first_name}} {{$students->last_name}}</option>
{{--                                                        <option value="">World</option>--}}
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Status:</label>
                    <div class="col-sm-10">
                        <select name="status_select" id="status_select" class="form-control col-sm-5">
                            <option value="absent">Absent</option>
                            <option value="permission">Permission</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Reason:</label>
                    <div class="col-sm-10">
                        <textarea id="reason" class="form-control" rows="3" placeholder="............"></textarea>

                    </div>
                </div>

            </div>
             <div class="card-footer">
                 <button type="button" id="btn-add"  class="btn btn-info" value="add" onclick="AddData()">Add</button>
                 <button type="submit" class="btn btn-success float-right" name="action" value="summit" >Summit</button>
{{--                 <button type="button" id="btn-add"  class="btn btn-secondary center-bloc" value="add" onclick="reset()" style="margin: 10px">Reset</button>--}}
             </div>
    </form>
    </div>

@include('content.list_add')
{{--@include('content.attendance')--}}
@endsection

@section('pagescript')
    <script type="text/javascript">
        var data = [];
        var index = 0, get_index_for_update = 0, save = true, get_student_id_for_update = 0;
        function AddData() {
            var date    = document.getElementById("date").value;
            var student_id = document.getElementById("student_select").value;
            var status  = document.getElementById("status_select").value;
            var reason  = document.getElementById("reason").value;
            var student = $("#student_select option:selected" ).text();
                if(save) {
                var rows = "";
                data.push({date: date, student_id: student_id, status: status, reason: reason});
                // console.log(data);
                rows += `<tr id='att_${index}'><td>${date}</td><td>${student}</td><td>${reason}</td><td>${status}</td><td>
                    <button data-id='${student_id}' data-index='${index}' type='button' class='use-address btn btn-link'>Edit</button></td></tr>`;
                $(rows).appendTo("#list tbody");
                index++;
            }else {
                var update_td = `<td>${date}</td><td>${student}</td><td>${reason}</td><td>${status}</td><td>
                    <button data-index='${get_index_for_update}' type='button' class='use-address btn btn-link'>Edit</button></td>`;
                $('#att_'+get_index_for_update).html(update_td);
                save = true
                document.getElementById("btn-add").innerHTML = "Add";

                $.each(data, function( index, value ) {
                    if(get_student_id_for_update == value.student_id)
                    {
                        data[index].date = date;
                        data[index].status = status;
                        data[index].reason = reason;
                        data[index].student_id = student_id;
                    }
                });
            }
        }

        $(document).ready(function () {

            $('#form_add').submit(function(){
                $("input[name='attendent_student']").val(JSON.stringify(data));
            });

            $(document).on('click','.use-address', function() {
                document.getElementById("btn-add").innerHTML = "Update";
                save = false
                get_index_for_update = $(this).data('index');
                get_student_id_for_update = $(this).data('id')
                var $row = $(this).closest("tr");
                $row.find('td').each (function(idx) {
                     console.log($(this).text());
                    switch(idx){
                        case 0 :
                            var date = $(this).text();
                            $('#date').val(date);
                            break;
                        case 1 :
                            var name = $(this).text();
                            $('#student_select').val(get_student_id_for_update);
                            break;
                        case 2 :
                            var reason = $(this).text();
                            $('#reason').val(reason);

                            break;
                        case 3 :
                            var status = $(this).text();
                            $('#status_select').val(status);

                            break;
                        default: break;
                    }
                });
            });
        });
        function reset() {
            document.getElementById("form_add").reset();
        }

    </script>
@endsection
