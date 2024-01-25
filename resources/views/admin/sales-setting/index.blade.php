@extends('admin.layouts.main')
@section('content')

<section class="content">
	<div class="row">
		<div class="col-12">
			<div class="card card-primary">
				<div class="card-header with-border">
					<h3 class="card-title">Setting Akun Sales</h3>
				</div>
				<form action="{{ route('admin.sales-settings.update', $user['id']) }}" method="post">
					@method('PUT')
					@csrf
					<div class="card-body">
						<div class="row">
							<div class="form-group col-md-6">
								<label for="input-nama">Nama Sales</label>
								<input name="nama" type="text" class="form-control" placeholder="Masukan nama sales" value="{{ old('nama', $user['nama']) }}">
							</div>
							<div class="form-group col-md-6">
								<label for="input-kode">NIP Sales</label>
								<input name="kode" type="text" class="form-control" placeholder="Masukan NIP sales" value="{{ old('kode', $user['nip']) }}">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-6">
								<label for="input-username">Username</label>
								<input name="username" type="text" class="form-control" id="input-username" placeholder="Masukan username sales" value="{{ old('username', $user['username']) }}">
							</div>
							<div class="form-group col-md-6">
								<label for="input-password-lama">Password</label>
								<input name="password_lama" type="password" class="form-control" placeholder="Masukan password">
							</div>

							<div class="form-group col-md-6">
								<label for="input-password-baru">Password Baru</label>
								<input name="password_baru" type="password" class="form-control" placeholder="Masukan password baru (jika ingin dirubah)">
							</div>
						</div>
					</div>
					<div class="card-footer">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>


@endsection


@push('script')
<script>
</script>
@endpush