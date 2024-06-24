<table id="data-kota-motor" class="table-bordered table-responsive table-striped table">
		<thead>
				<tr role="row">
						<th>NO</th>
						<th>Kode Transaksi</th>
						<th>NIK</th>
						<th>Nama Konsumen</th>
						<th>Motor</th>
						<th>Nama Sales</th>
						<th>Wilayah</th>
						<th>Status Pembayaran Dp</th>
						<th>Metode Pembelian</th>
						<th>Metode Pembayaran</th>
						<th>Leasing</th>
						<th>Tenor</th>
						<th>TDP</th>
						<th>Tanda Jadi/ Pelunasan</th>
						<th>DP Asli</th>
						<th>Angsuran</th>
						<th>Bpkb</th>
						<th>Nomor Handphone</th>
						<th>Warna</th>
						<th>Hasil</th>
						<th>Nomor PO</th>
						<th width="170px">Tanggal</th>
				</tr>
		</thead>
		<tbody>
				@foreach ($laporans as $laporan)
						<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $laporan->kode_transaksi }}</td>
								<td>{{ $laporan->nik }}</td>
								<td>{{ $laporan->nama_konsumen }}</td>
								<td>{{ $laporan->motor->nama }}</td>
								<td>{{ $laporan->sales->nama }}</td>
								<td>{{ $laporan->kota->nama }}</td>
								<td>{{ $laporan->status_pembayaran_dp }}</td>
								<td>{{ $laporan->metode_pembelian }}</td>
								<td>{{ $laporan->metode_pembayaran }}</td>
								<td>{{ $laporan->leasing->nama ?? 'cash' }}</td>
								<td>{{ $laporan->tenor == '0' ? 'cash' : $laporan->tenor }}</td>
								<td>{{ $laporan->detailPembayaran[0]->jumlah_bayar }}</td>
								<td>
										{{ $laporan->detailPembayaran[0]->status == 'tanda' ? 'tanda jadi' : $laporan->detailPembayaran[0]->status }}
								</td>
								<td>{{ $laporan->dp_asli }}</td>
								<td>{{ $laporan->angsuran }}</td>
								<td>{{ $laporan->bpkb }}</td>
								<td>{{ $laporan->no_hp }}</td>
								<td>{{ $laporan->warna_motor }}</td>
								<td>{{ $laporan->hasil->hasil }}</td>
								<td>{{ $laporan->no_po ?? 'kosong' }}</td>
								<td>{{ $laporan->tanggal_dibuat }}</td>
						</tr>
				@endforeach
		</tbody>
</table>
