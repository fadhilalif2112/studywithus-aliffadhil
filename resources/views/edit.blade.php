@extends('layout/main')

@section('title', 'User')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

   <!-- Main content -->
   <section class="content">
    <div class="container-fluid">
        <form action="{{ route('admin.user.update',['id'=>$data->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                  <!-- general form elements -->
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Form Edit User</h3>
                    </div>

                    <form role="form">
                      <div class="card-body">
                        <div class="form-group">
                          <label for="" class="form-label"><img src="{{asset('storage/foto-user/'.$data->image)}}" alt="" width="100"></label><br>
                          <label for="exampleInputEmail1" class="form-label">Profile Picture</label>
                          <input name="foto" type="file" class="form-control" id="exampleInputEmail1">
                        @error('foto')
                            <small>{{$message}}</small>
                        @enderror
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email</label>
                          <input name="email" type="email" value="{{ $data->email }}" class="form-control" id="exampleInputEmail1" placeholder="Edit Email">
                        @error('email')
                            <small>{{$message}}</small>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input name="name" type="text" value="{{ $data->name }}" class="form-control" id="exampleInputEmail1" placeholder="Edit nama">
                        @error('name')
                            <small>{{$message}}</small>
                        @enderror
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Password</label>
                          <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Edit Password">
                        @error('password')
                          <small>{{$message}}</small>
                        @enderror
                        </div>
                      <div class="">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{route('admin.pengguna')}}" class="btn btn-secondary">Batal</a>
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