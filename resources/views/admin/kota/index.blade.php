@extends('admin.layouts.main')
@section('content')
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header with-border">
          <h3 class="card-title">Input Data Kota</h3>
        </div>
        <form action="{{ route('admin.kota.store') }}" method="post">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="input-kota">Nama Kota</label>
              <input name="nama" type="text" class="form-control" id="input-kota" placeholder="Masukan kota (Jakarta Selatan, Bogor, Depok, dll)">
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
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Data Kota</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

          <table id="data-kota" class="table table-bordered table-striped">
            <thead>
              <tr role="row">
                <th>NO</th>
                <th>Nama Kota</th>
                <th width="170px">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($kotas as $index => $kota)
              <tr role="row" class="{{ $index % 2 == 0 ? 'even' : 'odd' }}">
                <td>{{ $loop->iteration }}</td>
                <td>{{$kota->nama}}</td>
                <td>
                  <div class="btn-group">
                    <form action="{{ route('admin.kota.destroy', $kota->id) }}" method="post">
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit{{$kota->id}}">
                        Edit
                      </button>
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                  </div>
                  <!-- Modal update -->
                  <div class="modal fade" id="modalEdit{{$kota->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Edit data: {{$kota->nama}}</h4>
                        </div>
                        <form action="{{ route('admin.kota.update', $kota->id) }}" method="post">
                          @csrf
                          @method('PUT')
                          <div class="modal-body">
                            <div class="card card-primary">
                              <div class="card-header with-border">
                                <h3 class="card-title">Update Data Kota</h3>
                              </div>
                              {{ csrf_field() }}
                              <input type="hidden" value="{{$kota->id}}">
                              <div class="card-body">
                                <div class="form-group">
                                  <label for="exampleInputTypeMotor">Nama Kota</label>
                                  <input value="{{$kota->nama}}" name="nama_edit" type="text" class="form-control" id="exampleInputTypeMotor" placeholder="Masukan kota (Jakarta Selatan, Bogor, Depok, dll)">
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
</section>

@endsection
@push('script')
<script>
  $(function() {
    $("#data-kota").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      //"buttons": ["copy", "csv", "excel", "pdf", "print"] //, "colvis"
    }).buttons().container().appendTo('#dataMotor_wrapper .col-md-6:eq(0)');
  });
</script>
@endpush