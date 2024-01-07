<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Surat Pesanan Kendaraan (SPK)_{{$nama_pemohon}}</title>
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
        <p>Jl. Kemang Sel. No.99A</p>
        <p>Bangka, Kec. Mampang Prpt</p>
        <p>Kota Jakarta Selatan Daerah Khusus Ibukota 12730</p>
        <p>Email: blimotoindonesia@gmail.com</p>
        <p>HP: 0823-2222-2023</p>
      </div>
      <div class="col"></div>
    </div>
    <hr style="border: 3px solid black;">
    <div class="row">
      <div class="col"></div>
      <div class="col text-center">
        <h4>Surat Pesanan Kendaraan (SPK)</h4>
      </div>
      <div class="col"></div>
      <!-- <div class="col text-right">133</div> -->
    </div>
    <div class="row">
      <div class="col">
        <p>Nomor SPK: {{$nomor_spk}}</p>
        <p>Tanggal Pesanan: {{$tanggal_pesan}}</p>
        <p>No KTP: {{$no_ktp}}</p>
        <p>Nama Pemohon: {{$nama_pemohon}}</p>
        <p>Kabupaten: {{$kabupaten}}</p>
        <p>BPKB/STNK a.n: {{$bpkb_stnk}}</p>
        <p>Nomor HP: {{$nomor_hp}}</p>
        <p>Alamat: {{$alamat}}</p>
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
          <li>Berlaku, harga tidak mengikat. jika ada perubahan akan dihubungi sales.</li>
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
        <p>Kelengkapan: {{$kelengkapan}}</p>
        <hr style="border: 1px solid black;">
        <br>

        <table class="table table-bordered table-striped">
          <tr>
            <td>Harga Total</td>
            <td>: {{$harga}}</td>
          </tr>
          <tr>
            <td>DP</td>
            <td>: {{$dp}}</td>
          </tr>
          <tr>
            <td>Total Diskon</td>
            <td>: {{$total_diskon}}</td>
          </tr>
          <tr>
            <td>Sisa DP Yang Harus Dibayar</td>
            <td>: {{$sisa_bayar}}</td>
          </tr>
          <tr>
            <td>Metode Pembayaran</td>
            <td>:
              @if($metode_pembayaran==='tunai')
              Tunai
              @elseif($metode_pembayaran==='cek')
              Cek/Bilyet Giro
              @elseif(!is_null($metode_lainnya))
              Kredit Via {{$metode_lainnya}}
              @endif
            </td>
          </tr>
          @if(!is_null($metode_lainnya))
          <tr>
            <td>Tenor</td>
            <td>: {{$jangka_waktu ? $jangka_waktu . ' Bulan' : 'Cash'}}</td>
          </tr>
          @endif
        </table>

      </div>
    </div>
    <div class="row text-center" style="margin-top: 100px;">
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

<script>
  window.addEventListener('load', function() {
    window.print();
  });
</script>