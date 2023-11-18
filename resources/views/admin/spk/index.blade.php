@extends('admin.layouts.main')
@section('content')

<section class="content">

  <div class="row">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header with-border">
          <h3 class="card-title">Cetak Data SPK</h3>
        </div>
        <form action="{{ route('admin.cetakPDF') }}" method="GET">
          <div class="card-body">
            <div class="row">
              <div class="form-group col-md-4">
                <label for="nomor_spk">Nomor SPK</label>
                <input name="nomor_spk" type="text" class="form-control" id="nomor_spk">
              </div>
              <div class="form-group col-md-4">
                <label for="nomor_hp">Nomor HP</label>
                <input name="nomor_hp" type="text" class="form-control" id="nomor_hp">
              </div>
              <div class="form-group col-md-4">
                <label for="no_ktp">No KTP</label>
                <input name="no_ktp" type="text" class="form-control" id="no_ktp">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="nama_pemohon">Nama Pemohon</label>
                <input name="nama_pemohon" type="text" class="form-control" id="nama_pemohon">
              </div>
              <div class="form-group col-md-6">
                <label for="kabupaten">Kabupaten</label>
                <input name="kabupaten" type="text" class="form-control" id="kabupaten">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="bpkb_stnk">BPKB/STNK</label>
                <input name="bpkb_stnk" type="text" class="form-control" id="bpkb_stnk">
              </div>
              <div class="form-group col-md-6">
                <label>Tanggal Pesanan</label>
                <input type="hidden" class="tanggal_pesan" name="tanggal_pesan">
                <div class="input-group date tanggal_pesanan" id="reservationdate" data-target-input="nearest">
                  <input type="text" class="form-control datetimepicker-input tanggal_dibuat" data-target="#reservationdate" />
                  <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="unit">Unit</label>
                <input name="unit" type="text" class="form-control" id="unit">
              </div>
              <div class="form-group col-md-6">
                <label for="type">Type</label>
                <input name="type" type="text" class="form-control" id="type">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="warna">Warna</label>
                <input name="warna" type="text" class="form-control" id="warna">
              </div>
              <div class="form-group col-md-6">
                <label for="harga">Harga</label>
                <input name="harga" type="text" class="form-control" id="harga">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="ket_program">Keterangan Program</label>
                <input name="ket_program" type="text" class="form-control" id="ket_program">
              </div>
              <div class="form-group col-md-6">
                <label for="nama_diskon">Nama Diskon</label>
                <input name="nama_diskon" type="text" class="form-control" id="nama_diskon">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="kelengkapan">Kelengkapan</label>
                <input name="kelengkapan" type="text" class="form-control" id="kelengkapan">
              </div>
              <div class="form-group col-md-6">
                <label for="dp">DP</label>
                <input name="dp" type="text" class="form-control" id="dp">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="total_diskon">Total Diskon</label>
                <input name="total_diskon" type="text" class="form-control" id="total_diskon">
              </div>
              <div class="form-group col-md-6">
                <label for="sisa_bayar">Sisa Yang Dibayar</label>
                <input name="sisa_bayar" type="text" class="form-control" id="sisa_bayar">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label>Metode Pembayaran</label>
                <select id="metodePembayaran" name="metode_pembayaran" class="form-control select2" style="width: 100%;">
                  <option value="tunai">Tunai</option>
                  <option value="cek">Cek/Bilyet Giro</option>
                  <option value="">Kredit</option>
                </select>
                <div class="form-check my-3" id="metodeHide">
                  <input type="text" class="form-control" placeholder="Masukan nama leasing" name="metode_lainnya">
                </div>
              </div>
              <div class="form-group col-md-6">
                <label>Jangka Waktu</label>
                <input type="hidden" class="jangka_send" name="jangka_waktu">
                <div class="input-group date jangka_waktu" id="reservationdate_jangka" data-target-input="nearest">
                  <input type="text" class="form-control datetimepicker-input tanggal_dibuat" data-target="#reservationdate_jangka" />
                  <div class="input-group-append" data-target="#reservationdate_jangka" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cetak PDF</button>
          </div>
        </form>
      </div>

    </div>
  </div>

</section>

@endsection
@push('script')
<script>
  $('.select2').select2()
  // Pastikan Anda telah menyertakan library Moment.js di proyek Anda
  $('.jangka_waktu').datetimepicker({
    format: 'L',
    locale: 'id' // Atur locale sesuai dengan bahasa yang diinginkan, misalnya 'id' untuk Bahasa Indonesia
  });
  $('.tanggal_pesanan').datetimepicker({
    format: 'L',
    locale: 'id' // Atur locale sesuai dengan bahasa yang diinginkan, misalnya 'id' untuk Bahasa Indonesia
  });

  // Fungsi untuk mengonversi format tanggal
  function formatTanggal(tanggal) {
    return moment(tanggal, 'MM/DD/YYYY').format('DD MMMM YYYY');
  }

  // Mendengarkan perubahan pada input tanggal
  $('.jangka_waktu').on('change.datetimepicker', function(e) {
    var tanggalDiformat = formatTanggal(e.date);
    $('.jangka_send').val(tanggalDiformat);
  });

  $('.tanggal_pesanan').on('change.datetimepicker', function(e) {
    var tanggalDiformat = formatTanggal(e.date);
    $('.tanggal_pesan').val(tanggalDiformat);
  });

  $('#metodeHide').hide();
  $('#metodePembayaran').on('change', function() {
    if ($(this).val() === '') {
      $('#metodeHide').show();
    } else {
      $('#metodeHide').hide();
    }
  });
</script>
@endpush