@extends('admin.layouts.main')
@section('content')
<section class="content">
  <div class="row">
    <div class="col-md-6 col-lg-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Input Data Type Motor</h3>
        </div>
        <form action="{{ route('admin.type-motor.store') }}" method="post">
          @csrf
          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputTypeMotor">Nama Type Motor</label>
              <input name="nama" type="text" class="form-control" id="exampleInputTypeMotor" placeholder="Masukan type motor (Matic, Bebek/CUB, Sport, dll)">
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-6 col-lg-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Type Motor</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <form action="{{ url()->current() }}" method="GET">
              <div class="row">
                <div class="col-sm-12">
                  <label>Search: <input type="text" name="search" value="{{request()->get('search')}}" class="form-control input-sm" placeholder="Masukan nama type motor" aria-controls="example1"></label>
                </div>
              </div>
            </form>
            <div class="row">
              <div class="col-sm-12">
                <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                  <thead>
                    <tr role="row">
                      <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 286.469px;">ID</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 348.875px;">Nama type motor</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 310.453px;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if (!$types)
                    <p>Tidak ada data!</p>
                    @else
                    @foreach ($types as $index => $type)
                    <tr role="row" class="{{ $index % 2 == 0 ? 'even' : 'odd' }}">
                      <td>{{$type->id}}</td>
                      <td>{{$type->nama}}</td>
                      <td>
                        <div class="btn-group">
                          <form action="{{ route('admin.type-motor.destroy', $type->id) }}" method="post">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit{{$type->id}}">
                              Edit
                            </button>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                        </div>
                        <!-- Modal update -->
                        <div class="modal fade" id="modalEdit{{$type->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Edit data: {{$type->nama}}</h4>
                              </div>
                              <form action="{{ route('admin.type-motor.update', $type->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                  <div class="box box-primary">
                                    <div class="box-header with-border">
                                      <h3 class="box-title">Input Data Type Motor</h3>
                                    </div>
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{$type->id}}">
                                    <div class="box-body">
                                      <div class="form-group">
                                        <label for="exampleInputTypeMotor">Nama Type Motor</label>
                                        <input name="nama_edit" type="text" class="form-control" id="exampleInputTypeMotor" placeholder="Masukan type motor (Matic, Bebek/CUB, Sport, dll)">
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
                    @endif
                  </tbody>
                </table>
              </div>
            </div>
            <!-- pagination -->
            <div class="row">
              {{ $types->links('admin.layouts.partials.pagination') }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection