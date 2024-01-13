@extends('layout/main')

@section('title', 'profile')

@section('content')
    
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            
            <!-- Profile Image -->
            {{-- src="{{asset('storage/foto-user/'.->image)}}" --}}
           
                
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="{{asset('storage/foto-user/'.$data[0]->image)}}"alt="User Had no profile picture">
                </div>
                
                <h3 class="profile-username text-center">{{auth()->user()->name}}</h3>

                <p class="text-muted text-center">Software Engineer</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Friends</b> <a class="float-right">13</a>
                  </li>
              </div>
              <!-- /.card-body -->
            </div>
            
        
            <!-- /.card -->
          </div>
          
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">About Me</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Edit Profile</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">

                    <div class="card-body">
                        <strong><i class="fas fa-book mr-1"></i> Education</strong>
        
                        <p class="text-muted">
                          B.S. in Computer Science from the University of Tennessee at Knoxville
                        </p>
        
                        <hr>
        
                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
        
                        <p class="text-muted">Malibu, California</p>
        
                        <hr>
        
                        <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>
        
                        <p class="text-muted">
                          <span class="tag tag-danger">UI Design</span>
                          <span class="tag tag-success">Coding</span>
                          <span class="tag tag-info">Javascript</span>
                          <span class="tag tag-warning">PHP</span>
                          <span class="tag tag-primary">Node.js</span>
                        </p>
        
                        <hr>
        
                        <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>
        
                        <p class="text-muted">-</p>
                      </div>
                  </div>
                
                     
                 
                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal" action="{{route('admin.profile.update',['id'=>auth()->user()->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf                    
                    @method('PUT')
                      <div class="form-group row">
                        <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Profile Picture</label>
                        <div class="col-sm-10"> 
                            <input name="foto" type="file" class="form-control" id="exampleInputEmail1">
                            @error('foto')
                                <small>{{$message}}</small>
                            @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input name="email" type="email" value="{{ auth()->user()->email }}" class="form-control" id="exampleInputEmail1" placeholder="Edit Email">
                            @error('email')
                                <small>{{$message}}</small>
                            @enderror
                        </div>
                        
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input name="name" type="text" value="{{ auth()->user()->name }}" class="form-control" id="exampleInputEmail1" placeholder="Edit nama">
                            @error('name')
                                <small>{{$message}}</small>
                            @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Edit Password">
                            @error('password')
                                <small>{{$message}}</small>
                            @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-10">
                            <input name="password" type="cpassword" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </>
                  </div>
                  
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection