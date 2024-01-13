@extends('layout/main')

@section('title', 'Tambah Products')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Productsr</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
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
        <form action="{{ route('admin.products.simpan')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                  <!-- general form elements -->
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Form Tambah Product</h3>
                    </div>

                    <form role="form">
                      <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input name="title" type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan Title product">
                        @error('title')
                            <small>{{$message}}</small>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">SKU</label>
                            <input name="sku" type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan SKU product">
                        @error('sku')
                            <small>{{$message}}</small>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Price</label>
                            <input name="price" type="number" class="form-control" id="exampleInputEmail1" placeholder="Masukan Price (Rp.)">
                        @error('price')
                            <small>{{$message}}</small>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <textarea name="description" type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan Deskripsi product"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Image</label>
                            <input name="image_uri" type="file" class="form-control mb-2" id="exampleInputEmail1">
                        @error('Image')
                            <small>{{$message}}</small>
                        @enderror
                        </div>
                      <div class="">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                  </div>
                  <!-- /.card -->
                </div>
                <!--/.col (left) -->
              </div>
        </form>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  </div>
@endsection