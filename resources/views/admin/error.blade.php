@extends('user.layouts.main')
@section('content')
		<div class="container">
				<div class="row py-md-5">
						<div class="col-12">

								<div class="title8 mb-4 mt-5">
										<h4 style="text-transform: capitalize">Yahh, halaman yang kamu cari tidak ditemukan.</h4>
								</div>

						</div>
				</div>

				<div class="row py-md-5">
						<div class="col-12 col-md-8">
								<div>
										<h3 class="text-dark mb-3">Apa yang dapat kamu lakukan selanjutnya ?</h3>
										<ul type="1" class="fs-5">
												<li>1. Periksa kembali apakah alamat URL yang kamu masukan sudah benar.</li>
												<li>2. Kamu bisa kembali ke halaman Home Blimoto.</li>
												<li>3. Gunakan pencarian (search) di bagian atas halaman Blimoto untuk mencari motor impian kamu.</li>
												<li>4. Untuk informasi lebih lanjut silahkan hubungi Admin Blimoto.</li>
										</ul>
								</div>
						</div>

						<div class="col-12 col-md-4 p-md-0 p-5">
								<img src="{{ asset('assets/images/error/404.png') }}" class="w-100" alt="404 image">
						</div>

				</div>
		</div>
@endsection
