@extends('admin.layouts.main')
@section('content')
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header with-border">
          <h3 class="card-title">Input Data Hasil</h3>
        </div>
        <form action="{{ route('admin.penjualan.hasil.store') }}" method="post">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="input-hasil">Hasil</label>
              <input name="hasil" type="text" class="form-control" placeholder="Masukan hasil penjualan">
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
          <h3 class="card-title">Data Akun Sales</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

          <table id="data-sale" class="table table-bordered table-striped">
            <thead>
              <tr role="row">
                <th>NO</th>
                <th>Hasil</th>
                <th width="170px">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($hasil as $index => $h)
              <tr role="row" class="{{ $index % 2 == 0 ? 'even' : 'odd' }}">
                <td>{{ $loop->iteration }}</td>
                <td>{{$h->hasil}}</td>
                <td>
                  <div class="btn-group">
                    <form action="{{ route('admin.penjualan.hasil.destroy', $h->id) }}" method="post">
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit{{$h->id}}">
                        Edit
                      </button>
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                  </div>
                  <!-- Modal update -->
                  <div class="modal fade" id="modalEdit{{$h->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Edit data: {{$h->nama}}</h4>
                        </div>
                        <form action="{{ route('admin.penjualan.hasil.update', $h->id) }}" method="post">
                          @csrf
                          @method('PUT')
                          <div class="modal-body">
                            <div class="card card-primary">
                              <div class="card-header with-border">
                                <h3 class="card-title">Update Data sales</h3>
                              </div>
                              <input type="hidden" value="{{$h->id}}">
                              <div class="card-body">
                                <div class="form-group">
                                  <label for="input-hasil">Hasil</label>
                                  <input name="hasil" type="text" class="form-control" placeholder="Masukan hasil penjualan" value="{{$h->hasil}}">
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
    $("#data-sale").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      //"buttons": ["copy", "csv", "excel", "pdf", "print"] //, "colvis"
    }).buttons().container().appendTo('#dataMotor_wrapper .col-md-6:eq(0)');
  });
</script>
@endpush