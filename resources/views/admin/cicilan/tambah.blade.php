@extends('admin.layouts.main')
@section('content')

<div class="row">
  <div class="col-12">
    <div class="card card-primary">
      <div class="card-header">
        <div class="card-title">
          Tambah data price list
        </div>
      </div>
      <form action="{{ route('admin.cicilan.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="card-body">
          <div class="row">
            <div class="form-group col-md-4">
              <label>Nama Motor</label>
              @if ($motors == null)
              <p class="text-danger">Tidak ada data motor silahkan buat terlebih dahulu !</p>
              @else
              <select id="motor" name="motor" class="form-control select2 @error('motor') is-invalid @enderror" style="width: 100%;">
                <option value="" selected>-- Pilih motor --</option>
                @foreach ($motors as $k)
                <option value="{{ $k->id }}">{{ $k->nama }}</option>
                @endforeach
              </select>
              @endif
              @error('motor')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group col-md-4">
              <label>Leasing</label>
              @if ($leasings == null)
              <p class="text-danger">Tidak ada data leasing silahkan buat terlebih dahulu !</p>
              @else
              <select id="leasing" name="leasing" class="form-control select2 @error('leasing') is-invalid @enderror" style="width: 100%;">
                <option value="" selected>-- Pilih leasing --</option>
                @foreach ($leasings as $k)
                <option value="{{ $k->id }}">{{ $k->nama }}</option>
                @endforeach
              </select>
              @endif
              @error('leasing')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group col-md-4">
              <label>Kota</label>
              @if ($kotas == null)
              <p class="text-danger">Tidak ada data kota silahkan buat terlebih dahulu !</p>
              @else
              <select id="kota-insert" name="kota" class="form-control select2 @error('kota') is-invalid @enderror" style="width: 100%;">
                <option value="" selected>-- Pilih kota --</option>
                @foreach ($kotas as $k)
                <option value="{{ $k->id }}">{{ $k->nama }}</option>
                @endforeach
              </select>
              @endif
              @error('kota')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-4">
              <label for="dp">DP</label>
              <input name="dp" type="number" class="form-control @error('dp') is-invalid @enderror" id="dp" placeholder="Masukan DP Motor">
              @error('dp')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group col-md-4">
              <label for="tenor">Tenor</label>
              <input name="tenor" type="number" class="form-control @error('tenor') is-invalid @enderror" id="tenor" placeholder="Masukan Tenor Motor">
              @error('tenor')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group col-md-4">
              <label for="cicilan">Cicilan</label>
              <input name="cicilan" type="number" class="form-control @error('cicilan') is-invalid @enderror" id="cicilan" placeholder="Masukan Cicilan Motor">
              @error('cicilan')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@push('script')
@endpush