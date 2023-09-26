@extends('admin.layouts.main')
@section('content')
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Input Data Leasing Motor</h3>
        </div>
        <form action="{{ route('admin.type-motor.store') }}" method="post">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputTypeMotor">Nama Leasing</label>
              <input name="nama" type="text" class="form-control" id="exampleInputTypeMotor" placeholder="Masukan leasing (FIF Group, Adira, dll)">
            </div>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputTypeMotor">Diskon Leasing</label>
              <input name="diskon" type="text" class="form-control" id="exampleInputTypeMotor" placeholder="Masukan diskon leasing (0.20 = 20%, 0.50 = 50%, dll)">
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</section>

<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Leasing</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="data-type" class="table-bordered table-striped table">
            <thead>
              <tr role="row">
              <tr>
                <th>NO</th>
                <th>Nama Leasing</th>
                <th>Diskon Leasing</th>
                <th width="170px">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($leasings as $index => $l)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{$l->nama}}</td>
                <td>{{$l->diskon}}</td>
                <td>
                  <div class="btn-group">
                    <form action="{{ route('admin.type-motor.destroy', $l->id) }}" method="post">
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit{{$l->id}}">
                        Edit
                      </button>
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                  </div>
                  <!-- Modal update -->
                  <div class="modal fade" id="modalEdit{{$l->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Edit data: {{$l->nama}}</h4>
                        </div>
                        <form action="{{ route('admin.type-motor.update', $l->id) }}" method="post">
                          @csrf
                          @method('PUT')
                          <div class="modal-body">
                            <div class="card card-primary">
                              <div class="card-header with-border">
                                <h3 class="card-title">Update Data Type Motor</h3>
                              </div>
                              {{ csrf_field() }}
                              <input type="hidden" value="{{$l->id}}">
                              <div class="card-body">
                                <div class="form-group">
                                  <label for="exampleInputTypeMotor">Nama Type Motor</label>
                                  <input value="{{$l->nama}}" name="nama_edit" type="text" class="form-control" id="exampleInputTypeMotor" placeholder="Masukan leasing (FIF Group, Adira, dll)">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>

@endsection
@push('script')
<script>
  $(function() {
    $("#data-type").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      //"buttons": ["copy", "csv", "excel", "pdf", "print"] //, "colvis"
    }).buttons().container().appendTo('#dataMotor_wrapper .col-md-6:eq(0)');
  });
</script>
@endpush