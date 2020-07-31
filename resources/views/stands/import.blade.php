@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Import Stands</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/stands">Stands</a></li>
            <li class="breadcrumb-item active">Import Stands</li>
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
                        <h3 class="card-title">Import Stands</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="/stands" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="user_type">Location</label>
                                <select class="form-control {{ $errors->has('location_id') ? ' is-invalid' : '' }}" name="location_id" id="location_id">
                                    <option>Select location</option>
                                    @foreach($locations as $location)
                                        <option value="{{$location->id}}">{{ $location->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('location_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('location_id') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="file">Stands List</label>
                                <input type="file"
                                           class="form-control-file {{ $errors->has('file') ? ' is-invalid' : '' }}"
                                           name="file"
                                           id="file">
                                @if ($errors->has('file'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('file') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="form-control btn btn-outline-dark">Upload Stands List</button>
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
