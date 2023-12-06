@extends('admin.layouts.main')
@section('content')

<div class="row">
  <div class="col-12">
    <div class="card card-warning">
      <div class="card-header">
        <div class="card-title">
          Update data price list
        </div>
      </div>
      <form action="{{ route('admin.cicilan.update', $cicilan->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
          <div class="row">
            <div class="form-group col-md-4">
              <label>Nama Motor</label>
              <select id="motor" name="motor" class="form-control select2 @error('motor') is-invalid @enderror" style="width: 100%;">
                <option value="" selected>-- Pilih motor --</option>
                @foreach ($motors as $k)
                <option value="{{ $k->id }}" {{ $cicilan->id_motor === $k->id ? 'selected' : '' }}>{{ $k->nama }}</option>
                @endforeach
              </select>
              @error('motor')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group col-md-4">
              <label>Leasing</label>
              <select id="leasing" name="leasing" class="form-control select2 @error('leasing') is-invalid @enderror" style="width: 100%;">
                <option value="" selected>-- Pilih leasing --</option>
                @foreach ($leasings as $k)
                <option value="{{ $k->id }}" {{ $cicilan->id_leasing === $k->id ? 'selected' : '' }}>{{ $k->nama }}</option>
                @endforeach
              </select>
              @error('leasing')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group col-md-4">
              <label>Kota</label>
              <select id="kota-insert" name="kota" class="form-control select2 @error('kota') is-invalid @enderror" style="width: 100%;">
                <option value="" selected>-- Pilih kota --</option>
                @foreach ($kotas as $k)
                <option value="{{ $k->id }}" {{ $cicilan->id_lokasi === $k->id ? 'selected' : '' }}>{{ $k->nama }}</option>
                @endforeach
              </select>
              @error('kota')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-4">
              <label for="dp">DP</label>
              <input name="dp" type="number" class="form-control @error('dp') is-invalid @enderror" id="dp" placeholder="Masukan DP Motor" value="{{$cicilan->dp}}">
              @error('dp')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group col-md-4">
              <label for="tenor">Tenor</label>
              <input name="tenor" type="number" class="form-control @error('tenor') is-invalid @enderror" id="tenor" placeholder="Masukan Tenor Motor" value="{{$cicilan->tenor}}">
              @error('tenor')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group col-md-4">
              <label for="cicilan">Cicilan</label>
              <input name="cicilan" type="number" class="form-control @error('cicilan') is-invalid @enderror" id="cicilan" placeholder="Masukan Cicilan Motor" value="{{$cicilan->cicilan}}">
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
<script>
  $('.select2').select2()
</script>
@endpush