@extends('admin.layouts.main')
@section('content')
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header with-border">
          <h3 class="card-title">Input Data Merk Motor</h3>
        </div>
        <form action="{{ route('admin.merk-motor.store') }}" method="post">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="merk-motor">Nama Merk Motor</label>
              <input name="nama" type="text" class="form-control" id="merk-motor" placeholder="Masukan merk motor (Honda, Yamaha, Suzuki, dll)">
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
          <h3 class="card-title">Data Merk Motor</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="data-motor" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
            <thead>
              <tr role="row">
                <th>Nomor</th>
                <th>Nama Merk</th>
                <th width="170px">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($merks as $index => $merk)
              <tr role="row" class="{{ $index % 2 == 0 ? 'even' : 'odd' }}">
                <td>{{ $loop->iteration }}</td>
                <td>{{$merk->nama}}</td>
                <td>
                  <div class="btn-group">
                    <form action="{{ route('admin.merk-motor.destroy', $merk->id) }}" method="post">
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit{{$merk->id}}">
                        Edit
                      </button>
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger show_confirm">Delete</button>
                    </form>
                  </div>
                  <!-- Modal update -->
                  <div class="modal fade" id="modalEdit{{$merk->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Edit data: {{$merk->nama}}</h4>
                        </div>
                        <form action="{{ route('admin.merk-motor.update', $merk->id) }}" method="post">
                          @csrf
                          @method('PUT')
                          <div class="modal-body">
                            <div class="card card-primary">
                              <div class="card-header with-border">
                                <h3 class="card-title">Update Data Merk Motor</h3>
                              </div>
                              {{ csrf_field() }}
                              <input type="hidden" value="{{$merk->id}}">
                              <div class="card-body">
                                <div class="form-group">
                                  <label for="exampleInputTypeMotor">Merk Type Motor</label>
                                  <input value="{{$merk->nama}}" name="nama_edit" type="text" class="form-control" id="exampleInputTypeMotor" placeholder="Masukan merk motor (Honda, Yamaha, Suzuki, dll)">
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
    $("#data-motor").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      //"buttons": ["copy", "csv", "excel", "pdf", "print"] //, "colvis"
    }).buttons().container().appendTo('#dataMotor_wrapper .col-md-6:eq(0)');
  });
  $(document).ready(function() {
    $('.show_confirm').click(function(event) {
      var form = $(this).closest("form");
      var name = $(this).data("name");
      event.preventDefault();
      swal({
          title: `Delete Data ?`,
          text: "data yang di hapus tidak dapat dipulihkan!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            form.submit();
          }
        });
    });
  })
</script>
@endpush