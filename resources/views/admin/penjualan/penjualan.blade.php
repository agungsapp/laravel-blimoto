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
                <input name="konsumen" type="text" class="form-control" placeholder="Masukan nama konsumen" value="{{ old('konsumen') }}">
              </div>
              <div class="form-group col-md-6">
                <label>Sales</label>
                @if ($sales == null)
                <p class="text-danger">Tidak ada data sales silahkan buat terlebih dahulu !</p>
                @else
                <select id="sales-input-input" name="sales" class="form-control select2" style="width: 100%;">
                  <option value="" selected>-- Pilih sales --</option>
                  @foreach ($sales as $s)
                  <option value="{{ $s->id }}" {{ old('sales') == $s->id ? 'selected' : '' }}>{{ $s->nama }}</option>
                  @endforeach
                </select>
                @endif
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-6">
                <label>Metode Pembayaran</label>
                <select id="pembayaran-input" name="pembayaran" class="form-control select2" style="width: 100%;">
                  <option value="" selected>-- Pilih pembayaran --</option>
                  <option value="cash" {{ old('pembayaran') == 'cash' ? 'selected' : '' }}>Cash</option>
                  <option value="kredit" {{ old('pembayaran') == 'kredit' ? 'selected' : '' }}>Kredit</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="input-tenor">Tenor</label>
                <input name="tenor" type="text" class="form-control" placeholder="Masukan tenor" id="input-tenor" value="{{ old('tenor') }}">
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-6">
                <label for="input-dp">DP</label>
                <input name="dp" type="number" class="form-control" placeholder="Masukan DP" id="input-dp" value="{{ old('dp') }}">
              </div>
              <div class="form-group col-md-6">
                <label for="input-diskon-dp">Diskon DP</label>
                <input name="diskon_dp" type="number" class="form-control" placeholder="Masukan diskon DP" id="input-diskon-dp" value="{{ old('diskon_dp') }}">
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-6">
                <label>Kabupaten</label>
                @if ($kota == null)
                <p class="text-danger">Tidak ada data kabupaten silahkan buat terlebih dahulu !</p>
                @else
                <select id="kabupaten-input" name="kabupaten" class="form-control select2" style="width: 100%;">
                  <option value="" selected>-- Pilih kabupaten --</option>
                  @foreach ($kota as $k)
                  <option value="{{ $k->id }}" {{ old('kabupaten') == $k->id ? 'selected' : '' }}>{{ $k->nama }}</option>
                  @endforeach
                </select>
                @endif
              </div>
              <div class="form-group col-md-6">
                <label>Hasil</label>
                @if ($hasil == null)
                <p class="text-danger">Tidak ada data hasil silahkan buat terlebih dahulu !</p>
                @else
                <select id="hasil-input" name="hasil" class="form-control select2" style="width: 100%;">
                  <option value="" selected>-- Pilih hasil --</option>
                  @foreach ($hasil as $h)
                  <option value="{{ $h->id }}" {{ old('hasil') == $h->id ? 'selected' : '' }}>{{ $h->hasil }}</option>
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
                <select id="motor-input" name="motor" class="form-control select2" style="width: 100%;">
                  <option value="" selected>-- Pilih motor --</option>
                  @foreach ($motor as $m)
                  <option value="{{ $m->id }}" {{ old('motor') == $m->id ? 'selected' : '' }}>{{ $m->nama }}</option>
                  @endforeach
                </select>
                @endif
              </div>
              <div class="form-group col-md-6">
                <label for="input-hasil">Jumlah</label>
                <input name="jumlah" type="number" class="form-control" placeholder="Masukan jumlah motor" value="{{ old('jumlah', '1') }}">
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-6">
                <label>Leasing</label>
                @if ($leasing == null)
                <p class="text-danger">Tidak ada data leasing silahkan buat terlebih dahulu !</p>
                @else
                <select id="leasing-input" name="leasing" class="form-control select2" style="width: 100%;">
                  <option value="" selected>-- Pilih leasing --</option>
                  @foreach ($leasing as $l)
                  <option value="{{ $l->id }}" {{ old('leasing') == $l->id ? 'selected' : '' }}>{{ $l->nama }}</option>
                  @endforeach
                </select>
                @endif
              </div>
              <div class="form-group col-md-6">
                <label for="input-hasil">Catatan Penjualan</label>
                <input name="catatan" type="text" class="form-control" placeholder="Masukan catatan penjualan motor (kosongkan jika tidak ada)" value="{{ old('catatan') }}">
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-6">
                <label>Status Pembayaran</label>
                <select id="status_pembayaran_input" name="status_pembayaran" class="form-control select2" style="width: 100%;">
                  <option value="" selected>-- Pilih status pembayaran --</option>
                  <option value="pending" {{ old('status_pembayaran') == 'pending' ? 'selected' : '' }}>Pending</option>
                  <option value="paid" {{ old('status_pembayaran') == 'paid' ? 'selected' : '' }}>Paid</option>
                  <option value="cod" {{ old('status_pembayaran') == 'cod' ? 'selected' : '' }}>COD</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="input-hasil">Nomor PO</label>
                <input name="nomor_po" type="text" class="form-control" placeholder="Kosongkan jika PO belum turun" value="{{ old('nomor_po') }}">
              </div>
            </div>

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
          <h3 class="card-title">Data Penjualan</h3>
        </div>

        <div class="card-body table-responsive">
          <table border="0" cellspacing="5" cellpadding="5" class="mb-4">
            <tbody>
              <tr>
                <td>Dari Tanggal:</td>
                <td><input type="text" id="min" name="min"></td>
              </tr>
              <tr>
                <td>Sampai Tanggal:</td>
                <td><input type="text" id="max" name="max"></td>
              </tr>
            </tbody>
          </table>
          <table id="data-sale" class="table table-bordered table-striped">
            <thead>
              <tr role="row">
                <th>ID</th>
                <th>Nama Konsumen</th>
                <th>Nama Sales</th>
                <th>Pembayaran</th>
                <th>Status Pembayaran DP</th>
                <th>Leasing</th>
                <th>Motor</th>
                <th>Hasil</th>
                <th>Tanggal Dibuat</th>
                <th class="no-export" width="100px">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($penjualan as $index => $p)
              <tr role="row" class="{{ $index % 2 == 0 ? 'even' : 'odd' }}">
                <td>{{ $p->id }}</td>
                <td>{{$p->nama_konsumen}}</td>
                <td>{{$p->sales->nama}}</td>
                <td>{{$p->pembayaran}}</td>
                <td>{{$p->status_pembayaran_dp}}</td>
                <td>{{$p->leasing->nama ?? 'cash'}}</td>
                <td>{{$p->motor->nama}}</td>
                <td>{{$p->hasil->hasil}}</td>
                <td>{{$p->tanggal_dibuat}}</td>
                <td class="no-export">
                  <div>
                    <button type="button" class="btn btn-success w-100 mb-1 load-print-modal" data-id="{{$p->id}}" data-url="{{ route('admin.penjualan.print-data', ['id' => $p->id]) }}" data-toggle="modal" data-target="#modalCetak">
                      Cetak
                    </button>
                    <button type="button" class="btn btn-info w-100 mb-1 load-payment-modal" data-id="{{$p->id}}" data-url="{{ route('admin.penjualan.payment-data', ['id' => $p->id]) }}" data-action-url="{{ route('admin.penjualan.bayar-dp', ['id' => $p->id]) }}" data-toggle="modal" data-target="#modalBayar">Bayar</button>
                    <button type="button" class="btn btn-secondary w-100 mb-1 load-detail-modal" data-id="{{$p->id}}" data-url="{{ route('admin.penjualan.getPenjualan', ['id' => $p->id]) }}" data-toggle="modal" data-target="#modalDetail">
                      Detail
                    </button>
                    @if (Auth::guard('admin')->check() || ($p->is_cetak == 0))
                    <button type="button" class="btn btn-primary w-100 mb-1 load-update-modal" data-id="{{$p->id}}" data-url="{{ route('admin.penjualan.getPenjualan', ['id' => $p->id]) }}" data-toggle="modal" data-target="#modalEdit">
                      Edit
                    </button>
                    <form action="{{ route('admin.penjualan.data.destroy', $p->id) }}" method="post">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger show_confirm w-100">Delete</button>
                    </form>
                    @endif
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

<!-- Modal update -->
<section>
  <div class="modal fade" id="modalEdit" role="dialog" data-base-action-url="{{ route('admin.penjualan.data.update', ['data' => '__id__']) }}" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Edit data</h4>
        </div>
        <form action="" method="post">
          @csrf
          @method('PUT')
          <div class="modal-body">
            <div class="card card-primary">
              <div class="card-header with-border">
                <h3 class="card-title">Update Data sales</h3>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="input-hasil">Nama Konsumen</label>
                      <input name="konsumen" type="text" class="form-control" placeholder="Masukan nama konsumen">
                    </div>
                    <div class="form-group col-md-6">
                      <label>Sales</label>
                      @if ($sales == null)
                      <p class="text-danger">Tidak ada data sales silahkan buat terlebih dahulu !</p>
                      @else
                      <select id="sales" name="sales" class="form-control select2" style="width: 100%;">
                        @foreach ($sales as $s)
                        <option value="{{ $s->id }}">{{ $s->nama }}</option>
                        @endforeach
                      </select>
                      @endif
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-6">
                      <label>Metode Pembayaran</label>
                      <select id="pembayaranUpdate" name="pembayaran" class="form-control select2" style="width: 100%;" onchange="toggleFieldsUpdate(this)">
                        <option value="cash">Cash</option>
                        <option value="kredit">Kredit</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6" id="tenorUpdate">
                      <label for="input-tenor">Tenor</label>
                      <input name="tenor" type="text" class="form-control" placeholder="Masukan tenor">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-6">
                      <label>Kabupaten</label>
                      @if ($kota == null)
                      <p class="text-danger">Tidak ada data kabupaten silahkan buat terlebih dahulu !</p>
                      @else
                      <select id="kabupaten" name="kabupaten" class="form-control select2" style="width: 100%;">
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
                      <select id="hasil" name="hasil" class="form-control select2" style="width: 100%;">
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
                      <select id="motor" name="motor" class="form-control select2" style="width: 100%;">
                        <option value="" selected>-- Pilih motor --</option>
                        @foreach ($motor as $m)
                        <option value="{{ $m->id }}">{{ $m->nama }}</option>
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
                    <div class="form-group col-md-6" id="leasingUpdate">
                      <label>Leasing</label>
                      <select name="leasing" class="form-control select2" style="width: 100%;">
                        <option value="" selected>-- Pilih leasing --</option>
                        @foreach ($leasing as $l)
                        <option value="{{ $l->id }}">{{ $l->nama }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="input-hasil">Catatan Penjualan</label>
                      <input name="catatan" type="text" class="form-control" placeholder="Masukan catatan penjualan motor (kosongkan jika tida ada)">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="status_pembayaran_dp">Status Pembayaran DP</label>
                      <select id="status_pembayaran_dp" name="status_pembayaran_dp" class="form-control select2" style="width: 100%;">
                        <option value="pending">Pending</option>
                        <option value="paid">Paid</option>
                        <option value="cod">COD</option>
                      </select>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="input-dp">DP</label>
                      <input name="dp" type="number" class="form-control" placeholder="Masukan DP yang sudah dipotong diskon" id="input-dp">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="input-diskon-dp">Diskon DP</label>
                      <input name="diskon_dp" type="number" class="form-control" placeholder="Masukan diskon DP" id="input-diskon-dp">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="input-hasil">Nomor PO</label>
                      <input name="nomor_po" type="text" class="form-control" placeholder="Kosongkan jika PO belum turun">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-6">
                      <label>Tanggal Dibuat: </label>
                      <div class="input-group date tanggal_dibuat" id="reservationdate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input tanggal_dibuat" data-target="#reservationdate" name="tanggal_dibuat" />
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Tanggal Hasil:</label>
                      <div class="input-group date tanggal_hasil" id="reservationdate2" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input tanggal_hasil" data-target="#reservationdate2" name="tanggal_hasil" />
                        <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
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
</section>

<!-- Modal detail -->
<section>
  <div class="modal fade" id="modalDetail" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Detail data</h4>
        </div>
        <div class="modal-body">
          <div class="card card-primary">
            <div class="card-body">
              <div class="form-group">
                <div class="row">
                  <div class="form-group col-md-12">
                    <label for="konsumen">Nama Konsumen</label>
                    <input name="konsumen" type="text" class="form-control" readonly>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12">
                    <label for="sales">Nama Sales</label>
                    <input name="sales" type="text" class="form-control" readonly>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="dp">DP</label>
                    <input name="dp" type="text" class="form-control" readonly>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="diskon_dp">Diskon DP</label>
                    <input name="diskon_dp" type="text" class="form-control" readonly>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="metode_pembayaran">Metode Pembayaran</label>
                    <input name="metode_pembayaran" type="text" class="form-control" readonly>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="status_dp">Status Pembayaran DP</label>
                    <input name="status_dp" type="text" class="form-control" readonly>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="nomor_po">Nomor PO</label>
                    <input name="nomor_po" type="text" class="form-control" readonly>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="leasing">Leasing</label>
                    <input name="leasing" type="text" class="form-control" readonly>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="tenor">Tenor</label>
                    <input name="tenor" type="text" class="form-control" readonly>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="motor">Nama Motor</label>
                    <input name="motor" type="text" class="form-control" readonly>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="jumlah">Jumlah</label>
                    <input name="jumlah" type="text" class="form-control" readonly>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="kota">Kota</label>
                    <input name="kota" type="text" class="form-control" readonly>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="hasil">Hasil</label>
                    <input name="hasil" type="text" class="form-control" readonly>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="catatan">Catatan</label>
                    <input name="catatan" type="text" class="form-control" readonly>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                    <label>Tanggal Dibuat: </label>
                    <div class="input-group date tanggal_dibuat" id="reservationdate" data-target-input="nearest">
                      <input type="text" class="form-control datetimepicker-input tanggal_dibuat" data-target="#reservationdate" name="tanggal_dibuat" readonly />
                      <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Tanggal Hasil:</label>
                    <div class="input-group date tanggal_hasil" id="reservationdate2" data-target-input="nearest">
                      <input type="text" class="form-control datetimepicker-input tanggal_hasil" data-target="#reservationdate2" name="tanggal_hasil" readonly />
                      <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Modal bayar -->
<div class="modal fade" id="modalBayar" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Bayar DP</h4>
      </div>
      <form action="" method="post">
        <input type="hidden" name="sales" id="id-sales">
        @csrf
        <div class="modal-body">
          <div class="form-group col-md-12">
            <label for="nama-sales">Nama Sales</label>
            <input type="text" class="form-control" id="nama-sales" readonly>
          </div>
          <div class="form-group col-md-12">
            <label for="nama-konsumen">Nama Konsumen</label>
            <input type="text" class="form-control" id="nama-konsumen" readonly name="konsumen">
          </div>
          <div class="form-group col-md-12">
            <label for="dp">DP</label>
            <input type="text" class="form-control" id="dp" readonly name="dp">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="pay-button">Bayar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal cetak -->
<div>
  <div class="modal fade" id="modalCetak" role="dialog" aria-labelledby="modalCetak">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="modalCetakHeader"></h4>
        </div>
        <form action="{{ route('admin.cetakPDF') }}" method="GET" target="_blank">
          <input type="hidden" value="{{ date('m/d/Y', strtotime($p->tanggal_dibuat)) }}" name="tanggal_dibuat" id="tanggal_dibuat">
          <input type="hidden" value="{{$p->nama_konsumen}}" name="nama_pemohon">
          <input type="hidden" value="{{$p->kota->nama}}" name="kabupaten">
          <input type="hidden" value="{{$p->id_motor}}" name="motor">
          <input type="hidden" value="{{$p->id}}" name="id_penjualan">
          <div class="modal-body">
            <div class="card card-primary">
              <div class="card-body">
                <div class="form-group">
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="input-hasil">Nomor KTP</label>
                      <input name="no_ktp" type="number" class="form-control" placeholder="Masukan nomor KTP">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="input-hasil">Alamat Customer</label>
                      <input name="alamat" type="text" class="form-control" placeholder="Masukan alamat customer">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="input-tenor">BPKB/STNK a.n</label>
                      <input name="bpkb_stnk" type="text" class="form-control" placeholder="Masukan BPKB/STNK a.n">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="input-tenor">Nomor HP</label>
                      <input name="nomor_hp" type="tel" class="form-control" placeholder="Masukan Nomor HP">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="input-tenor">DP</label>
                      <input name="dp" type="number" class="form-control" placeholder="Masukan DP" readonly>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="input-tenor">Total Diskon</label>
                      <input name="total_diskon" type="number" class="form-control" placeholder="Masukan total diskon" readonly>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="input-tenor">Kelengkapan</label>
                      <input name="kelengkapan" type="text" class="form-control" placeholder="Masukan kelengkapan">
                    </div>
                    <div class="form-group col-md-6">
                      <label>Metode Pembayaran</label>
                      <select id="metodePembayaran" name="metode_pembayaran" class="form-control select2 metodePembayaran" style="width: 100%;" onchange="toggleMetodeLainnya(this)">
                        <option value="tunai" selected>Tunai</option>
                        <option value="cek">Cek/Bilyet Giro</option>
                        <option value="">Kredit</option>
                      </select>
                      <div class="form-check my-3 metodeHide" id="metodeLainnya" style="display: none;">
                        <input type="text" class="form-control" placeholder="Masukan nama leasing" name="metode_lainnya">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="input-tenor">Warna Motor</label>
                      <input name="warna" type="text" class="form-control" placeholder="Masukan warna motor">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-12" id="jangkaWaktuInput">
                      <label for="input-tenor">Jangka Waktu</label>
                      <input name="jangka_waktu" type="text" class="form-control" placeholder="Jangka waktu tenor (kosongkan jika cash)">
                    </div>
                  </div>

                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Cetak</button>
              </div>
        </form>
      </div>
    </div>
  </div>
</div>



@endsection
@push('script')
<script src="https://cdn.datatables.net/datetime/1.5.1/js/dataTables.dateTime.min.js"></script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Initial check when the page loads
    var pembayaranElement = document.getElementById('pembayaranUpdate');
    toggleFieldsUpdate(pembayaranElement);
  });

  function toggleFieldsUpdate(selectElement) {
    var tenorField = document.getElementById('tenorUpdate');
    var leasingField = document.getElementById('leasingUpdate'); // Assuming you have a leasing field

    if (selectElement.value === 'cash') {
      tenorField.style.display = 'none';
      leasingField.style.display = 'none';
    } else {
      tenorField.style.display = 'block';
      leasingField.style.display = 'block';
    }
  }
</script>

<script>
  $(document).on('click', '.load-payment-modal', function() {
    var url = $(this).data('url');
    var actionUrl = $(this).data('action-url');

    $.ajax({
      url: url,
      type: 'GET',
      dataType: 'json',
      success: function(data) {
        console.log(data.dp);
        $('#modalBayar form').attr('action', actionUrl);
        $('#id-sales').val(data.sales.id);
        $('#nama-sales').val(data.sales.nama);
        $('#nama-konsumen').val(data.nama_konsumen);
        $('#dp').val(Number(data.dp) - Number(data.diskon_dp));
      },
      error: function(xhr, status, error) {
        swal({
          title: `Error`,
          text: error,
          icon: "error",
          buttons: true,
          dangerMode: true,
        })
      }
    });
  });
</script>

<script>
  // This function toggles additional input fields based on the selected payment method.
  function toggleMetodeLainnya(selectElement) {
    var metodeLainnyaInput = document.getElementById('metodeLainnya');
    var jangkaWaktuInput = document.getElementById('jangkaWaktuInput');

    if (selectElement.value === 'tunai' || selectElement.value === 'cek') {
      metodeLainnyaInput.style.display = 'none';
      jangkaWaktuInput.style.display = 'none';
    } else {
      metodeLainnyaInput.style.display = 'block';
      jangkaWaktuInput.style.display = 'block';
    }
  }

  // When the 'Cetak' button is clicked, this event handler will fetch the data
  // and populate the print modal fields.
  $(document).on('click', '.load-print-modal', function() {
    var id = $(this).data('id');
    var dataUrl = $(this).data('url');
    var modalId = '#modalCetak'; // Make sure this matches the ID of your modal

    // Fetch the data and populate the modal
    $.ajax({
      url: dataUrl,
      type: 'GET',
      dataType: 'json',
      success: function(data) {
        console.log(data)
        // Assuming 'data' contains all the necessary fields for the print modal
        $(modalId + ' #tanggal_dibuat').val(data.tanggal_dibuat);
        $(modalId + ' [name="nama_pemohon"]').val(data.nama_konsumen);
        $(modalId + ' [name="kabupaten"]').val(data.kota.nama);
        $(modalId + ' [name="motor"]').val(data.id_motor);
        $(modalId + ' [name="id_penjualan"]').val(data.id);
        $(modalId + ' [name="dp"]').val(Number(data.dp));
        $(modalId + ' [name="total_diskon"]').val(Number(data.diskon_dp));

        // Update the form action URL dynamically
        $(modalId + ' form').attr('action', '{{route("admin.cetakPDF")}}');

        // Show the modal
        $(modalId).modal('show');
      },
      error: function(xhr, status, error) {
        alert('An error occurred while loading print data: ' + error);
      }
    });

    // Call the toggle function for the existing method selection
    var metodePembayaranSelect = document.getElementById('metodePembayaran');
    toggleMetodeLainnya(metodePembayaranSelect);
  });
</script>

<script>
  $(document).on('click', '.load-update-modal', function() {
    var dataUrl = $(this).data('url');
    var modalId = '#modalEdit';
    var modal = $(modalId);
    var baseActionUrl = modal.data('base-action-url');

    $.ajax({
      url: dataUrl,
      type: 'GET',
      dataType: 'json',
      success: function(response) {
        var data = response.data; // Ensure you are referencing the data object correctly
        var dpValue = Number(data.dp);
        var diskonDpValue = Number(data.diskon_dp);

        // Populate the modal's form fields with the fetched data
        modal.find('[name="konsumen"]').val(data.nama_konsumen);
        modal.find('[name="sales"]').val(data.id_sales).trigger('change');
        modal.find('[name="pembayaran"]').val(data.pembayaran).trigger('change');
        modal.find('[name="tenor"]').val(data.tenor);
        modal.find('[name="nomor_po"]').val(data.no_po);
        modal.find('[name="kabupaten"]').val(data.id_kota).trigger('change');
        modal.find('[name="hasil"]').val(data.id_hasil).trigger('change');
        modal.find('[name="motor"]').val(data.id_motor).trigger('change');
        modal.find('[name="jumlah"]').val(data.jumlah);
        modal.find('[name="leasing"]').val(data.id_lising).trigger('change'); // Make sure the field is 'leasing' and not 'lising'
        modal.find('[name="catatan"]').val(data.catatan);
        modal.find('[name="status_pembayaran_dp"]').val(data.status_pembayaran_dp).trigger('change');
        modal.find('[name="dp"]').val(dpValue);
        modal.find('[name="diskon_dp"]').val(diskonDpValue);

        // Correctly format the dates before setting the values
        var tanggalDibuat = data.tanggal_dibuat ? formatDate(data.tanggal_dibuat) : '';
        var tanggalHasil = data.tanggal_hasil ? formatDate(data.tanggal_hasil) : '';

        modal.find('[name="tanggal_dibuat"]').val(tanggalDibuat);
        modal.find('[name="tanggal_hasil"]').val(tanggalHasil);

        function formatDate(dateString) {
          var options = {
            year: 'numeric',
            month: '2-digit',
            day: '2-digit'
          };
          var formattedDate = new Date(dateString).toLocaleDateString('en-US', options);
          return formattedDate;
        }


        // Update the form action URL dynamically
        var actionUrl = baseActionUrl.replace('__id__', data.id);
        modal.find('form').attr('action', actionUrl);

        // Show the modal
        modal.modal('show');
      },
      error: function(xhr, status, error) {
        alert('An error occurred: ' + error);
      }
    });
  });
</script>

<script>
  $(document).on('click', '.load-detail-modal', function() {
    var dataUrl = $(this).data('url');
    var modalId = '#modalDetail';
    var modal = $(modalId);
    var baseActionUrl = modal.data('base-action-url');

    $.ajax({
      url: dataUrl,
      type: 'GET',
      dataType: 'json',
      success: function(response) {
        var data = response.data; // Ensure you are referencing the data object correctly
        console.log(data);
        var dpValue = Number(data.dp);
        var diskonDpValue = Number(data.diskon_dp);

        // Populate the modal's form fields with the fetched data
        modal.find('[name="konsumen"]').val(data.nama_konsumen);
        modal.find('[name="sales"]').val(data.sales.nama);
        modal.find('[name="metode_pembayaran"]').val(data.pembayaran);
        modal.find('[name="status_dp"]').val(data.status_pembayaran_dp);
        modal.find('[name="dp"]').val(data.dp);
        modal.find('[name="diskon_dp"]').val(data.diskon_dp);
        modal.find('[name="nomor_po"]').val(data.no_po ? data.no_po : 'Belum ada');
        modal.find('[name="tenor"]').val(data.tenor);
        modal.find('[name="kota"]').val(data.kota.nama);
        modal.find('[name="hasil"]').val(data.hasil.hasil);
        modal.find('[name="motor"]').val(data.motor.nama);
        modal.find('[name="jumlah"]').val(data.jumlah);
        modal.find('[name="leasing"]').val(data.leasing ? data.leasing.nama : 'Cash'); // Make sure the field is 'leasing' and not 'lising'
        modal.find('[name="catatan"]').val(data.catatan);
        modal.find('[name="status_pembayaran_dp"]').val(data.status_pembayaran_dp);
        modal.find('[name="dp"]').val(dpValue);
        modal.find('[name="diskon_dp"]').val(diskonDpValue);

        // Correctly format the dates before setting the values
        var tanggalDibuat = data.tanggal_dibuat ? formatDate(data.tanggal_dibuat) : '';
        var tanggalHasil = data.tanggal_hasil ? formatDate(data.tanggal_hasil) : '';

        modal.find('[name="tanggal_dibuat"]').val(tanggalDibuat);
        modal.find('[name="tanggal_hasil"]').val(tanggalHasil);

        function formatDate(dateString) {
          var options = {
            year: 'numeric',
            month: '2-digit',
            day: '2-digit'
          };
          var formattedDate = new Date(dateString).toLocaleDateString('en-US', options);
          return formattedDate;
        }

        // Show the modal
        modal.modal('show');
      },
      error: function(xhr, status, error) {
        alert('An error occurred: ' + error);
      }
    });
  });
</script>

<script>
  $('.select2').select2()

  function toggleLeasingInput() {
    if ($('#pembayaran-input').val() === 'cash') {
      $('#leasing-input').closest('.form-group').hide();
      $('#input-tenor').closest('.form-group').hide();
    } else {
      $('#leasing-input').closest('.form-group').show();
      $('#input-tenor').closest('.form-group').show();
    }
  }
  toggleLeasingInput();
  $('#pembayaran-input').change(function() {
    toggleLeasingInput();
  });

  let minDate, maxDate;
  var table = $('#data-sale').DataTable({
    dom: 'Bfrtip', // 'B' for buttons
    buttons: [{
      extend: 'excelHtml5',
      title: 'Penjualan BliMoto', // Excel export button
      exportOptions: {
        columns: ':not(.no-export)' // Exclude columns with the class 'no-export'
      }
    }],
    order: [
      [0, 'desc']
    ],
    // columnDefs: [{
    //   targets: 'no-visible',
    //   visible: false, // Set the visibility to false for 'no-visible' class
    // }]
  });

  // Apply the filter on input change
  $('#min, #max').on('change', function() {
    table.draw();
  });

  // Create date inputs
  minDate = new DateTime('#min', {});
  maxDate = new DateTime('#max', {});
  // Custom filtering function which will search data in column four between two values
  $.fn.dataTable.ext.search.push(
    function(settings, data, dataIndex) {
      var minDate = $('#min').val();
      var maxDate = $('#max').val();
      var date = moment(data[11]);
      if (
        (minDate === '' || date.isSameOrAfter(minDate)) &&
        (maxDate === '' || date.isSameOrBefore(maxDate))
      ) {
        return true;
      }

      return false;
    }
  );
</script>

<script>
  function initDatePickers() {
    $('.tanggal_dibuat').datetimepicker({
      format: 'L'
    });

    $('.tanggal_hasil').datetimepicker({
      format: 'L'
    });
  }

  $(document).ready(function() {
    $('#data-sale').on('shown.bs.modal', '.modal', function() {
      initDatePickers();
      $('.select2').select2()
    });

    $('button[data-toggle="modal"]').on('click', function() {
      initDatePickers();
      $('.select2').select2()
    });
  });

  function formatTanggal(tanggal) {
    return moment(tanggal, 'MM/DD/YYYY').format('DD MMMM YYYY');
  }

  $('.jangka_waktu').datetimepicker({
    format: 'L',
    locale: 'id',
  });

  $('.jangka_waktu').on('change.datetimepicker', function(e) {
    var tanggalDiformat = formatTanggal(e.date);
    $('.jangka_send').val(tanggalDiformat);
  });

  var tanggalInput = $('#tanggal_dibuat');
  var tanggalLama = tanggalInput.val();
  var tanggalBaru = formatTanggal(tanggalLama);
  tanggalInput.val(tanggalBaru);

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

<script>
  $(document).on('click', '#pay-button', function(e) {
    e.preventDefault();

    var form = $(this).closest('form');
    var formData = new FormData(form.get(0));

    fetch(form.attr('action'), {
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': '{{ csrf_token() }}',
          'Accept': 'application/json',
        },
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        if (data.redirect_url) {
          // Open the Midtrans payment page in a new tab
          window.open(data.redirect_url, '_blank');
        } else {
          swal({
            title: `Error`,
            text: data.pesan,
            icon: "error",
            buttons: true,
            dangerMode: true,
          })
        }
      })
      .catch(error => {
        console.error('Error:', error);
      });
  });
</script>

@endpush