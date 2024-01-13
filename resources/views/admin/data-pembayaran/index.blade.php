@extends('admin.layouts.main')
@section('content')
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Data Sudah Bayar</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive">

          <table id="data-kota" class="table table-bordered table-striped">
            <thead>
              <tr role="row">
                <th>NO</th>
                <th>Nama Konsumen</th>
                <th>Nama Sales</th>
                <th>Motor</th>
                <th>Jumlah</th>
                <th>DP</th>
                <th>Diskon DP</th>
                <th>Status Pembayaran</th>
                <th>Kota</th>
                <th>Leasing</th>
                <th>Tanggal Dibuat</th>
                <th>Tanggal Hasil</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($penjualan as $index => $p)
              <tr role="row" class="{{ $index % 2 == 0 ? 'even' : 'odd' }}">
                <td>{{ $loop->iteration }}</td>
                <td>{{$p->nama_konsumen}}</td>
                <td>{{$p->sales->nama}}</td>
                <td>{{$p->motor->nama}}</td>
                <td>{{$p->jumlah}}</td>
                <td>{{$p->dp}}</td>
                <td>{{$p->diskon_dp}}</td>
                <td>{{$p->status_pembayaran_dp}}</td>
                <td>{{$p->kota->nama}}</td>
                <td>{{$p->leasing->nama}}</td>
                <td>{{$p->tanggal_dibuat}}</td>
                <td>{{$p->tanggal_hasil}}</td>
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
    $("#data-kota").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
    }).buttons().container().appendTo('#dataMotor_wrapper .col-md-6:eq(0)');
  });
</script>
@endpush