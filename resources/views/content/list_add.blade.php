
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                </h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">

                    </div>
                </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>date</th>
                        <th>Name</th>
                        <th>Reason</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($data as $datas)
                        <tr>
                            <td>{{$datas->id}}</td>
                            <td>{{$datas->date}}</td>
                            <td>{{$datas->name}}</td>
                            <td>{{$datas->status}}</td>
                            <td>{{$datas->reason}}</td>
                        </tr>


                        @empty
                        no record
                        @endforelse

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
