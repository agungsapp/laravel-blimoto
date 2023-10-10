@extends('admin.layouts.main')
@section('content')
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Input Data Leasing Motor</h3>
        </div>
        <form action="{{ route('admin.leasing-motor.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="nama-leasing">Nama Leasing</label>
              <input name="nama" type="text" class="form-control" id="nama-leasing" placeholder="Masukan leasing (FIF Group, Adira, dll)">
            </div>
            <div class="form-group">
              <label for="diskon-motor">Diskon Normal Leasing</label>
              <input name="diskon_normal" type="text" class="form-control" id="diskon-motor" placeholder="Masukan diskon normal leasing (0.20 = 20%, 0.50 = 50%, dll)">
            </div>
            <div class="form-group">
              <label for="diskon-motor">Diskon Leasing</label>
              <input name="diskon" type="text" class="form-control" id="diskon-motor" placeholder="Masukan diskon leasing (0.20 = 20%, 0.50 = 50%, dll)">
            </div>
            <div class="form-group">
              <label for="gambar">File Gambar</label>
              <input type="file" id="gambar" name="gambar">
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
        <div class="card-body">
          <table id="data-type" class="table-bordered table-striped table">
            <thead>
              <tr role="row">
              <tr>
                <th>NO</th>
                <th>Nama Leasing</th>
                <th>Diskon normal</th>
                <th>Diskon Leasing</th>
                <th>Gambar Leasing</th>
                <th width="170px">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($leasings as $index => $l)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{$l->nama}}</td>
                <td>{{($l->diskon_normal * 100).'%' }}</td>
                <td>{{($l->diskon * 100).'%' }}</td>
                <td>
                  <img width="150px" src="/assets/images/custom/leasing/{{ $l->gambar }}" alt="{{ $l->gambar }}" srcset="">
                </td>
                <td>
                  <div class="btn-group">
                    <form action="{{ route('admin.leasing-motor.destroy', $l->id) }}" method="post">
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
                        <form action="{{ route('admin.leasing-motor.update', $l->id) }}" method="post" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                          <div class="modal-body">
                            <div class="card card-primary">
                              <div class="card-header with-border">
                                <h3 class="card-title">Update Data Leasing</h3>
                              </div>
                              <input type="hidden" value="{{$l->id}}">
                              <div class="card-body">
                                <div class="form-group">
                                  <label for="nama-leasing">Nama Leasing</label>
                                  <input value="{{$l->nama}}" name="nama" type="text" class="form-control" id="nama-leasing" placeholder="Masukan leasing (FIF Group, Adira, dll)">
                                </div>
                                <div class="form-group">
                                  <label for="diskon-motor">Diskon Normal Leasing</label>
                                  <input name="diskon_normal" type="text" class="form-control" id="diskon-motor" placeholder="Masukan diskon normal leasing (0.20 = 20%, 0.50 = 50%, dll)" value="{{($l->diskon_normal * 100).'%'}}">
                                </div>
                                <div class="form-group">
                                  <label for="diskon-motor">Diskon Leasing</label>
                                  <input value="{{($l->diskon * 100).'%'}}" name="diskon" type="text" class="form-control" id="diskon-motor" placeholder="Masukan diskon leasing (0.20 = 20%, 0.50 = 50%, dll)">
                                </div>
                                <div class="form-group">
                                  <label for="gambar">File Gambar</label>
                                  <input type="file" id="gambar" name="gambar">
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