@extends('layout/main')

@section('title', 'Products')

@section('css')
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Products</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">
              <a href="{{route('admin.products.create')}}" class="btn btn-primary mb-2">Tambah Data</a>
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Tabel Product</h3>
  
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-4">
                  <table class="table table-hover" id="table_user">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>SKU</th>
                        <th>Price</th>
                        <th>description</th>
                        <th>Image</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $d)
                      <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $d -> title }}</td>
                        <td>{{ $d -> sku }}</td>
                        <td>Rp. {{ $d -> price }}</td>
                        <td>{{ $d -> description }}</td>
                        <td><img src="{{asset('storage/foto-product/'.$d->image_uri)}}" alt="{{ asset($d->image_uri) }}" width="100"></td>
                        <td>
                            <a href="{{ route('admin.products.edit',['id'=>$d->id]) }}"class="btn btn-primary"><i class="fas fa-pen"></i> Edit</a>
                            <a href=""class="btn btn-danger"  data-toggle="modal" data-target="#modal-hapus{{$d->id}}"><i class="fas fa-trash"></i> Hapus</a>
                        </td>
                     </tr>
                     <div class="modal fade" id="modal-hapus{{$d->id}}">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Konfirmasi Hapus Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p>Apakah kamu yakin ingin menghpaus data user <b>{{$d->title}}</b> ? </p>
                          </div>
                          <form action="{{route('admin.products.hapus',['id' => $d->id])}}" method="POST">
                            <div class="modal-footer justify-content-between">
                              @csrf
                              @method('DELETE')
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                              <button type="submit" class="btn btn-danger">Hapus</button>
                            </div>
                          </form>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                     @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection

@section('script')
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

  <script>
    $(document).ready( function () {
      $('#table_user').DataTable();
    } );
  </script>

@endsection