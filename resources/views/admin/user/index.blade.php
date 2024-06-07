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
																		<th style="width: 1rem;">#</th>
																		<th>Nomor</th>
																		<th>Nama</th>
																		<th>IG</th>
																		<th>Verifikasi</th>
																		<th>Aksi</th>
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
																				<td>
																						<a href="{{ route('admin.users.edit', $e->id) }}" class="btn btn-warning">edit</a>
																						<button class="btn btn-danger delete-button" data-id="{{ $e->id }}">delete</button>
																				</td>
																		</tr>
																@endforeach
														</tbody>
														<tfoot>
																<tr>
																		<th>#</th>
																		<th>Nomor</th>
																		<th>Nama</th>
																		<th>IG</th>
																		<th>Verifikasi</th>
																		<th>Aksi</th>
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


				$(document).ready(function() {
						$('.delete-button').on('click', function(e) {
								e.preventDefault();
								const userId = $(this).data('id');
								const row = $(this).closest('tr');

								Swal.fire({
										title: 'Anda yakin?',
										text: "Data yang dihapus tidak dapat dikembalikan!",
										icon: 'warning',
										showCancelButton: true,
										confirmButtonColor: '#d33',
										cancelButtonColor: '#3085d6',
										confirmButtonText: 'Ya, hapus!',
										cancelButtonText: 'Batal'
								}).then((result) => {
										if (result.isConfirmed) {
												// Submit form penghapusan dengan AJAX
												$.ajax({
														url: `/app/users/${userId}`,
														type: 'DELETE',
														data: {
																_token: '{{ csrf_token() }}',
														},
														success: function(response) {
																Swal.fire('Dihapus!', response.message, 'success');
																row.remove(); // Hapus baris dari tabel
														},
														error: function(xhr) {
																Swal.fire('Error!', 'Terjadi kesalahan saat menghapus data.', 'error');
																console.error(xhr);
														}
												});
										}
								});
						});
				});
		</script>
@endpush
