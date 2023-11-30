@extends('user.layouts.main')
@section('content')
<!-- breadcrumb start -->
<!-- <div class="breadcrumb-main bg-dark">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="breadcrumb-contain">
          <div>
            <h2 class="text-white">Promosi</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> -->
<!-- breadcrumb End -->

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

<section>
  <div class="custom-container simulasi-container">
    <div class="row d-flex justify-content-center simulasi-wrapper">
      <div class="col-11 col-md-10 px-3 py-3 card rounded-3">
        <h3 class="text-center title8 mb-4">Cek BI Checking</h3>

        <h4 class="text-transform: capitalize">Silahkan masukan nomor KTP anda untuk melakukan BI Checking!</h4>

        <form id="form-simulasi" action="" class="mt-2">
          <div class="row">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Nomor anda" aria-label="Nomor anda" aria-describedby="button-addon2">
              <button class="btn btn-outline-secondary" type="button" id="button-addon2" style="z-index: 1;">Check</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</section>


@endsection