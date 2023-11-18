<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Surat Pesanan Kendaraan (SPK)</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('plugins') }}/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist') }}/css/AdminLTE.min.css">
</head>

<body>

  <section class="content">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col-4 text-center">
        <img src="{{ asset('/assets/images/logo/Logo-blimoto.webp') }}" class="img-fluid mx-auto" alt="logo" />
      </div>
      <div class="col-4 text-center" style="line-height: 1px;">
        <h2>PT Blimoto Indonesia</h2>
        <p>Jl. Dr. Saharjo Jl. Tebet Raya No.319, RT.10/</p>
        <p>RW.1, Tebet Barm Kec. Tebet</p>
        <p>Kota Jakarta Selatan Daerah Khusus Ibukota</p>
        <p>Jakarta 12810</p>
      </div>
      <div class="col"></div>
    </div>
    <hr style="border: 3px solid black;">
    <div class="row">
      <div class="col">
        <p>Nomor SPK: {{$nomor_spk}}</p>
        <p>Tanggal Pesanan: {{$tanggal_pesan}}</p>
        <p>No KTP: {{$no_ktp}}</p>
        <p>Nama Pemohon: {{$nama_pemohon}}</p>
        <p>Kabupaten: {{$kabupaten}}</p>
        <p>BPKB/STNK a.n: {{$bpkb_stnk}}</p>
        <p>Nomor HP: {{$nomor_hp}}</p>
        <br>
        <hr style="border: 1px solid black;">
        <p>SYARAT DAN KETENTUAN</p>
        <hr style="border: 1px solid black;">
        <ol>
          <li>Harga ynag tercantum dapat berubah sesuai dengan harga yang berlaku saat penyerahan barang</li>
          <li>Surat pesanan ini dianggap sah apabila</li>
          <ol type="a">
            <li>Telah ditandatangani oleh pemesan</li>
            <li>Telah disetujui oleh pejabat sales office</li>
          </ol>
          <li>Nama yang tertera pada faktur STNK yang tercantum dalam surat pesanan ini tidak dapat dirubah</li>
          <li>Pembayaran tunai dianggap sah apabila telah diterbitkan kwitansi atas nama (Dealer)</li>
          <li>Pembayaran dengan cek/bilyet/giro/transfer harus diatasnamakan</li>
          <li>Pemesanan berkewajiban membayar tambahan biaya/pajak kendaraan dalam hal terdapat penambahan biaya pajak karena berlakunya ketentuan perundangan tentang pajak progresif atas pemikiran dan pendaftaran kendaraan bermotor atau karena adanya perubahan tarif pajak yang berlaku pada saat pendaftaran</li>
          <li>Pemesan bersedia menerima telpon untuk di follow up, penawaran dan keperluan lainnya dari pihak dealer</li>
        </ol>
      </div>
      <div class="col-1 d-flex align-item-center justify-content-center" style="max-width: 1%;">
        <div style="border-left: 1px solid black;"></div>
      </div>
      <div class="col">
        <p class="text-center">Unit Sepeda Motor</p>
        <table id="data-kota" class="table table-bordered table-striped">
          <thead>
            <tr role="row">
              <th>Unit</th>
              <th>Type</th>
              <th>Warna</th>
              <th>Harga</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{$unit}}</td>
              <td>{{$type}}</td>
              <td>{{$warna}}</td>
              <td>{{$harga}}</td>
            </tr>
          </tbody>
        </table>
        <p>Keterangan Program: {{$ket_program}}</p>
        <p>Nama Diskon: {{$nama_diskon}}</p>
        <p>Kelengkapan: {{$kelengkapan}}</p>
        <hr style="border: 1px solid black;">
        <p>Harga Total Kenderaan (OTR): {{$harga}}</p>
        <p>DP: {{$dp}}</p>
        <p>Total Diskon: {{$total_diskon}}</p>
        <p>Sisa Yang Harus Dibayar: {{$sisa_bayar}}</p>
        <fieldset>
          <p>Metode Pembayaran</p>
          <input type="checkbox" id="tunai" name="pembayaran" value="tunai" @if($metode_pembayaran==='tunai' ) checked @endif>
          <label for="tunai" style="margin-right: 50px;">Tunai</label>

          <input type="checkbox" id="cek" name="pembayaran" value="cek" @if($metode_pembayaran==='cek' ) checked @endif>
          <label for="cek">Cek/Bilyet Giro</label>
        </fieldset>
        <fieldset>
          <input type="checkbox" id="kredit" name="pembayaran" value="kredit" @if(!is_null($metode_lainnya)) checked @endif>
          <label for="kredit">Kredit Via: {{$metode_lainnya ?? ''}}</label>
        </fieldset>
        <p>Jangka Waktu: {{$jangka_waktu}}</p>
      </div>
    </div>
    <div class="row text-center mt-4">
      <div class="col">
        <p>Disetujui Oleh</p>
      </div>
    </div>
    <div class="row text-center">
      <div class="col">
        <p>Kepala Cabang / Dealer</p>
        <br>
        <br>
        <br>
        <p>(____________)</p>
      </div>
      <div class="col">
        <p>Sales People</p>
        <br>
        <br>
        <br>
        <p>(____________)</p>
      </div>
      <div class="col">
        <p>Pemesaan</p>
        <br>
        <br>
        <br>
        <p>(____________)</p>
      </div>
    </div>
  </section>
</body>

</html>