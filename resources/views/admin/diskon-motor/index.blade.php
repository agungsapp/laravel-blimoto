@extends('admin.layouts.main')
@section('content')

<div class="row">
  <div class="col-12">
    <div class="card card-primary">
      <div class="card-header">
        <div class="card-title">
          Tambah data diskon motor
        </div>
      </div>
      <form action="{{ route('admin.diskon-motor.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="card-body">
          <div class="row">
            <div class="form-group col-md-6">
              <label>Nama Motor</label>
              @if ($motor == null)
              <p class="text-danger">Tidak ada data motor silahkan buat terlebih dahulu !</p>
              @else
              <select id="tambah-nama-motor" name="nama_motor" class="form-control select2 @error('nama-motor') is-invalid @enderror" style="width: 100%;">
                <option value="" selected>-- Pilih nama motor --</option>
                @foreach ($motor as $m)
                <option value="{{ $m->id }}">{{ $m->nama }}</option>
                @endforeach
              </select>
              @endif
            </div>
            <div class="form-group col-md-6">
              <label>Leasing</label>
              @if ($leasing == null)
              <p class="text-danger">Tidak ada data leasing silahkan buat terlebih dahulu !</p>
              @else
              <select id="tambah-leasing-motor" name="leasing_motor" class="form-control @error('leasing-motor') is-invalid @enderror select2" style="width: 100%;">
                <option value="" selected>-- Pilih leasing --</option>
                @foreach ($leasing as $l)
                <option value="{{ $l->id }}">{{ $l->nama }}</option>
                @endforeach
              </select>
              @endif
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-4">
              <label for="model">Diskon 35 Bulan</label>
              <input name="diskon_35" type="text" class="form-control @error('diskon_35') is-invalid @enderror" id="diskon_35" placeholder="Masukan diskon motor 35 bulan">
            </div>
            <div class="form-group col-md-4">
              <label for="model">Diskon 24 Bulan</label>
              <input name="diskon_24" type="text" class="form-control @error('diskon_24') is-invalid @enderror" id="diskon_24" placeholder="Masukan diskon motor 24 bulan">
            </div>
            <div class="form-group col-md-4">
              <label for="model">Diskon 12 Bulan</label>
              <input name="diskon_12" type="text" class="form-control @error('diskon_12') is-invalid @enderror" id="diskon_12" placeholder="Masukan diskon motor 12 bulan">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-4">
              <label for="model">DP 35 Bulan</label>
              <input name="dp_35" type="text" class="form-control @error('dp_35') is-invalid @enderror" id="dp_35" placeholder="Masukan diskon dp motor 35 bulan">
            </div>
            <div class="form-group col-md-4">
              <label for="model">DP 24 Bulan</label>
              <input name="dp_24" type="text" class="form-control @error('dp_24') is-invalid @enderror" id="dp_24" placeholder="Masukan diskon dp motor 24 bulan">
            </div>
            <div class="form-group col-md-4">
              <label for="model">DP 12 Bulan</label>
              <input name="dp_12" type="text" class="form-control @error('dp_12') is-invalid @enderror" id="dp_12" placeholder="Masukan diskon dp motor 12 bulan">
            </div>
          </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-12">
    <div class="card card-primary">
      <div class="card-header">
        <div class="card-title">
          Data Diskon Motor
        </div>
      </div>
      <div class="card-body">
        <table id="dataDiskon" class="table-bordered table-striped table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama Motor</th>
              <th>Leasing</th>
              <th>Diskon 35 Bulan</th>
              <th>Diskon 24 Bulan</th>
              <th>Diskon 12 Bulan</th>
              <th>DP Diskon 35 Bulan</th>
              <th>DP Diskon 24 Bulan</th>
              <th>DP Diskon 12 Bulan</th>
              <th width="120px">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($diskon_motor as $d)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $d->motor->nama }}</td>
              <td>{{ $d->leasing->nama }}</td>
              <td>{{ $d->diskon_35 }}</td>
              <td>{{ $d->diskon_24 }}</td>
              <td>{{ $d->diskon_12 }}</td>
              <td>{{ $d->dp_35 }}</td>
              <td>{{ $d->dp_24 }}</td>
              <td>{{ $d->dp_12 }}</td>
              <td>
                <div class="d-flex justify-content-between">
                  <button data-toggle="modal" data-target="#modalEdit{{$d->id}}" class="btn btn-warning">Edit</button>
                  <form action="{{ route('admin.diskon-motor.destroy', $d->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger show_confirm">Delete</button>
                  </form>
                </div>
                <!-- modal update diskon motor start -->
                <div class="modal fade" id="modalEdit{{$d->id}}" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Edit data diskon motor {{$d->motor->nama}}</h4>
                      </div>
                      <form action="{{ route('admin.diskon-motor.update', $d->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                          <div class="row">
                            <div class="form-group col-md-6">
                              <label>Nama Motor</label>
                              @if ($motor == null)
                              <p class="text-danger">Tidak ada data motor silahkan buat terlebih dahulu !</p>
                              @else
                              <select id="nama_motor" name="nama_motor" class="form-control select2 @error('nama_motor') is-invalid @enderror" style="width: 100%;">
                                <option value="" selected>-- Pilih nama motor --</option>
                                @foreach ($motor as $m)
                                <option value="{{ $m->id }}" @if ($m->id == $d->motor->id) selected @endif>{{ $m->nama }}</option>
                                @endforeach
                              </select>
                              @endif
                            </div>
                            <div class="form-group col-md-6">
                              <label>Leasing</label>
                              @if ($leasing == null)
                              <p class="text-danger">Tidak ada data leasing silahkan buat terlebih dahulu !</p>
                              @else
                              <select id="leasing_motor" name="leasing_motor" class="form-control @error('leasing_motor') is-invalid @enderror select2" style="width: 100%;">
                                <option value="" selected>-- Pilih tipe leasing --</option>
                                @foreach ($leasing as $l)
                                <option value="{{ $l->id }}" @if ($l->id == $d->leasing->id) selected @endif>{{ $l->nama }}</option>
                                @endforeach
                              </select>
                              @endif
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-md-4">
                              <label for="model">Diskon 35 Bulan</label>
                              <input name="diskon_35" type="text" class="form-control @error('diskon_35') is-invalid @enderror" id="diskon_35" placeholder="Masukan diskon motor 35 bulan" value="{{$d->diskon_35}}">
                            </div>
                            <div class="form-group col-md-4">
                              <label for="model">Diskon 24 Bulan</label>
                              <input name="diskon_24" type="text" class="form-control @error('diskon_24') is-invalid @enderror" id="diskon_24" placeholder="Masukan diskon motor 24 bulan" value="{{$d->diskon_24}}">
                            </div>
                            <div class="form-group col-md-4">
                              <label for="model">Diskon 12 Bulan</label>
                              <input name="diskon_12" type="text" class="form-control @error('diskon_12') is-invalid @enderror" id="diskon_12" placeholder="Masukan diskon motor 12 bulan" value="{{$d->diskon_12}}">
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-md-4">
                              <label for="model">DP 35 Bulan</label>
                              <input name="dp_35" type="text" class="form-control @error('dp_35') is-invalid @enderror" id="dp_35" placeholder="Masukan diskon dp motor 35 bulan" value="{{$d->dp_35}}">
                            </div>
                            <div class="form-group col-md-4">
                              <label for="model">DP 24 Bulan</label>
                              <input name="dp_24" type="text" class="form-control @error('dp_24') is-invalid @enderror" id="dp_24" placeholder="Masukan diskon dp motor 24 bulan" value="{{$d->dp_24}}">
                            </div>
                            <div class="form-group col-md-4">
                              <label for="model">DP 12 Bulan</label>
                              <input name="dp_12" type="text" class="form-control @error('dp_12') is-invalid @enderror" id="dp_12" placeholder="Masukan diskon dp motor 12 bulan" value="{{$d->diskon_12}}">
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
                <!-- modal update diskon motor end -->
              </td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>ID</th>
              <th>Nama Motor</th>
              <th>Leasing</th>
              <th>Diskon 35 Bulan</th>
              <th>Diskon 24 Bulan</th>
              <th>Diskon 12 Bulan</th>
              <th>DP Diskon 35 Bulan</th>
              <th>DP Diskon 24 Bulan</th>
              <th>DP Diskon 12 Bulan</th>
              <th width="120px">Action</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>

@endsection


@push('script')
<script>
  //Initialize Select2 Elements
  $('.select2').select2()
  $(document).ready(function() {

    $("#dataDiskon").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      //"buttons": ["copy", "csv", "excel", "pdf", "print"] //, "colvis"
    }).buttons().container().appendTo('#dataMotor_wrapper .col-md-6:eq(0)');

    $('.show_confirm').click(function(event) {
      var form = $(this).closest("form");
      var name = $(this).data("name");
      event.preventDefault();
      swal({
          title: `Delete Data diskon Motor ?`,
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
    })
  })
</script>
@endpush