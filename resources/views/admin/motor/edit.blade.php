@extends('admin.layouts.main')
@section('content')
<section class="content">
  <div class="row">
    <div class="col-md-6 col-lg-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Input Data Motor</h3>
        </div>
        <form action="{{ route('admin.motor.update', $motor[0]->id) }}" method="post">
          @csrf
          @method('PUT')
          <div class="box-body">
            <div class="form-group">
              <label for="nama-motor">Nama Motor</label>
              <input name="nama" type="text" class="form-control" id="nama-motor" placeholder="Masukan nama motor" value="{{ $motor[0]->nama }}">
            </div>
            <div class="form-group">
              <label for="berat">Berat Motor</label>
              <input name="berat" type="text" class="form-control" id="berat-motor" placeholder="Masukan berat motor" value="{{ $motor[0]->berat }}">
            </div>
            <div class="form-group">
              <label for="power-motor">Power Motor</label>
              <input name="power" type="text" class="form-control" id="power-motor" placeholder="Masukan power motor" value="{{ $motor[0]->power }}">
            </div>
            <div class="form-group">
              <label for="harga-motor">Harga Motor</label>
              <input name="harga" type="number" class="form-control" id="harga-motor" placeholder="Masukan harga motor" value="{{ $motor[0]->harga }}">
            </div>
            <div class="form-group">
              <label>Deskripsi Motor</label>
              <textarea name="deskripsi_motor" class="form-control" rows="3" placeholder="Deskripsi Motor">{{$motor[0]->deskripsi}}</textarea>
            </div>
            <div class="form-group">
              <label>Fitur Motor</label>
              <textarea name="fitur_motor" class="form-control" rows="3" placeholder="Fitur Motor">{{$motor[0]->fitur_utama}}</textarea>
            </div>
            <div class="form-group">
              <label>Merk Motor</label>
              <select name="merk_motor" class="form-control">
                @foreach ($merk_motor as $merk)
                <option value="{{$merk->id}}" {{ $motor[0]->id_merk === $merk->id ? 'selected' : '' }}>{{ $merk->nama }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Tipe Motors</label>
              <select name="tipe_motor" class="form-control">
                @foreach ($tipe_motor as $tipe)
                <option value="{{$tipe->id}}" {{ $motor[0]->id_type === $tipe->id ? 'selected' : '' }}>{{ $tipe->nama }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Kategori Best Motor</label>
              <p>*Optional tidak wajib dipilih silahkan pilih no best</p>
              @if ($kategori_best_motor == null)
              <p>Tidak ada data best kategori motor silahkan buat terlebih dahulu !</p>
              @else
              <select name="kategori-best-motor" class="form-control">
                @foreach ($kategori_best_motor as $merk)
                <option value="{{$merk->id}}">{{ $merk->nama }}</option>
                @endforeach
              </select>
              @endif
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Edit</button>
            <a href="{{route('admin.motor.index')}}" class="btn btn-warning">Cancel</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection