<!DOCTYPE html>
<html lang="en">

<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Cetak</title>

		<style>
				body {
						font-family: Arial, sans-serif;
						margin: 0;
						padding: 0;
						font-size: 12px;
				}

				.container {
						padding: 20px;
				}

				.table {
						width: 100%;
						border-collapse: collapse;
						margin-top: 20px;
				}

				th,
				td {
						border: 1px solid black;
						text-align: left;
						padding: 8px;
				}

				th {
						background-color: #f2f2f2;
				}

				h1,
				h3 {
						text-align: center;
				}
		</style>
</head>

<body>
		<div class="container">
				<h1>LAPORAN PENJUALAN WILAYAH {{ $kota }}</h1>
				<h3>Tanggal: {{ $tanggal_m }} s/d {{ $tanggal_s }}</h3>
				<table class="table">
						<thead>
								<tr>
										<th scope="col">No</th>
										<th scope="col">Nama Kota</th>
										<th scope="col">Nama Motor</th>
										<th scope="col">Tanggal</th>
								</tr>
						</thead>
						<tbody>
								@if ($penjualans->count() > 0)
										@foreach ($penjualans as $penjualan)
												<tr>
														<td>{{ $loop->iteration }}</td>
														<td>{{ $penjualan->kota->nama }}</td>
														<td>{{ $penjualan->motor->nama }}</td>
														<td>{{ $penjualan->tanggal_dibuat }}</td>

												</tr>
										@endforeach
								@else
										<tr>
												<td colspan="4" style="text-align: center"> -- Data masih kosong -- </td>
										</tr>
								@endif
						</tbody>
				</table>
		</div>
</body>

</html>
