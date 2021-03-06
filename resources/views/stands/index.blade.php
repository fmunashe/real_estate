@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Available Stands</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
            <li class="breadcrumb-item active">Stands</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <!-- <h3 class="card-title">DataTable with default features</h3> -->
          <a href="/stands/import" class="btn btn-dark"><i class="fas fa-plus-circle"></i> Import Stands List</a>
        </div>
          @if (session('error'))
              <br>
              <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                  {{ session('error') }}
              </div>
      @endif
        <!-- /.card-header -->
        <div class="card-body">
          <table id="table" class="table table-bordered table-striped table-sm">
            <thead>
              <tr>
                <th>#</th>
                <th>Stand Number</th>
                <th>Size</th>
                <th>Location</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($stands as $item)
              <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->stand_number }}</td>
                <td>{{ $item->size }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->status ? 'Sold' : 'Not Sold' }}</td>
                <td>
                  <a href="/stand/{{$item->id}}/view" class="btn btn-xs btn-info"><i class="fas fa-eye"></i> View</a>
{{--                  <a href="/stand/{{$item->id}}/edit" class="btn btn-xs btn-success"><i class="fas fa-edit"></i> Edit</a>--}}
                  <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete" onclick="deleteData('/stand/delete/' + {{$item->id}})"><i class="fas fa-trash"></i> Delete</button>
                </td>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>#</th>
                <th>Stand Number</th>
                <th>Size</th>
                <th>Location</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.content -->
</div>

<div class="modal fade" id="delete">
  <div class="modal-dialog">
    <div class="modal-content bg-danger">
      <div class="modal-header">
        <h4 class="modal-title">Delete Client</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form accept="" method="post" id="deleteForm">
        {{csrf_field()}}
        <div class="modal-body">
          <div class="modal-body">
            <p>Are you sure you want to delete this stand?</p>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-outline-light" data-dismiss="modal" onclick="deleteFormSubmit()">Delete</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection
