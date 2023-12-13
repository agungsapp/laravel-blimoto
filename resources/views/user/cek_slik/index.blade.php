@extends('user.layouts.main')
@section('content')

<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    @foreach ($hooks as $hook)
    <div class="carousel-item {{ $hook->id == 1 ? 'active' : '' }}" data-bs-interval="3500">
      <img src="{{ asset('assets') }}/images/custom/hook/{{ $hook->gambar }}" class="d-block w-100" alt="{{ $hook->gambar }}" />
      <div class="carousel-caption d-none d-md-block">
        <a href="{{ $hook->link }}" style="background-color: {{ $hook->warna }}; color: {{ $hook->warna_teks }}; font-weight: bold;" class="btn rounded-pill fs-sm-4 fs-md-4 fs-lg-4 btn-hook px-5">Lihat Promo</a>
      </div>
    </div>
    @endforeach
  </div>
</div>

<section style="margin-bottom: 100px;">
  <div class="custom-container simulasi-container">
    <div class="row d-flex justify-content-center simulasi-wrapper">
      <div class="col-12 col-md-10 px-3 py-3 card rounded-3">
        <div class="">
          <h3 class="text-center title8 mb-4">Cek BI Checking</h3>
          <h4 class="text-transform: capitalize">Silahkan Lengkapi form berikut!</h4>
        </div>
        <form role="form" action="{{ route('cek-slik.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="row">
              <div class="form-group col-md-6">
                <label for="input-hasil">Nomor WA</label>
                <input name="no" type="tel" class="form-control @error('no') is-invalid @enderror" placeholder="Masukan nomor WA anda untuk konfirmasi(gunakan 62 atau 08)" value="{{ old('no') }}">
                @error('no')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="input-hasil">Masukan Email</label>
                <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukan email aktif anda (kosongkan jika tidak ada)" value="{{ old('email') }}">
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label>Jenis BI Ceking</label>
                <p class="text-danger">*Premium dikenakan biaya</p>
                <select id="bi-ceking" name="tipe" class="form-control select2 @error('tipe') is-invalid @enderror" style="width: 100%;">
                  <option value="" {{ old('tipe') == '' ? 'selected' : '' }}>-- Pilih Tipe --</option>
                  <option value="1" {{ old('tipe') == '1' ? 'selected' : '' }}>premium</option>
                  <option value="2" {{ old('tipe') == '2' ? 'selected' : '' }}>biasa</option>
                </select>
                @error('tipe')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="ktp">Scan KTP</label>
                <br />
                <input type="file" id="ktp" name="ktp" class="@error('ktp') is-invalid @enderror">
                @error('ktp')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Kirim</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection