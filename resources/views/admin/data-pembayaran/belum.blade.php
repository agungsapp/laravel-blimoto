@extends('admin.layouts.main')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Data Belum Bayar</h3>
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
                                    <th width="100px">Action</th>
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
                                        <td>{{ $p->leasing->nama ?? 'Cash' }}</td>
                                        <td>{{ $p->tanggal_dibuat }}</td>
                                        <td>{{ $p->tanggal_hasil }}</td>
                                        <td>
                                            <button type="button" class="btn btn-secondary w-100 mb-1 load-detail-modal"
                                                data-id="{{ $p->id }}"
                                                data-url="{{ route('admin.penjualan.getPenjualan', ['id' => $p->id]) }}"
                                                data-toggle="modal" data-target="#modalDetail">
                                                Detail
                                            </button>
                                            <button type="button" class="btn btn-success w-100 mb-1 load-print-modal"
                                                data-id="{{ $p->id }}"
                                                data-url="{{ route('admin.penjualan.print-data', ['id' => $p->id]) }}"
                                                data-toggle="modal" data-target="#modalCetak">
                                                Cetak
                                            </button>
                                            <button type="button" class="btn btn-info w-100 mb-1 load-payment-modal"
                                                data-id="{{ $p->id }}"
                                                data-url="{{ route('admin.penjualan.payment-data', ['id' => $p->id]) }}"
                                                data-action-url="{{ route('admin.penjualan.bayar-dp', ['id' => $p->id]) }}"
                                                data-toggle="modal" data-target="#modalBayar">Bayar</button>
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

    {{-- modal bayar --}}
    <div class="modal fade" id="modalBayar" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Bayar DP</h4>
                </div>
                <form action="" method="post">
                    <input type="hidden" name="sales" id="id-sales">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group col-md-12">
                            <label for="nama-sales">Nama Sales</label>
                            <input type="text" class="form-control" id="nama-sales" readonly>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="nama-konsumen">Nama Konsumen</label>
                            <input type="text" class="form-control" id="nama-konsumen" readonly name="konsumen">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="dp">DP</label>
                            <input type="text" class="form-control" id="dp" readonly name="dp">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="pay-button">Bayar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- modal cetak --}}
    <div>
        <div class="modal fade" id="modalCetak" role="dialog" aria-labelledby="modalCetak">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modalCetakHeader"></h4>
                    </div>
                    <form action="{{ route('admin.cetakPDF') }}" method="GET" target="_blank">
                        <input type="hidden" name="tanggal_dibuat" id="tanggal_dibuat">
                        <input type="hidden" name="nama_pemohon">
                        <input type="hidden" name="kabupaten">
                        <input type="hidden" name="motor">
                        <input type="hidden" name="id_penjualan">
                        <div class="modal-body">
                            <div class="card card-primary">
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="input-hasil">Nomor KTP</label>
                                                <input name="no_ktp" type="number" class="form-control"
                                                    placeholder="Masukan nomor KTP">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="input-hasil">Alamat Customer</label>
                                                <input name="alamat" type="text" class="form-control"
                                                    placeholder="Masukan alamat customer">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="input-tenor">BPKB/STNK a.n</label>
                                                <input name="bpkb_stnk" type="text" class="form-control"
                                                    placeholder="Masukan BPKB/STNK a.n" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="input-tenor">Nomor HP</label>
                                                <input name="nomor_hp" type="tel" class="form-control"
                                                    placeholder="Masukan Nomor HP" readonly>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="input-tenor">DP</label>
                                                <input name="dp" type="number" class="form-control"
                                                    placeholder="Masukan DP" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="input-tenor">Total Diskon</label>
                                                <input name="total_diskon" type="number" class="form-control"
                                                    placeholder="Masukan total diskon" readonly>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="input-tenor">Kelengkapan</label>
                                                <input name="kelengkapan" type="text" class="form-control"
                                                    placeholder="Masukan kelengkapan">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="input-tenor">Metode Pembelian</label>
                                                <input name="metode_pembelian" type="text" class="form-control"
                                                    readonly>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="input-tenor">Nomor PO</label>
                                                <input name="no_po" type="text" class="form-control"
                                                    placeholder="Masukan nomor PO">
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="input-tenor">Warna Motor</label>
                                                <input name="warna" type="text" class="form-control" readonly>
                                            </div>
                                        </div>

                                        <input name="jangka_waktu" type="hidden" class="form-control">

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Cetak</button>
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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

    {{-- pembayaran --}}
    <script>
        $(document).on('click', '.load-payment-modal', function() {
            var url = $(this).data('url');
            var actionUrl = $(this).data('action-url');

            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#modalBayar form').attr('action', actionUrl);
                    $('#id-sales').val(data.sales.id);
                    $('#nama-sales').val(data.sales.nama);
                    $('#nama-konsumen').val(data.nama_konsumen);
                    $('#dp').val(Number(data.dp) - Number(data.diskon_dp));
                },
                error: function(xhr, status, error) {
                    swal({
                        title: `Error`,
                        text: error,
                        icon: "error",
                        buttons: true,
                        dangerMode: true,
                    })
                }
            });
        });
    </script>
    <script>
        $(document).on('click', '#pay-button', function(e) {
            e.preventDefault();

            var form = $(this).closest('form');
            var formData = new FormData(form.get(0));

            fetch(form.attr('action'), {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.redirect_url) {
                        // Open the Midtrans payment page in a new tab
                        window.open(data.redirect_url, '_blank');
                    } else {
                        swal({
                            title: `Error`,
                            text: data.pesan,
                            icon: "error",
                            buttons: true,
                            dangerMode: true,
                        })
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    </script>

    {{-- cetak --}}
    <script>
        // This function toggles additional input fields based on the selected payment method.
        function toggleMetodeLainnya(selectElement) {
            var metodeLainnyaInput = document.getElementById('metodeLainnya');
            var jangkaWaktuInput = document.getElementById('jangkaWaktuInput');

            if (selectElement.value === 'tunai' || selectElement.value === 'cek') {
                metodeLainnyaInput.style.display = 'none';
                jangkaWaktuInput.style.display = 'none';
            } else {
                metodeLainnyaInput.style.display = 'block';
                jangkaWaktuInput.style.display = 'block';
            }
        }

        // When the 'Cetak' button is clicked, this event handler will fetch the data
        // and populate the print modal fields.
        $(document).on('click', '.load-print-modal', function() {
            var id = $(this).data('id');
            var dataUrl = $(this).data('url');
            var modalId = '#modalCetak'; // Make sure this matches the ID of your modal

            // Fetch the data and populate the modal
            $.ajax({
                url: dataUrl,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Assuming 'data' contains all the necessary fields for the print modal
                    $(modalId + ' #tanggal_dibuat').val(data.tanggal_dibuat);
                    $(modalId + ' [name="nama_pemohon"]').val(data.nama_konsumen);
                    $(modalId + ' [name="kabupaten"]').val(data.kota.nama);
                    $(modalId + ' [name="motor"]').val(data.id_motor);
                    $(modalId + ' [name="id_penjualan"]').val(data.id);
                    $(modalId + ' [name="dp"]').val(Number(data.dp));
                    $(modalId + ' [name="total_diskon"]').val(Number(data.diskon_dp));
                    $(modalId + ' [name="metode_pembelian"]').val(data.metode_pembelian).trigger(
                        'change');
                    $(modalId + ' [name="warna"]').val(data.warna_motor);
                    $(modalId + ' [name="nomor_hp"]').val(data.no_hp);
                    $(modalId + ' [name="bpkb_stnk"]').val(data.bpkb);
                    $(modalId + ' [name="jangka_waktu"]').val(data.tenor);
                    $(modalId + ' [name="no_po"]').val(data.no_po);

                    // Update the form action URL dynamically
                    $(modalId + ' form').attr('action', '{{ route('admin.cetakPDF') }}');

                    // Show the modal
                    $(modalId).modal('show');
                },
                error: function(xhr, status, error) {
                    alert('An error occurred while loading print data: ' + error);
                }
            });

            // Call the toggle function for the existing method selection
            var metodePembayaranSelect = document.getElementById('metodePembayaran');
            toggleMetodeLainnya(metodePembayaranSelect);
        });
    </script>

    {{-- detail --}}
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
