@extends('admin.layouts.main')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Data Sudah Bayar</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">

                        <table id="data-kota" class="table table-bordered table-striped">
                            <thead>
                                <tr role="row">
                                    <th>NO</th>
                                    <th>Nama Konsumen</th>
                                    <th>Nama Sales</th>
                                    <th>Motor</th>
                                    <th>Jumlah</th>
                                    <th>DP</th>
                                    <th>Diskon DP</th>
                                    <th>Status Pembayaran</th>
                                    <th>Kota</th>
                                    <th>Leasing</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Tanggal Hasil</th>
                                    <th width=100px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penjualan as $index => $p)
                                    <tr role="row" class="{{ $index % 2 == 0 ? 'even' : 'odd' }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $p->nama_konsumen }}</td>
                                        <td>{{ $p->sales->nama }}</td>
                                        <td>{{ $p->motor->nama }}</td>
                                        <td>{{ $p->jumlah }}</td>
                                        <td>{{ $p->dp }}</td>
                                        <td>{{ $p->diskon_dp }}</td>
                                        <td>{{ $p->status_pembayaran_dp }}</td>
                                        <td>{{ $p->kota->nama }}</td>
                                        <td>{{ $p->leasing->nama }}</td>
                                        <td>{{ $p->tanggal_dibuat }}</td>
                                        <td>{{ $p->tanggal_hasil }}</td>
                                        <td>
                                            <div>
                                                <button type="button"
                                                    class="btn btn-secondary w-100 mb-1 load-detail-modal"
                                                    data-id="{{ $p->id }}"
                                                    data-url="{{ route('admin.penjualan.getPenjualan', ['id' => $p->id]) }}"
                                                    data-toggle="modal" data-target="#modalDetail">
                                                    Detail
                                                </button>
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

    <!-- Modal detail -->
    <section>
        <div class="modal fade" id="modalDetail" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Detail data</h4>
                    </div>
                    <div class="modal-body">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="konsumen">Nama Konsumen</label>
                                            <input name="konsumen" type="text" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="sales">Nama Sales</label>
                                            <input name="sales" type="text" class="form-control" readonly>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="bpkb">BPKB/STNK a.n</label>
                                            <input name="bpkb" type="text" class="form-control" readonly>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="no_hp">NO HP</label>
                                            <input name="no_hp" type="text" class="form-control" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="metode_pembelian">Metode Pembelian</label>
                                            <input name="metode_pembelian" type="text" class="form-control" readonly>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="dp">DP</label>
                                            <input name="dp" type="text" class="form-control" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="diskon_dp">Diskon DP</label>
                                            <input name="diskon_dp" type="text" class="form-control" readonly>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="metode_pembayaran">Metode Pembayaran</label>
                                            <input name="metode_pembayaran" type="text" class="form-control" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="status_dp">Status Pembayaran DP</label>
                                            <input name="status_dp" type="text" class="form-control" readonly>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="nomor_po">Nomor PO</label>
                                            <input name="nomor_po" type="text" class="form-control" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="leasing">Leasing</label>
                                            <input name="leasing" type="text" class="form-control" readonly>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="tenor">Tenor</label>
                                            <input name="tenor" type="text" class="form-control" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="motor">Nama Motor</label>
                                            <input name="motor" type="text" class="form-control" readonly>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="jumlah">Jumlah</label>
                                            <input name="jumlah" type="text" class="form-control" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="kota">Kota</label>
                                            <input name="kota" type="text" class="form-control" readonly>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="hasil">Hasil</label>
                                            <input name="hasil" type="text" class="form-control" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="catatan">Catatan</label>
                                            <input name="catatan" type="text" class="form-control" readonly>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Tanggal Dibuat: </label>
                                            <div class="input-group date tanggal_dibuat" id="reservationdate"
                                                data-target-input="nearest">
                                                <input type="text"
                                                    class="form-control datetimepicker-input tanggal_dibuat"
                                                    data-target="#reservationdate" name="tanggal_dibuat" readonly />
                                                <div class="input-group-append" data-target="#reservationdate"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Tanggal Hasil:</label>
                                            <div class="input-group date tanggal_hasil" id="reservationdate2"
                                                data-target-input="nearest">
                                                <input type="text"
                                                    class="form-control datetimepicker-input tanggal_hasil"
                                                    data-target="#reservationdate2" name="tanggal_hasil" readonly />
                                                <div class="input-group-append" data-target="#reservationdate2"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
    <script>
        $(function() {
            $("#data-kota").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
            }).buttons().container().appendTo('#dataMotor_wrapper .col-md-6:eq(0)');
        });
    </script>

    {{-- modal detail --}}
    <script>
        $(document).on('click', '.load-detail-modal', function() {
            var dataUrl = $(this).data('url');
            var modalId = '#modalDetail';
            var modal = $(modalId);
            var baseActionUrl = modal.data('base-action-url');

            $.ajax({
                url: dataUrl,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    var data = response.data; // Ensure you are referencing the data object correctly
                    var dpValue = Number(data.dp);
                    var diskonDpValue = Number(data.diskon_dp);

                    // Populate the modal's form fields with the fetched data
                    modal.find('[name="konsumen"]').val(data.nama_konsumen);
                    modal.find('[name="sales"]').val(data.sales.nama);
                    modal.find('[name="bpkb"]').val(data.bpkb);
                    modal.find('[name="no_hp"]').val(data.no_hp);
                    modal.find('[name="metode_pembayaran"]').val(data.metode_pembayaran);
                    modal.find('[name="metode_pembelian"]').val(data.metode_pembelian);
                    modal.find('[name="status_dp"]').val(data.status_pembayaran_dp);
                    modal.find('[name="dp"]').val(data.dp);
                    modal.find('[name="diskon_dp"]').val(data.diskon_dp);
                    modal.find('[name="nomor_po"]').val(data.no_po ? data.no_po : 'Belum ada');
                    modal.find('[name="tenor"]').val(data.tenor);
                    modal.find('[name="kota"]').val(data.kota.nama);
                    modal.find('[name="hasil"]').val(data.hasil.hasil);
                    modal.find('[name="motor"]').val(data.motor.nama);
                    modal.find('[name="jumlah"]').val(data.jumlah);
                    modal.find('[name="leasing"]').val(data.leasing ? data.leasing.nama :
                        'Cash'); // Make sure the field is 'leasing' and not 'lising'
                    modal.find('[name="catatan"]').val(data.catatan);
                    modal.find('[name="status_pembayaran_dp"]').val(data.status_pembayaran_dp);
                    modal.find('[name="dp"]').val(dpValue);
                    modal.find('[name="diskon_dp"]').val(diskonDpValue);

                    // Correctly format the dates before setting the values
                    var tanggalDibuat = data.tanggal_dibuat ? formatDate(data.tanggal_dibuat) : '';
                    var tanggalHasil = data.tanggal_hasil ? formatDate(data.tanggal_hasil) : '';

                    modal.find('[name="tanggal_dibuat"]').val(tanggalDibuat);
                    modal.find('[name="tanggal_hasil"]').val(tanggalHasil);

                    function formatDate(dateString) {
                        var options = {
                            year: 'numeric',
                            month: '2-digit',
                            day: '2-digit'
                        };
                        var formattedDate = new Date(dateString).toLocaleDateString('en-US', options);
                        return formattedDate;
                    }

                    // Show the modal
                    modal.modal('show');
                },
                error: function(xhr, status, error) {
                    alert('An error occurred: ' + error);
                }
            });
        });
    </script>
@endpush
