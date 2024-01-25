@extends('admin.layouts.main')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header with-border">
                        <h3 class="card-title">Input Data Manager</h3>
                    </div>
                    <form action="{{ route('admin.manager.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="input-nama">Nama Manager</label>
                                    <input name="nama" type="text" class="form-control"
                                        placeholder="Masukan nama sales" value="{{ old('nama') }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="input-username">Username</label>
                                    <input name="username" type="text" class="form-control" id="input-username"
                                        placeholder="Masukan username sales" value="{{ old('username') }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="input-password">Password</label>
                                    <input name="password" type="password" class="form-control"
                                        placeholder="Masukan password">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
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
                        <h3 class="card-title">Data Akun Manager</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="data-sale" class="table table-bordered table-striped">
                                <thead>
                                    <tr role="row">
                                        <th>NO</th>
                                        <th>Nama Manager</th>
                                        <th>Username</th>
                                        <th width="170px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ceo as $index => $sale)
                                        <tr role="row" class="{{ $index % 2 == 0 ? 'even' : 'odd' }}">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $sale->nama }}</td>
                                            <td>{{ $sale->username }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <form action="{{ route('admin.manager.destroy', $sale->id) }}"
                                                        method="post">
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                            data-target="#modalEdit{{ $sale->id }}">
                                                            Edit
                                                        </button>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-danger show_confirm">Delete</button>
                                                    </form>
                                                </div>
                                                <!-- Modal update -->
                                                <div class="modal fade" id="modalEdit{{ $sale->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="myModalLabel">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel">Edit data:
                                                                    {{ $sale->nama }}</h4>
                                                            </div>
                                                            <form action="{{ route('admin.manager.update', $sale->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-body">
                                                                    <div class="card card-primary">
                                                                        <div class="card-header with-border">
                                                                            <h3 class="card-title">Update Data Ceo</h3>
                                                                        </div>
                                                                        <input type="hidden" value="{{ $sale->id }}">
                                                                        <div class="card-body">
                                                                            <div class="form-group">
                                                                                <label for="input-nama">Nama Ceo</label>
                                                                                <input name="nama" type="text"
                                                                                    class="form-control"
                                                                                    placeholder="Masukan nama CEO"
                                                                                    value="{{ $sale->nama }}">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="input-username">Username</label>
                                                                                <input name="username" type="text"
                                                                                    class="form-control" id="input-username"
                                                                                    placeholder="Masukan username sales)"
                                                                                    value="{{ $sale->username }}">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="input-password">Password</label>
                                                                                <input name="password" type="password"
                                                                                    class="form-control"
                                                                                    placeholder="Masukan password jika ingin ganti">
                                                                                <input name="password_old" type="hidden"
                                                                                    class="form-control"
                                                                                    placeholder="Masukan password"
                                                                                    value="{{ $sale->password }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save
                                                                        changes</button>
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
        </div>
    </section>
@endsection
@push('script')
    <script>
        $(function() {
            $("#data-sale").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                //"buttons": ["copy", "csv", "excel", "pdf", "print"] //, "colvis"
            }).buttons().container().appendTo('#dataMotor_wrapper .col-md-6:eq(0)');
        });
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
