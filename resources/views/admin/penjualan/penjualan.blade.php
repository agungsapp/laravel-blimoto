@extends('admin.layouts.main')
@section('content')
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header with-border">
          <h3 class="card-title">Input Data Penjualan</h3>
        </div>
        <form action="{{ route('admin.penjualan.data.store') }}" method="post">
          @csrf
          <div class="card-body">
            <div class="row">
              <div class="form-group col-md-6">
                <label for="input-hasil">Nama Konsumen</label>
                <input name="konsumen" type="text" class="form-control" placeholder="Masukan nama konsumen">
              </div>
              <div class="form-group col-md-6">
                <label>Sales</label>
                @if ($sales == null)
                <p class="text-danger">Tidak ada data sales silahkan buat terlebih dahulu !</p>
                @else
                <select id="sales-input" name="sales" class="form-control select2" style="width: 100%;">
                  <option value="" selected>-- Pilih sales --</option>
                  @foreach ($sales as $s)
                  <option value="{{ $s->id }}">{{ $s->nama }}</option>
                  @endforeach
                </select>
                @endif
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-6">
                <label for="input-tenor">Tenor</label>
                <input name="tenor" type="text" class="form-control" placeholder="Masukan tenor">
              </div>
              <div class="form-group col-md-6">
                <label>Metode Pembayaran</label>
                <select id="pembayaran-input" name="pembayaran" class="form-control select2" style="width: 100%;">
                  <option value="" selected>-- Pilih pembayaran --</option>
                  <option value="cash">Cash</option>
                  <option value="kredit">Kredit</option>
                </select>
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-6">
                <label>Kabupaten</label>
                @if ($kota == null)
                <p class="text-danger">Tidak ada data kabupaten silahkan buat terlebih dahulu !</p>
                @else
                <select id="kabupaten-input" name="kabupaten" class="form-control select2" style="width: 100%;">
                  <option value="" selected>-- Pilih kabupaten --</option>
                  @foreach ($kota as $k)
                  <option value="{{ $k->id }}">{{ $k->nama }}</option>
                  @endforeach
                </select>
                @endif
              </div>
              <div class="form-group col-md-6">
                <label>Hasil</label>
                @if ($hasil == null)
                <p class="text-danger">Tidak ada data hasil silahkan buat terlebih dahulu !</p>
                @else
                <select id="hasil-input" name="hasil" class="form-control select2" style="width: 100%;">
                  <option value="" selected>-- Pilih hasil --</option>
                  @foreach ($hasil as $h)
                  <option value="{{ $h->id }}">{{ $h->hasil }}</option>
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
                <select id="motor-input" name="motor" class="form-control select2" style="width: 100%;">
                  <option value="" selected>-- Pilih motor --</option>
                  @foreach ($motor as $m)
                  <option value="{{ $m->id }}">{{ $m->nama }}</option>
                  @endforeach
                </select>
                @endif
              </div>
              <div class="form-group col-md-6">
                <label for="input-hasil">Jumlah</label>
                <input name="jumlah" type="number" class="form-control" placeholder="Masukan jumlah motor">
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-6">
                <label>Leasing</label>
                @if ($leasing == null)
                <p class="text-danger">Tidak ada data leasing silahkan buat terlebih dahulu !</p>
                @else
                <select id="leasing-input" name="leasing" class="form-control select2" style="width: 100%;">
                  <option value="" selected>-- Pilih leasing --</option>
                  @foreach ($leasing as $l)
                  <option value="{{ $l->id }}">{{ $l->nama }}</option>
                  @endforeach
                </select>
                @endif
              </div>
              <div class="form-group col-md-6">
                <label for="input-hasil">Catatan Penjualan</label>
                <input name="catatan" type="text" class="form-control" placeholder="Masukan catatan penjualan motor">
              </div>

            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
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
                <td>Minimum date:</td>
                <td><input type="text" id="min" name="min"></td>
              </tr>
              <tr>
                <td>Maximum date:</td>
                <td><input type="text" id="max" name="max"></td>
              </tr>
            </tbody>
          </table>
          <table id="data-sale" class="table table-bordered table-striped">
            <thead>
              <tr role="row">
                <th>NO</th>
                <th>Nama Konsumen</th>
                <th>Nama Sales</th>
                <th>Pembayaran</th>
                <th>Tenor</th>
                <th>Motor</th>
                <th>Jumlah</th>
                <th>Kota</th>
                <th>Hasil</th>
                <th>Catatan</th>
                <th>Tanggal Dibuat</th>
                <th>Tanggal Hasil</th>
                <th width="170px" class="no-export">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($penjualan as $index => $p)
              <tr role="row" class="{{ $index % 2 == 0 ? 'even' : 'odd' }}">
                <td>{{ $loop->iteration }}</td>
                <td>{{$p->nama_konsumen}}</td>
                <td>{{$p->sales->nama}}</td>
                <td>{{$p->pembayaran}}</td>
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
                    <form action="{{ route('admin.penjualan.data.destroy', $p->id) }}" method="post">
                      @csrf
                      @method('DELETE')
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit{{$p->id}}">
                        Edit
                      </button>
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                  </div>
                  <!-- Modal update -->
                  <div class="modal fade" id="modalEdit{{$p->id}}" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Edit data: {{$p->nama_konsumen}}</h4>
                        </div>
                        <form action="{{ route('admin.penjualan.data.update', $p->id) }}" method="post">
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
                                      <label for="input-tenor">Tenor</label>
                                      <input name="tenor" type="text" class="form-control" placeholder="Masukan tenor" value="{{$p->tenor}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label>Metode Pembayaran</label>
                                      <select id="pembayaran" name="pembayaran" class="form-control select2" style="width: 100%;">
                                        <option value="cash" {{ $p->pembayaran === 'cash' ? 'selected' : '' }}>Cash</option>
                                        <option value="kredit" {{ $p->pembayaran === 'kredit' ? 'selected' : '' }}>Kredit</option>
                                      </select>
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
                                    <div class="form-group col-md-6">
                                      <label>Leasing</label>
                                      @if ($leasing == null)
                                      <p class="text-danger">Tidak ada data leasing silahkan buat terlebih dahulu !</p>
                                      @else
                                      <select id="leasing" name="leasing" class="form-control select2" style="width: 100%;">
                                        <option value="" selected>-- Pilih leasing --</option>
                                        @foreach ($leasing as $l)
                                        <option value="{{ $l->id }}" @if($p->id_lising === $l->id) selected @endif>{{ $l->nama }}</option>
                                        @endforeach
                                      </select>
                                      @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label for="input-hasil">Catatan Penjualan</label>
                                      <input name="catatan" type="text" class="form-control" placeholder="Masukan catatan penjualan motor" value="{{$p->catatan}}">
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
                </td>
              </tr>
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
<!-- <script>
  $(document).ready(function() {
    // DataTable initialization
    var table = $('#data-sale').DataTable();

    // Append input fields for date range pickers to the DataTables filter row
    $(`<input type="text" id="min-date" placeholder="Min Date"/>`).appendTo('#data-sale_filter');
    $('<input type="text" id="max-date" placeholder="Max Date"/>').appendTo('#data-sale_filter');

    // Initialize datepickers
    $('#min_date, #max-date').on('select', function() {
      datetimepicker({
        dateFormat: 'yy-mm-dd', // Set the desired date format
        onSelect: function() {
          table.draw();
        }
      });
    });


    // Add date range filter for Tanggal Dibuat column
    $.fn.dataTable.ext.search.push(
      function(settings, data, dataIndex) {
        var minDate = $('#min-date').val();
        var maxDate = $('#max-date').val();
        var date = moment(data[10]);

        if (
          (minDate === '' || date.isSameOrAfter(minDate)) &&
          (maxDate === '' || date.isSameOrBefore(maxDate))
        ) {
          return true;
        }

        return false;
      }
    );

    // Apply the filter on input change
    $('#min-date, #max-date').on('change', function() {
      table.draw();
    });

  });
</script> -->
<script src="https://cdn.datatables.net/datetime/1.5.1/js/dataTables.dateTime.min.js"></script>
<script>
  let minDate, maxDate;
  var table = $('#data-sale').DataTable({
    // dom: 'Bfrtip', // 'B' for buttons
    // buttons: [{
    //   extend: 'excelHtml5',
    //   title: 'Penjualan BliMoto', // Excel export button
    //   exportOptions: {
    //     columns: ':not(.no-export)' // Exclude columns with the class 'no-export'
    //   }
    // }]
  });
  // Custom filtering function which will search data in column four between two values
  $.fn.dataTable.ext.search.push(
    function(settings, data, dataIndex) {
      var minDate = $('#min').val();
      var maxDate = $('#max').val();
      var date = moment(data[10]);
      if (
        (minDate === '' || date.isSameOrAfter(minDate)) &&
        (maxDate === '' || date.isSameOrBefore(maxDate))
      ) {
        return true;
      }

      return false;
    }
  );

  // Apply the filter on input change
  $('#min, #max').on('change', function() {
    table.draw();
  });

  // Create date inputs
  minDate = new DateTime('#min', {});
  maxDate = new DateTime('#max', {});
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

  $(function() {
    $('.select2').select2()
    initDatePickers();
    $('button[data-toggle="modal"]').on('click', function() {
      initDatePickers();
    });
  });
</script>
@endpush