@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Create New User</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/users">Users</a></li>
            <li class="breadcrumb-item active">Create User</li>
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
                <div class="col-md-12">
                    <div class="card card-dark">
                      <div class="card-header">
                        <h3 class="card-title">User Details</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{ route('register') }}"enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text"
                                class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                name="name" 
                                id="name"
                                value="{{ old('name')}}"
                                placeholder="Enter user name">
                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email"
                                class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                name="email" 
                                id="email"
                                value="{{ old('email')}}"
                                placeholder="Enter user email">
                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="user_type">User Type</label>
                                <select class="form-control {{ $errors->has('user_type') ? ' is-invalid' : '' }}" name="user_type_id" id="user_type_id">
                                    <option>Select user type</option>
                                    @foreach ($types as $key => $value)
                                        <option value="{{ $key }}">
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('user_type'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('user_type') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password"
                                class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                name="password" 
                                id="password"
                                placeholder="Enter password">
                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm password</label>
                                <input type="password"
                                class="form-control {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                name="password_confirmation" 
                                id="password_confirmation"
                                placeholder="Enter confirm password">
                                @if ($errors->has('password_confirmation'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="form-control btn btn-outline-dark">Create User</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- /.content -->
</div>
@endsection
