@extends('admin.layouts.main')
@section('content')

<div class="row">
  <div class="col-12">
    <div class="card card-primary">
      <div class="card-header">
        <div class="card-title">
          Tambah data event
        </div>
      </div>
      <form action="{{ route('admin.event.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="card-body">
          <div class="row">
            <div class="form-group col-md-6">
              <label for="judul">Judul Event</label>
              <input name="judul" type="text" class="form-control" id="judul" placeholder="Masukan judul event">
            </div>
            <div class="form-group col-md-6">
              <label for="tanggal">Tanggal Event</label>
              <input name="tanggal" type="text" class="form-control" id="tanggal" placeholder="Masukan tanggal event">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-12">
              <label>Deskripsi Event</label>
              <textarea id="deskripsi-event" name="deskripsi" class="form-control" rows="3" placeholder="Deskripsi Event"></textarea>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-5">
              <label for="exampleInputFile">Pilih Gambar</label>
              <input type="file" id="exampleInputFile" class="" name="gambar_event">
              <p class="help-block">Silahkan pilih gambar event</p>
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

<div class="row">
  <div class="col-12">
    <div class="card card-primary">
      <div class="card-header">
        <div class="card-title">
          Data Event
        </div>
      </div>
      <div class="card-body">
        <table id="dataDetail" class="table-bordered table-striped table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Judul Event</th>
              <th>Tanggal Event</th>
              <th>Deskripsi Event</th>
              <th>Gambar</th>
              <th width="120px">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($event as $e)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $e->judul }}</td>
              <td>{{ $e->tanggal_event }}</td>
              <td>{!! $e->deskripsi !!}</td>
              <td>
                <img width="150px" src="/assets/images/event/{{ $e->thumbnail }}" alt="{{ $e->thumbnail }}" srcset="">
              </td>
              <td>
                <div class="d-flex justify-content-between">
                  <button data-toggle="modal" data-target="#modalEdit{{$e->id}}" class="btn btn-warning">Edit</button>
                  <button class="btn btn-success" data-toggle="modal" data-target="#modal-view-gambar-{{$e->id}}" data-placement="top" title="Lihat Gambar">Lihat</button>
                  <form action="{{ route('admin.event.destroy', $e->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger show_confirm">Delete</button>
                  </form>
                </div>
                <!-- modal update detail motor start -->
                <div class="modal fade" id="modalEdit{{$e->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Edit data: {{$e->judul}}</h4>
                      </div>
                      <form action="{{ route('admin.event.update', $e->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                          <div class="row">
                            <div class="form-group col">
                              <label for="judul">Judul Event</label>
                              <input name="judul" type="text" class="form-control" id="judul" placeholder="Masukan judul event" value="{{$e->judul}}">
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col">
                              <label for="tanggal">Tanggal Event</label>
                              <input name="tanggal_update" type="text" class="form-control" id="tanggal" placeholder="Masukan tanggal event" value="{{$e->tanggal_event}}">
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-md-12">
                              <label>Deskripsi Event</label>
                              <textarea id="deskripsi-event-edit" name="deskripsi" class="form-control" rows="3" placeholder="Deskripsi Event">{{$e->deskripsi}}</textarea>
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col">
                              <label for="exampleInputFile">Pilih Gambar</label>
                              <input type="file" id="exampleInputFile" class="" name="gambar_event">
                              <p class="help-block">Silahkan pilih gambar event</p>
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
                <!-- modal update detail motor end -->
                <!-- modal lihat gambar start -->
                <div class="modal fade" id="modal-view-gambar-{{$e->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Gambar: {{$e->judul}}</h4>
                      </div>
                      <div class="modal-body">
                        <img src="{{ '/assets/images/event/' . $e->thumbnail }}" width="100%" height="50%" />
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- modal lihat gambar end -->
              </td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>ID</th>
              <th>Judul Event</th>
              <th>Tanggal Event</th>
              <th>Deskripsi Event</th>
              <th>Gambar</th>
              <th width="120px">Action</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>

@endsection


@push('script')
<script>
  $(document).ready(function() {

    function limitCharacterCount(editor, limit) {
      editor.on('summernote.keyup', function(we, e) {
        var content = $(this).summernote('code');
        var text = $('<div>').html(content).text();

        if (text.length > limit) {
          var modifiedText = text.substring(0, limit);
          $(this).summernote('code', modifiedText);
        }
      });
    }

    $('#deskripsi-event').summernote({
      placeholder: 'buat isi deskripsi event maksimal 400 karakter ...',
      tabsize: 2,
      height: 100,
      callbacks: {
        onInit: function() {
          limitCharacterCount($(this), 400); // Batasi hingga 400 karakter
        }
      }
    })

    $('#deskripsi-event-edit').summernote({
      placeholder: 'buat isi deskripsi event maksimal 400 karakter ...',
      tabsize: 2,
      height: 300,
      callbacks: {
        onInit: function() {
          limitCharacterCount($(this), 400); // Batasi hingga 400 karakter
        }
      }
    })

    $("#dataDetail").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      //"buttons": ["copy", "csv", "excel", "pdf", "print"] //, "colvis"
    }).buttons().container().appendTo('#dataDetail .col-md-6:eq(0)');


    //Initialize Select2 Elements
    $('.select2').select2()

    $('.show_confirm').click(function(event) {
      var form = $(this).closest("form");
      var name = $(this).data("name");
      event.preventDefault();
      swal({
          title: `Delete Data Detail ?`,
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
    })
  })
</script>
@endpush