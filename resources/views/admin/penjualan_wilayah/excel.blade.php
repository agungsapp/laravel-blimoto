<table id="data-kota-motor" class="table-bordered table-striped table">
		<thead>
				<tr role="row">
						<th>NO</th>
						<th>Kode Transaksi</th>
						<th>Nama Konsumen</th>
						<th>Nama Sales</th>
						<th>Wilayah</th>
						<th>Status Pembayaran Dp</th>
						<th>Metode Pembelian</th>
						<th>Leasing</th>
						<th>Motor</th>
						<th>Warna</th>
						<th>Hasil</th>
						<th width="170px">Tanggal</th>
				</tr>
		</thead>
		<tbody>
				@foreach ($laporans as $laporan)
						<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $laporan->kode_transaksi }}</td>
								<td>{{ $laporan->nama_konsumen }}</td>
								<td>{{ $laporan->sales->nama }}</td>
								<td>{{ $laporan->kota->nama }}</td>
								<td>{{ $laporan->status_pembayaran_dp }}</td>
								<td>{{ $laporan->metode_pembelian }}</td>
								<td>{{ $laporan->leasing->nama ?? 'cash' }}</td>
								<td>{{ $laporan->motor->nama }}</td>
								<td>{{ $laporan->warna_motor }}</td>
								<td>{{ $laporan->hasil->hasil }}</td>
								<td>{{ $laporan->tanggal_dibuat }}</td>
						</tr>
				@endforeach
		</tbody>
</table>
