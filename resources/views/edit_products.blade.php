@extends('layout/main')

@section('title', 'Edit Products')

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
        <form action="{{ route('admin.products.update',['id'=>$data->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                  <!-- general form elements -->
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Form Edit Product</h3>
                    </div>

                    <form role="form">
                      <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input name="title" type="text" value="{{ $data->title }}" class="form-control" id="exampleInputEmail1" placeholder="Edit Title Product">
                        @error('title')
                            <small>{{$message}}</small>
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputEmail1">SKU</label>
                            <input name="sku" type="text" value="{{ $data->sku }}" class="form-control" id="exampleInputEmail1" placeholder="Edit SKU Product">
                        @error('sku')
                            <small>{{$message}}</small>
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputEmail1">Price</label>
                            <input name="price" type="number" value="{{ $data->price }}" class="form-control" id="exampleInputEmail1" placeholder="Edit Price Product">
                        @error('price')
                            <small>{{$message}}</small>
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputEmail1">Deskripsi Product</label>
                            <input name="description" type="text" value="{{ $data->description}}" class="form-control" id="exampleInputEmail1" placeholder="Edit Deskripsi Product">
                        @error('desctiption')
                            <small>{{$message}}</small>
                        @enderror
                        <div class="form-group">
                          <label for="exampleInputEmail1" class="form-label">Producr Image</label>
                          <input name="image_uri" type="file" class="form-control" id="exampleInputEmail1">
                          <label for="" class="form-label"><img src="{{asset('storage/foto-product/'.$data->image_uri)}}" alt="" width="100"></label><br>
                        @error('image_uri')
                            <small>{{$message}}</small>
                        @enderror
                        </div>
                      <div class="">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{route('admin.products')}}" class="btn btn-secondary">Batal</a>
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