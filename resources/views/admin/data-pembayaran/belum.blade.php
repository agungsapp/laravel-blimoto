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
                                        <td><button type="button" class="btn btn-success w-100 mb-1 load-print-modal"
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
@endpush
