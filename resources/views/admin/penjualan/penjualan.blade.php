@extends('admin.layouts.main')
@section('content')
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header with-border">
          <h3 class="card-title">Input Data Penjualan</h3>
        </div>
        <form action="{{ route('admin.penjualan.data.store') }}" method="post">
          @csrf
          <div class="card-body">
            <div class="row">
              <div class="form-group col-md-6">
                <label for="input-hasil">Nama Konsumen</label>
                <input name="konsumen" type="text" class="form-control" placeholder="Masukan nama konsumen">
              </div>
              <div class="form-group col-md-6">
                <label for="input-hasil">Nama Sales</label>
                <input name="sales" type="text" class="form-control" placeholder="Masukan nama sales">
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-6">
                <label>Kabupaten</label>
                @if ($kota == null)
                <p class="text-danger">Tidak ada data kabupaten silahkan buat terlebih dahulu !</p>
                @else
                <select id="kabupaten" name="kabupaten" class="form-control select2 @error('kabupaten') is-invalid @enderror" style="width: 100%;">
                  <option value="" selected>-- Pilih kabupaten --</option>
                  @foreach ($kota as $k)
                  <option value="{{ $k->id }}">{{ $k->nama }}</option>
                  @endforeach
                </select>
                @endif
              </div>
              <div class="form-group col-md-6">
                <label>Hasil</label>
                @if ($hasil == null)
                <p class="text-danger">Tidak ada data hasil silahkan buat terlebih dahulu !</p>
                @else
                <select id="hasil" name="hasil" class="form-control select2 @error('hasil') is-invalid @enderror" style="width: 100%;">
                  <option value="" selected>-- Pilih hasil --</option>
                  @foreach ($hasil as $h)
                  <option value="{{ $h->id }}">{{ $h->hasil }}</option>
                  @endforeach
                </select>
                @endif
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-6">
                <label>Motor</label>
                @if ($motor == null)
                <p class="text-danger">Tidak ada data motor silahkan buat terlebih dahulu !</p>
                @else
                <select id="motor" name="motor" class="form-control select2 @error('motor') is-invalid @enderror" style="width: 100%;">
                  <option value="" selected>-- Pilih motor --</option>
                  @foreach ($motor as $m)
                  <option value="{{ $m->id }}">{{ $m->nama }}</option>
                  @endforeach
                </select>
                @endif
              </div>
              <div class="form-group col-md-6">
                <label for="input-hasil">Jumlah</label>
                <input name="jumlah" type="number" class="form-control" placeholder="Masukan jumlah motor">
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-6">
                <label>Leasing</label>
                @if ($leasing == null)
                <p class="text-danger">Tidak ada data leasing silahkan buat terlebih dahulu !</p>
                @else
                <select id="leasing" name="leasing" class="form-control select2 @error('leasing') is-invalid @enderror" style="width: 100%;">
                  <option value="" selected>-- Pilih leasing --</option>
                  @foreach ($leasing as $l)
                  <option value="{{ $l->id }}">{{ $l->nama }}</option>
                  @endforeach
                </select>
                @endif
              </div>
              <div class="form-group col-md-6">
                <label for="input-hasil">Catatan Penjualan</label>
                <input name="catatan" type="text" class="form-control" placeholder="Masukan catatan penjualan motor">
              </div>

            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
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
          <h3 class="card-title">Data Penjualan</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

          <table id="data-sale" class="table table-bordered table-striped">
            <thead>
              <tr role="row">
                <th>NO</th>
                <th>Nama Konsumen</th>
                <th>Nama Sales</th>
                <th>Motor</th>
                <th>Jumlah</th>
                <th>Kota</th>
                <th>Hasil</th>
                <th>Catatan</th>
                <th>Tanggal Dibuat</th>
                <th>Tanggal Hasil</th>
                <th width="170px">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($penjualan as $index => $p)
              <tr role="row" class="{{ $index % 2 == 0 ? 'even' : 'odd' }}">
                <td>{{ $loop->iteration }}</td>
                <td>{{$p->nama_konsumen}}</td>
                <td>{{$p->nama_sales}}</td>
                <td>{{$p->motor->nama}}</td>
                <td>{{$p->jumlah}}</td>
                <td>{{$p->kota->nama}}</td>
                <td>{{$p->hasil->hasil}}</td>
                <td>{{$p->catatan}}</td>
                <td>{{$p->tanggal_dibuat}}</td>
                <td>{{$p->tanggal_hasil}}</td>
                <td>
                  <div class="btn-group">
                    <form action="{{ route('admin.penjualan.data.destroy', $p->id) }}" method="post">
                      @csrf
                      @method('DELETE')
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit{{$p->id}}">
                        Edit
                      </button>
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                  </div>
                  <!-- Modal update -->
                  <div class="modal fade" id="modalEdit{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Edit data: {{$p->nama_konsumen}}</h4>
                        </div>
                        <form action="{{ route('admin.penjualan.data.update', $p->id) }}" method="post">
                          @csrf
                          @method('PUT')
                          <div class="modal-body">
                            <div class="card card-primary">
                              <div class="card-header with-border">
                                <h3 class="card-title">Update Data sales</h3>
                              </div>
                              <input type="hidden" value="{{$p->id}}">
                              <div class="card-body">
                                <div class="form-group">
                                  <div class="row">
                                    <div class="form-group col-md-6">
                                      <label for="input-hasil">Nama Konsumen</label>
                                      <input name="konsumen" type="text" class="form-control" placeholder="Masukan nama konsumen" value="{{$p->nama_konsumen}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label for="input-hasil">Nama Sales</label>
                                      <input name="sales" type="text" class="form-control" placeholder="Masukan nama sales" value="{{$p->nama_sales}}">
                                    </div>
                                  </div>

                                  <div class="row">
                                    <div class="form-group col-md-6">
                                      <label>Kabupaten</label>
                                      @if ($kota == null)
                                      <p class="text-danger">Tidak ada data kabupaten silahkan buat terlebih dahulu !</p>
                                      @else
                                      <select id="kabupaten" name="kabupaten" class="form-control select2 @error('kabupaten') is-invalid @enderror" style="width: 100%;">
                                        <option value="" selected>-- Pilih kabupaten --</option>
                                        @foreach ($kota as $k)
                                        <option value="{{ $k->id }}" @if($p->id_kota === $k->id) selected @endif>{{ $k->nama }}</option>
                                        @endforeach
                                      </select>
                                      @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label>Hasil</label>
                                      @if ($hasil == null)
                                      <p class="text-danger">Tidak ada data hasil silahkan buat terlebih dahulu !</p>
                                      @else
                                      <select id="hasil" name="hasil" class="form-control select2 @error('hasil') is-invalid @enderror" style="width: 100%;">
                                        <option value="" selected>-- Pilih hasil --</option>
                                        @foreach ($hasil as $h)
                                        <option value="{{ $h->id }}" @if($p->id_hasil === $h->id) selected @endif>{{ $h->hasil }}</option>
                                        @endforeach
                                      </select>
                                      @endif
                                    </div>
                                  </div>

                                  <div class="row">
                                    <div class="form-group col-md-6">
                                      <label>Motor</label>
                                      @if ($motor == null)
                                      <p class="text-danger">Tidak ada data motor silahkan buat terlebih dahulu !</p>
                                      @else
                                      <select id="motor" name="motor" class="form-control select2 @error('motor') is-invalid @enderror" style="width: 100%;">
                                        <option value="" selected>-- Pilih motor --</option>
                                        @foreach ($motor as $m)
                                        <option value="{{ $m->id }}" @if($p->id_motor === $m->id) selected @endif>{{ $m->nama }}</option>
                                        @endforeach
                                      </select>
                                      @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label for="input-hasil">Jumlah</label>
                                      <input name="jumlah" type="number" class="form-control" placeholder="Masukan jumlah motor" value="{{$p->jumlah}}">
                                    </div>
                                  </div>

                                  <div class="row">
                                    <div class="form-group col-md-6">
                                      <label>Leasing</label>
                                      @if ($leasing == null)
                                      <p class="text-danger">Tidak ada data leasing silahkan buat terlebih dahulu !</p>
                                      @else
                                      <select id="leasing" name="leasing" class="form-control select2 @error('leasing') is-invalid @enderror" style="width: 100%;">
                                        <option value="" selected>-- Pilih leasing --</option>
                                        @foreach ($leasing as $l)
                                        <option value="{{ $l->id }}" @if($p->id_lising === $l->id) selected @endif>{{ $l->nama }}</option>
                                        @endforeach
                                      </select>
                                      @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label for="input-hasil">Catatan Penjualan</label>
                                      <input name="catatan" type="text" class="form-control" placeholder="Masukan catatan penjualan motor" value="{{$p->catatan}}">
                                    </div>
                                  </div>

                                  <div class="row">
                                    <div class="form-group col-md-6">
                                      <label>Tanggal Dibuat: </label>
                                      <div class="input-group date tanggal_dibuat" id="reservationdate_{{ $loop->index }}" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input tanggal_dibuat" data-target="#reservationdate_{{ $loop->index }}" value="{{ date('m/d/Y', strtotime($p->tanggal_dibuat)) }}" name="tanggal_dibuat" />
                                        <div class="input-group-append" data-target="#reservationdate_{{ $loop->index }}" data-toggle="datetimepicker">
                                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label>Tanggal Hasil:</label>
                                      <div class="input-group date tanggal_hasil" id="reservationdate2_{{ $loop->index }}" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input tanggal_hasil" data-target="#reservationdate2_{{ $loop->index }}" name="tanggal_hasil" value="{{ $p->tanggal_hasil ? date('m/d/Y', strtotime($p->tanggal_hasil)) : '' }}" />
                                        <div class="input-group-append" data-target="#reservationdate2_{{ $loop->index }}" data-toggle="datetimepicker">
                                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                      </div>
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
  function initDatePickers() {
    $('.tanggal_dibuat').datetimepicker({
      format: 'L'
    });

    $('.tanggal_hasil').datetimepicker({
      format: 'L'
    });
  }
  $(function() {
    initDatePickers();
    $('button[data-toggle="modal"]').on('click', function() {
      initDatePickers();
    });
    $('.select2').select2()
    $("#data-sale").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      //"buttons": ["copy", "csv", "excel", "pdf", "print"] //, "colvis"
    }).buttons().container().appendTo('#dataMotor_wrapper .col-md-6:eq(0)');
  });
</script>
@endpush