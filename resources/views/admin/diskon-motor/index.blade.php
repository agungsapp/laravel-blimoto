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
            <div class="form-group col-md-4">
              <label>Nama Motor</label>
              @if ($motor == null)
              <p class="text-danger">Tidak ada data motor, silakan buat terlebih dahulu!</p>
              @else
              <select id="tambah-nama-motor" name="nama_motor" class="form-control select2 @error('nama_motor') is-invalid @enderror" style="width: 100%;">
                <option value="">-- Pilih nama motor --</option>
                @foreach ($motor as $m)
                <option value="{{ $m->id }}" {{ old('nama_motor') == $m->id ? 'selected' : '' }}>{{ $m->nama }}</option>
                @endforeach
              </select>
              @endif
            </div>
            <div class="form-group col-md-4">
              <label>Leasing</label>
              @if ($leasing == null)
              <p class="text-danger">Tidak ada data leasing, silakan buat terlebih dahulu!</p>
              @else
              <select id="tambah-leasing-motor" name="leasing_motor" class="form-control @error('leasing_motor') is-invalid @enderror select2" style="width: 100%;">
                <option value="">-- Pilih leasing --</option>
                @foreach ($leasing as $l)
                <option value="{{ $l->id }}" {{ old('leasing_motor') == $l->id ? 'selected' : '' }}>{{ $l->nama }}</option>
                @endforeach
              </select>
              @endif
            </div>
            <div class="form-group col-md-4">
              <label>Lokasi</label>
              @if ($lokasi == null)
              <p class="text-danger">Tidak ada data lokasi, silakan buat terlebih dahulu!</p>
              @else
              <select id="tambah-lokasi-motor" name="lokasi_motor" class="form-control @error('lokasi_motor') is-invalid @enderror select2" style="width: 100%;">
                <option value="">-- Pilih lokasi --</option>
                @foreach ($lokasi as $l)
                <option value="{{ $l->id }}" {{ old('lokasi_motor') == $l->id ? 'selected' : '' }}>{{ $l->nama }}</option>
                @endforeach
              </select>
              @endif
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-6">
              <label for="diskon">Diskon</label>
              <input name="diskon" type="text" class="form-control @error('diskon') is-invalid @enderror" id="diskon" placeholder="Masukan diskon" value="{{ old('diskon') }}">
            </div>
            <div class="form-group col-md-6">
              <label for="diskon_promo">Diskon Promo</label>
              <input name="diskon_promo" type="text" class="form-control @error('diskon_promo') is-invalid @enderror" id="diskon_promo" placeholder="Masukan diskon Promo" value="{{ old('diskon_promo') }}">
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-6">
              <label>Tenor</label>
              <select id="tambah-tenor-motor" name="tenor" class="form-control @error('tenor') is-invalid @enderror select2" style="width: 100%;">
                <option value="">-- Pilih tenor --</option>
                @foreach(['11', '17', '23', '29', '35'] as $tenor)
                <option value="{{ $tenor }}" {{ old('tenor') == $tenor ? 'selected' : '' }}>{{ $tenor }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="potongan_tenor">Potongan Tenor</label>
              <input name="potongan_tenor" type="text" class="form-control @error('potongan_tenor') is-invalid @enderror" id="potongan_tenor" placeholder="Masukan potongan tenor (Kosongkan jika tidak ada)" value="{{ old('potongan_tenor') }}">
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
<div class="table-responsive">
          <table id="dataDiskon" class="table-bordered table-striped table">
          <thead>
            <tr>
              <th>Nomor</th>
              <th>Nama Motor</th>
              <th>Leasing</th>
              <th>Lokasi</th>
              <th>Diskon</th>
              <th>Diskon Promo</th>
              <th>Tenor</th>
              <th>Potongan Tenor</th>
              <th width="120px">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($diskon_motor as $d)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $d->motor->nama }}</td>
              <td>{{ $d->leasing->nama }}</td>
              <td>{{ $d->lokasi->nama }}</td>
              <td>{{ Str::rupiah($d->diskon) }}</td>
              <td>{{ Str::rupiah($d->diskon_promo) }}</td>
              <td>{{ $d->tenor }}</td>
              <td>{{ $d->potongan_tenor }}</td>
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
                              <select id="nama_motor_update" name="nama_motor" class="form-control select2 @error('nama_motor') is-invalid @enderror" style="width: 100%;">
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
                            <div class="form-group col-md-12">
                              <label>Lokasi</label>
                              <select id="tambah-lokasi-motor" name="lokasi_motor" class="form-control @error('lokasi-motor') is-invalid @enderror select2" style="width: 100%;">
                                @foreach ($lokasi as $l)
                                <option value="{{ $l->id }}" @if ($l->id == $d->lokasi->id) selected @endif>{{ $l->nama }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-md-6">
                              <label for="model">Diskon</label>
                              <input name="diskon" type="text" class="form-control @error('diskon') is-invalid @enderror" id="diskon" placeholder="Masukan diskon" value="{{$d->diskon}}">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="model">Diskon Promo</label>
                              <input name="diskon_promo" type="text" class="form-control @error('diskon_promo') is-invalid @enderror" id="diskon_promo" placeholder="Masukan diskon Promo" value="{{$d->diskon_promo}}">
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-md-6">
                              <label>Tenor</label>
                              <select id="update-tenor-motor" name="tenor" class="form-control @error('lokasi-motor') is-invalid @enderror select2" style="width: 100%;">
                                <option value="11" {{ $d->tenor == 11 ? 'selected' : '' }}>11</option>
                                <option value="17" {{ $d->tenor == 17 ? 'selected' : '' }}>17</option>
                                <option value="23" {{ $d->tenor == 23 ? 'selected' : '' }}>23</option>
                                <option value="29" {{ $d->tenor == 29 ? 'selected' : '' }}>29</option>
                                <option value="35" {{ $d->tenor == 35 ? 'selected' : '' }}>35</option>
                              </select>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="model">Potongan Tenor</label>
                              <input name="potongan_tenor" type="text" class="form-control @error('potongan_tenor') is-invalid @enderror" id="potongan_tenor" placeholder="Masukan potongan tenor" value="{{$d->potongan_tenor}}">
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
              <th>Nomor</th>
              <th>Nama Motor</th>
              <th>Leasing</th>
              <th>Lokasi</th>
              <th>Diskon</th>
              <th>Diskon Promo</th>
              <th>Tenor</th>
              <th>Potongan Tenor</th>
              <th width="120px">Action</th>
            </tr>
          </tfoot>
        </table>
</div>
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