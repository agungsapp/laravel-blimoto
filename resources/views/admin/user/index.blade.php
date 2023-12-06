@extends('admin.layouts.main')
@section('content')
<section class="container-fluid mt-4">
	<div class="row">
		<div class="col-12">
			<div class="card card-primary">
				<div class="card-header">
					<div class="card-title">
						Data User
					</div>
				</div>
				<div class="card-body">
					<table id="dataUser" class="table-bordered table-striped table">
						<thead>
							<tr>
								<th>Nomor</th>
								<th>Nomor</th>
								<th>Nama</th>
								<th>IG</th>
								<th>Verifikasi</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($users as $e)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $e->nomor_hp }}</td>
								<td>{{ $e->nama }}</td>
								<td>{{ $e->ig ?? 'Tidak ada' }}</td>
								<td>{{ $e->is_verified == 1 ? 'Sudah' : 'Belum' }}</td>
							</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<th>Nomor</th>
								<th>Nomor</th>
								<th>Nama</th>
								<th>IG</th>
								<th>Verifikasi</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@push('script')
<script>
	$("#dataUser").DataTable({
		"responsive": true,
		"lengthChange": false,
		"autoWidth": false,
		//"buttons": ["copy", "csv", "excel", "pdf", "print"] //, "colvis"
	}).buttons().container().appendTo('#dataUser .col-md-6:eq(0)');
</script>
@endpush