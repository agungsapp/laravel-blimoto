@extends('admin.layouts.main')
@section('content')
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Input Data Type Motor</h3>
        </div>
        <form action="{{ route('admin.type-motor.store') }}" method="post">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputTypeMotor">Nama Type Motor</label>
              <input name="nama" type="text" class="form-control" id="exampleInputTypeMotor" placeholder="Masukan type motor (Matic, Bebek/CUB, Sport, dll)" value="{{ old('nama') }}">
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div </div>
    </div>
</section>

<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Type Motor</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="data-type" class="table-bordered table-striped table">
            <thead>
              <tr role="row">
              <tr>
                <th>NO</th>
                <th>Nama Type Motor</th>
                <th width="170px">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($types as $index => $type)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{$type->nama}}</td>
                <td>
                  <div class="btn-group">
                    <form action="{{ route('admin.type-motor.destroy', $type->id) }}" method="post">
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit{{$type->id}}">
                        Edit
                      </button>
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger show_confirm">Delete</button>
                    </form>
                  </div>
                  <!-- Modal update -->
                  <div class="modal fade" id="modalEdit{{$type->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Edit data: {{$type->nama}}</h4>
                        </div>
                        <form action="{{ route('admin.type-motor.update', $type->id) }}" method="post">
                          @csrf
                          @method('PUT')
                          <div class="modal-body">
                            <div class="card card-primary">
                              <div class="card-header with-border">
                                <h3 class="card-title">Update Data Type Motor</h3>
                              </div>
                              {{ csrf_field() }}
                              <input type="hidden" value="{{$type->id}}">
                              <div class="card-body">
                                <div class="form-group">
                                  <label for="exampleInputTypeMotor">Nama Type Motor</label>
                                  <input value="{{$type->nama}}" name="nama_edit" type="text" class="form-control" id="exampleInputTypeMotor" placeholder="Masukan type motor (Matic, Bebek/CUB, Sport, dll)">
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