@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Stand Details</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/clients">Clients</a></li>
            <li class="breadcrumb-item active">Add Stand</li>
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
          <div class="card">
            <div class="card-header p-2">
              <h3>Details</h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="card card-dark">
                    <div class="card-header">
                      <h3 class="card-title">Client Details</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="/client/stand/add/{{ $id }}" enctype="multipart/form-data">
                      @csrf
                      <div class="card-body">
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
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="stand_id">Stand Number</label>
                              <input type="text"
                              class="form-control form-control-sm {{ $errors->has('stand_id') ? ' is-invalid' : '' }}"
                              name="stand_id" 
                              id="stand_id"
                              value="{{ old('stand_id')}}"
                              placeholder="Enter stand number">
                              @if ($errors->has('stand_id'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('stand_id') }}</strong>
                              </span>
                              @endif
                            </div>
                            <div class="form-group">
                                <label for="user_type">Location</label>
                                <select class="form-control form-control-sm  {{ $errors->has('location_id') ? ' is-invalid' : '' }}"
                                  name="location_id" 
                                  id="location_id">
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
                              <label for="price">Price</label>
                              <input type="number"
                              class="form-control form-control-sm  {{ $errors->has('price') ? ' is-invalid' : '' }}"
                              name="price" 
                              id="price"
                              value="{{ old('price')}}"
                              placeholder="Enter price">
                              @if ($errors->has('price'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('price') }}</strong>
                              </span>
                              @endif
                            </div>
                            <div class="form-group">
                              <label for="armotisation">Armotisation</label>
                              <input type="text"
                              class="form-control form-control-sm  {{ $errors->has('armotisation') ? ' is-invalid' : '' }}"
                              name="armotisation" 
                              id="armotisation"
                              value="{{ old('armotisation')}}"
                              placeholder="Enter armotisation">
                              @if ($errors->has('armotisation'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('armotisation') }}</strong>
                              </span>
                              @endif
                            </div>
                            <div class="form-group">
                              <label for="mortgage_protection">Mortgage protection</label>
                              <input type="text"
                              class="form-control form-control-sm  {{ $errors->has('mortgage_protection') ? ' is-invalid' : '' }}"
                              name="mortgage_protection" 
                              id="mortgage_protection"
                              value="{{ old('mortgage_protection')}}"
                              placeholder="Enter mortgage protection">
                              @if ($errors->has('mortgage_protection'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('mortgage_protection') }}</strong>
                              </span>
                              @endif
                            </div>
                            <div class="form-group">
                              <label for="monthly_installment">Monthly installment</label>
                              <input type="text"
                              class="form-control form-control-sm  {{ $errors->has('monthly_installment') ? ' is-invalid' : '' }}"
                              name="monthly_installment" 
                              id="monthly_installment"
                              value="{{ old('monthly_installment')}}"
                              placeholder="Enter monthly installment">
                              @if ($errors->has('monthly_installment'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('monthly_installment') }}</strong>
                              </span>
                              @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="name">Beneficiary name</label>
                            <input type="text"
                            class="form-control form-control-sm {{ $errors->has('name') ? ' is-invalid' : '' }}"
                            name="name" 
                            id="name"
                            value="{{ old('name')}}"
                            placeholder="Enter beneficiary name">
                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                          </div>
                          <div class="form-group">
                            <label for="phone">Beneficiary phone</label>
                            <input type="text"
                            class="form-control form-control-sm {{ $errors->has('phone') ? ' is-invalid' : '' }}"
                            name="phone" 
                            id="phone"
                            value="{{ old('phone')}}"
                            placeholder="Enter beneficiary phone">
                            @if ($errors->has('phone'))
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                            @endif
                          </div>
                          <div class="form-group">
                            <label for="address">Beneficiary address</label>
                            <input type="text"
                            class="form-control form-control-sm {{ $errors->has('address') ? ' is-invalid' : '' }}"
                            name="address" 
                            id="address"
                            value="{{ old('address')}}"
                            placeholder="Enter beneficiary address">
                            @if ($errors->has('address'))
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('address') }}</strong>
                            </span>
                            @endif
                          </div>
                          <div class="form-group">
                            <label for="relationship">Relationship</label>
                            <input type="text"
                            class="form-control form-control-sm {{ $errors->has('relationship') ? ' is-invalid' : '' }}"
                            name="relationship" 
                            id="relationship"
                            value="{{ old('relationship')}}"
                            placeholder="Enter relationship">
                            @if ($errors->has('relationship'))
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('relationship') }}</strong>
                            </span>
                            @endif
                          </div>
                            <div class="form-group">
                                <label for="com_date">Commencement date</label>
                                <input type="text"
                                       class="form-control form-control-sm  {{ $errors->has('com_date') ? ' is-invalid' : '' }}"
                                       name="com_date"
                                       id="com_date"
                                       value="{{ old('com_date')}}"
                                       placeholder="Enter commencement date">
                                @if ($errors->has('com_date'))
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('com_date') }}</strong>
                              </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="attachment">Attachment</label>
                                <input type="file" name="attachment"
                                       class="form-control-file form-control-sm {{ $errors->has('attachment') ? ' is-invalid' : '' }}">
                                @if ($errors->has('attachment'))
                                    <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('attachment') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" class="form-control btn btn-outline-dark">Save Stand Details</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.content -->
</div>
@endsection
