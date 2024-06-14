@extends('admin.layouts.main')
@section('content')
		<div class="row">
				<div class="container">
						<div class="card">
								<div class="card-header">
										<div class="card-title">
												artisan command untuk optimasi
										</div>
								</div>
								<div class="card-body">

										<div class="alert alert-info" role="alert">
												<h4 class="alert-heading">Perhatian !</h4>
												<p>Gunakan Artisan::command ini, hanya apabila anda merasa performa web tiba tiba aneh? terjadi bug , foto
														tidak tampil atau loading tanpa henti , dan pembayaran midtrans gagal</p>

												<ul>
														<li><b>Cache:</b> Membersihkan file sementara yang tersimpan di browser pengunjung.</li>
														<li><b>View:</b> Membersihkan file tampilan website yang tersimpan sementara.</li>
														<li><b>Route:</b> Membersihkan daftar "jalan" (route) yang menghubungkan halaman-halaman website.</li>
														<li><b>Config:</b> Membersihkan pengaturan website yang tersimpan sementara.</li>
														<li><b>Storage:link:</b> Membuat koneksi khusus antara penyimpanan file website dan folder publik.</li>
														<li><b>Clear:All:</b> Membersihkan semua jenis "sampah" digital sekaligus.</li>
												</ul>
												<hr>
												<p class="mb-0">Semoga dapat membantu.</p>
										</div>

										<div class="d-flex justify-content-start" style="gap: 10px;">
												<a href="{{ route('admin.artisan.cache') }}" class="btn btn-secondary ms-2">Cache</a>
												<a href="{{ route('admin.artisan.view') }}" class="btn btn-warning ms-2">View</a>
												<a href="{{ route('admin.artisan.route') }}" class="btn btn-success ms-2">Route</a>
												<a href="{{ route('admin.artisan.config') }}" class="btn btn-danger ms-2">Config</a>
												<a href="{{ route('admin.artisan.storage') }}" class="btn btn-outline-danger ms-2">Storage:link</a>
												<a href="{{ route('admin.artisan.all') }}" class="btn btn-outline-primary ms-2">Clear:All</a>
										</div>
								</div>
						</div>
				</div>
		</div>
@endsection
