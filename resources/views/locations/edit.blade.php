@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Edit Location</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/locations">Locations</a></li>
            <li class="breadcrumb-item active">Edit Location</li>
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
                    <div class="card card-gray-dark">
                      <div class="card-header">
                        <h3 class="card-title">Update Location Details</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="/location/{{ $location[0]->id }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Location name</label>
                                <input type="text"
                                class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                name="name" 
                                id="name"
                                value="{{ old('name') ?? $location[0]->name}}"
                                placeholder="Enter location name">
                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="form-control btn btn-outline-dark">Update Location Details</button>
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
