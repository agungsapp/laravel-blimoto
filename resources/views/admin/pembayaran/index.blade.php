@extends('admin.layouts.main')
@section('content')
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header with-border">
          <h3 class="card-title">Buat Pembayaran</h3>
        </div>
        <form action="{{ route('admin.pembayaran.store') }}" method="post">
          @csrf
          <div class="card-body">
            <div class="row">
              <div class="form-group col-md-6">
                <label>Nama Konsumen</label>
                @if ($penjualan == null)
                <p class="text-danger">Tidak ada data konsumen silahkan buat terlebih dahulu !</p>
                @else
                <select id="input-nama-konsumen" name="konsumen" class="form-control select2" style="width: 100%;">
                  <option value="" selected>-- Pilih Konsumen --</option>
                  @foreach ($penjualan as $s)
                  <option value="{{ $s->nama_konsumen }}" {{ old('konsumen') == $s->nama_konsumen ? 'selected' : '' }}>{{ $s->nama_konsumen }}</option>
                  @endforeach
                </select>
                @endif
              </div>
              <div class="form-group col-md-6">
                <label>Nama Sales</label>
                @if ($sales == null)
                <p class="text-danger">Tidak ada data sales silahkan buat terlebih dahulu !</p>
                @else
                <select id="sales-input-input" name="sales" class="form-control select2" style="width: 100%;">
                  <option value="" selected>-- Pilih sales --</option>
                  @foreach ($sales as $s)
                  <option value="{{ $s->id }}" {{ old('sales') == $s->id ? 'selected' : '' }}>{{ $s->nama }}</option>
                  @endforeach
                </select>
                @endif
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-6">
                <label for="input-tenor">Masukan ID Penjualan</label>
                <input name="id_penjualan" type="number" class="form-control" placeholder="Masukan id penjualan" id="input-tenor" value="{{ old('id_penjualan') }}">
              </div>
              <div class="form-group col-md-6">
                <label for="input-tenor">Masukan Harga DP</label>
                <input name="dp" type="number" class="form-control" placeholder="Masukan harga DP" id="input-tenor" value="{{ old('dp') }}">
              </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>

      </div>

    </div>
  </div>
</section>

<section class="content">
  <div class="row">
    <div class="col-12">

      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Data Penjualan</h3>
        </div>

        <div class="card-body">
          <table border="0" cellspacing="5" cellpadding="5" class="mb-4">
            <tbody>
              <tr>
                <td>Dari Tanggal:</td>
                <td><input type="text" id="min" name="min"></td>
              </tr>
              <tr>
                <td>Sampai Tanggal:</td>
                <td><input type="text" id="max" name="max"></td>
              </tr>
            </tbody>
          </table>
          <table id="data-sale" class="table table-bordered table-striped">
            <thead>
              <tr role="row">
                <th>ID</th>
                <th>Nama Konsumen</th>
                <th>Nama Sales</th>
                <th>Pembayaran</th>
                <th>Status Pembayaran DP</th>
                <th>Leasing</th>
                <th>Tenor</th>
                <th>Motor</th>
                <th>Jumlah</th>
                <th>Kota</th>
                <th>Hasil</th>
                <th>Catatan</th>
                <th>Tanggal Dibuat</th>
                <th>Tanggal Hasil</th>
                <th class="no-export">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($penjualan as $index => $p)
              <tr role="row" class="{{ $index % 2 == 0 ? 'even' : 'odd' }}">
                <td>{{ $p->id }}</td>
                <td>{{$p->nama_konsumen}}</td>
                <td>{{$p->sales->nama}}</td>
                <td>{{$p->pembayaran}}</td>
                <td>{{$p->status_pembayaran_dp}}</td>
                <td>{{$p->leasing->nama ?? 'cash'}}</td>
                <td>{{$p->tenor}}</td>
                <td>{{$p->motor->nama}}</td>
                <td>{{$p->jumlah}}</td>
                <td>{{$p->kota->nama}}</td>
                <td>{{$p->hasil->hasil}}</td>
                <td>{{$p->catatan}}</td>
                <td>{{$p->tanggal_dibuat}}</td>
                <td>{{$p->tanggal_hasil}}</td>
                <td class="no-export">
                  <div class="btn-group">
                    <form action="{{ route('admin.pembayaran.destroy', $p->id) }}" method="post">
                      @csrf
                      @method('DELETE')
                      <button type="button" class="btn btn-primary w-100 mb-1" data-toggle="modal" data-target="#modalEdit{{$p->id}}" data-placement="top" title="edit">
                        Edit
                      </button>
                      <button type="submit" class="btn btn-danger show_confirm w-100">Delete</button>
                    </form>
                  </div>
                </td>
              </tr>
              <!-- Modal update -->
              <div class="modal fade" id="modalEdit{{$p->id}}" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="myModalLabel">Edit data: {{$p->nama_konsumen}}</h4>
                    </div>
                    <form action="{{ route('admin.pembayaran.update', $p->id) }}" method="post">
                      @csrf
                      @method('PUT')
                      <div class="modal-body">
                        <div class="card card-primary">
                          <div class="card-header with-border">
                            <h3 class="card-title">Update Data sales</h3>
                          </div>
                          <input type="hidden" value="{{$p->id}}">
                          <div class="card-body">
                            <div class="form-group">
                              <div class="row">
                                <div class="form-group col-md-6">
                                  <label for="input-hasil">Nama Konsumen</label>
                                  <input name="konsumen" type="text" class="form-control" placeholder="Masukan nama konsumen" value="{{$p->nama_konsumen}}">
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Sales</label>
                                  @if ($sales == null)
                                  <p class="text-danger">Tidak ada data sales silahkan buat terlebih dahulu !</p>
                                  @else
                                  <select id="sales" name="sales" class="form-control select2" style="width: 100%;">
                                    @foreach ($sales as $s)
                                    <option value="{{ $s->id }}" @if($p->id_sales === $s->id) selected @endif>{{ $s->nama }}</option>
                                    @endforeach
                                  </select>
                                  @endif
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-6">
                                  <label>Metode Pembayaran</label>
                                  <select id="pembayaranUpdate_{{$loop->index}}" name="pembayaran" class="form-control select2" style="width: 100%;" onchange="toggleFieldsUpdate(this)">
                                    <option value="cash" {{ $p->pembayaran === 'cash' ? 'selected' : '' }}>Cash</option>
                                    <option value="kredit" {{ $p->pembayaran === 'kredit' ? 'selected' : '' }}>Kredit</option>
                                  </select>
                                </div>
                                <div class="form-group col-md-6" id="tenorUpdate_{{$loop->index}}">
                                  <label for="input-tenor">Tenor</label>
                                  <input name="tenor" type="text" class="form-control" placeholder="Masukan tenor" value="{{$p->tenor}}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-6">
                                  <label>Kabupaten</label>
                                  @if ($kota == null)
                                  <p class="text-danger">Tidak ada data kabupaten silahkan buat terlebih dahulu !</p>
                                  @else
                                  <select id="kabupaten" name="kabupaten" class="form-control select2" style="width: 100%;">
                                    <option value="" selected>-- Pilih kabupaten --</option>
                                    @foreach ($kota as $k)
                                    <option value="{{ $k->id }}" @if($p->id_kota === $k->id) selected @endif>{{ $k->nama }}</option>
                                    @endforeach
                                  </select>
                                  @endif
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Hasil</label>
                                  @if ($hasil == null)
                                  <p class="text-danger">Tidak ada data hasil silahkan buat terlebih dahulu !</p>
                                  @else
                                  <select id="hasil" name="hasil" class="form-control select2" style="width: 100%;">
                                    <option value="" selected>-- Pilih hasil --</option>
                                    @foreach ($hasil as $h)
                                    <option value="{{ $h->id }}" @if($p->id_hasil === $h->id) selected @endif>{{ $h->hasil }}</option>
                                    @endforeach
                                  </select>
                                  @endif
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-6">
                                  <label>Motor</label>
                                  @if ($motor == null)
                                  <p class="text-danger">Tidak ada data motor silahkan buat terlebih dahulu !</p>
                                  @else
                                  <select id="motor" name="motor" class="form-control select2" style="width: 100%;">
                                    <option value="" selected>-- Pilih motor --</option>
                                    @foreach ($motor as $m)
                                    <option value="{{ $m->id }}" @if($p->id_motor === $m->id) selected @endif>{{ $m->nama }}</option>
                                    @endforeach
                                  </select>
                                  @endif
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="input-hasil">Jumlah</label>
                                  <input name="jumlah" type="number" class="form-control" placeholder="Masukan jumlah motor" value="{{$p->jumlah}}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-6" id="leasingUpdate_{{$loop->index}}">
                                  <label>Leasing</label>
                                  <select name="leasing" class="form-control select2" style="width: 100%;">
                                    <option value="" selected>-- Pilih leasing --</option>
                                    @foreach ($leasing as $l)
                                    <option value="{{ $l->id }}" @if($p->id_lising === $l->id) selected @endif>{{ $l->nama }}</option>
                                    @endforeach
                                  </select>
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="input-hasil">Catatan Penjualan</label>
                                  <input name="catatan" type="text" class="form-control" placeholder="Masukan catatan penjualan motor (kosongkan jika tida ada)" value="{{$p->catatan}}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-12">
                                  <label for="status_pembayaran_dp">Status Pembayaran DP</label>
                                  <select id="status_pembayaran_dp" name="status_pembayaran_dp" class="form-control select2" style="width: 100%;">
                                    <option value="" {{ $p->status_pembayaran_dp === null ? 'selected' : '' }}>-- Pilih status pembayaran DP --</option>
                                    <option value="pending" {{ $p->status_pembayaran_dp == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="paid" {{ $p->status_pembayaran_dp == 'paid' ? 'selected' : '' }}>Paid</option>
                                  </select>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-6">
                                  <label>Tanggal Dibuat: </label>
                                  <div class="input-group date tanggal_dibuat" id="reservationdate_{{ $loop->index }}" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input tanggal_dibuat" data-target="#reservationdate_{{ $loop->index }}" value="{{ date('m/d/Y', strtotime($p->tanggal_dibuat)) }}" name="tanggal_dibuat" />
                                    <div class="input-group-append" data-target="#reservationdate_{{ $loop->index }}" data-toggle="datetimepicker">
                                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Tanggal Hasil:</label>
                                  <div class="input-group date tanggal_hasil" id="reservationdate2_{{ $loop->index }}" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input tanggal_hasil" data-target="#reservationdate2_{{ $loop->index }}" name="tanggal_hasil" value="{{ $p->tanggal_hasil ? date('m/d/Y', strtotime($p->tanggal_hasil)) : '' }}" />
                                    <div class="input-group-append" data-target="#reservationdate2_{{ $loop->index }}" data-toggle="datetimepicker">
                                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                          </div>
                    </form>
                  </div>
                </div>
              </div>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>
</section>

@endsection
@push('script')
<script src="https://cdn.datatables.net/datetime/1.5.1/js/dataTables.dateTime.min.js"></script>
<script>
  $('.select2').select2()

  function toggleLeasingInput() {
    if ($('#pembayaran-input').val() === 'cash') {
      $('#leasing-input').closest('.form-group').hide();
      $('#input-tenor').closest('.form-group').hide();
    } else {
      $('#leasing-input').closest('.form-group').show();
      $('#input-tenor').closest('.form-group').show();
    }
  }
  toggleLeasingInput();
  $('#pembayaran-input').change(function() {
    toggleLeasingInput();
  });

  let minDate, maxDate;
  var table = $('#data-sale').DataTable({
    dom: 'Bfrtip', // 'B' for buttons
    buttons: [{
      extend: 'excelHtml5',
      title: 'Penjualan BliMoto', // Excel export button
      exportOptions: {
        columns: ':not(.no-export)' // Exclude columns with the class 'no-export'
      }
    }],
    order: [
      [0, 'desc']
    ]
  });

  // Apply the filter on input change
  $('#min, #max').on('change', function() {
    table.draw();
  });

  // Create date inputs
  minDate = new DateTime('#min', {});
  maxDate = new DateTime('#max', {});
  // Custom filtering function which will search data in column four between two values
  $.fn.dataTable.ext.search.push(
    function(settings, data, dataIndex) {
      var minDate = $('#min').val();
      var maxDate = $('#max').val();
      var date = moment(data[11]);
      if (
        (minDate === '' || date.isSameOrAfter(minDate)) &&
        (maxDate === '' || date.isSameOrBefore(maxDate))
      ) {
        return true;
      }

      return false;
    }
  );
</script>

<script>
  var metodePembayaranElements = document.querySelectorAll('[id^="metodePembayaran_"]');
  metodePembayaranElements.forEach(function(selectElement) {
    toggleMetodeLainnya(selectElement);
  });

  function toggleMetodeLainnya(selectElement) {
    var index = selectElement.id.split('_')[1];
    var metodeLainnyaInput = document.getElementById('metodeLainnya_' + index);
    var jangkaWaktuInput = document.getElementById('jangkaWaktuInput_' + index);

    if (selectElement.value === 'tunai' || selectElement.value === 'cek') {
      metodeLainnyaInput.style.display = 'none';
      jangkaWaktuInput.style.display = 'none';
    } else {
      metodeLainnyaInput.style.display = 'block';
      jangkaWaktuInput.style.display = 'block';
    }
  }
</script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Initial check when the page loads
    var metodePembayaranElements = document.querySelectorAll('[id^="pembayaranUpdate_"]');
    metodePembayaranElements.forEach(function(selectElement) {
      toggleFieldsUpdate(selectElement);
    });
  });

  function toggleFieldsUpdate(selectElement) {
    var index = selectElement.id.split('_')[1];
    var tenorField = document.getElementById('tenorUpdate_' + index);
    var leasingField = document.getElementById('leasingUpdate_' + index);
    console.log(leasingField);

    if (selectElement.value === 'cash') {
      tenorField.style.display = 'none';
      leasingField.style.display = 'none';
    } else {
      tenorField.style.display = 'block';
      leasingField.style.display = 'block';
    }
  }
</script>

<script>
  function initDatePickers() {
    $('.tanggal_dibuat').datetimepicker({
      format: 'L'
    });

    $('.tanggal_hasil').datetimepicker({
      format: 'L'
    });
  }

  $(document).ready(function() {
    $('#data-sale').on('shown.bs.modal', '.modal', function() {
      initDatePickers();
      $('.select2').select2()
    });

    $('button[data-toggle="modal"]').on('click', function() {
      initDatePickers();
      $('.select2').select2()
    });
  });

  function formatTanggal(tanggal) {
    return moment(tanggal, 'MM/DD/YYYY').format('DD MMMM YYYY');
  }

  $('.jangka_waktu').datetimepicker({
    format: 'L',
    locale: 'id',
  });

  $('.jangka_waktu').on('change.datetimepicker', function(e) {
    var tanggalDiformat = formatTanggal(e.date);
    $('.jangka_send').val(tanggalDiformat);
  });

  var tanggalInput = $('#tanggal_dibuat');
  var tanggalLama = tanggalInput.val();
  var tanggalBaru = formatTanggal(tanggalLama);
  tanggalInput.val(tanggalBaru);

  $(document).ready(function() {
    $('.show_confirm').click(function(event) {
      var form = $(this).closest("form");
      var name = $(this).data("name");
      event.preventDefault();
      swal({
          title: `Delete Data ?`,
          text: "data yang di hapus tidak dapat dipulihkan!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            form.submit();
          }
        });
    });
  })
</script>
@endpush