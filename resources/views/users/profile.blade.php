@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Profile</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
            <li class="breadcrumb-item active">Profile</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
     <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-dark card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle" src="{{asset('libs/admin-lte/img/avatar.png')}}" alt="User profile picture">
            </div>

            <h3 class="profile-username text-center">{{ Auth()->user()->name }}</h3>

            <p class="text-muted text-center">{{ Auth()->user()->email }}</p>

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="card card-dark card-outline">
          <div class="card-body box-profile">
            <div class="row">
              <div class="col-md-12">
                <div class="card card-dark">
                  <div class="card-header">
                    <h3 class="card-title">Set New Password</h3>
                  </div>
                  <!-- /.card-header -->
                  @if (session('error'))
                  <br>
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                      {{ session('error') }}
                    </div>
                    @endif
                    @if (session('success'))
                    <br>
                    <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h5><i class="icon fas fa-check"></i> Alert!</h5>
                      {{ session('success') }}
                    </div>
                    @endif
                  <!-- form start -->
                  <form method="post" action="/changePassword" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                      <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                        <label for="new-password">Current Password</label>
                        <input id="current-password" 
                        type="password" 
                        class="form-control {{ $errors->has('current-password') ? ' is-invalid' : '' }}" 
                        name="current-password">
                        @if ($errors->has('current-password'))
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('current-password') }}</strong>
                        </span>
                        @endif
                      </div>
                      <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                        <label for="new-password">New Password</label>
                        <input id="new-password" 
                        type="password" 
                        class="form-control {{ $errors->has('new-password') ? ' is-invalid' : '' }}" 
                        name="new-password">

                        @if ($errors->has('new-password'))
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('new-password') }}</strong>
                        </span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="new-password-confirm">Confirm New Password</label>
                        <input id="new-password-confirm" 
                        type="password" 
                        class="form-control" 
                        name="new-password_confirmation">
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" class="form-control btn btn-outline-dark">Change Password</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
</div>
<!-- /.content -->
</div>
@endsection
