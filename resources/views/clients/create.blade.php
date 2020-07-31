@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Create New Client</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/clients">Clients</a></li>
                <li class="breadcrumb-item active">New Client</li>
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
                    <h3 class="card-title">Client Details</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="/client" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Client name</label>
                                    <input type="text"
                                    class="form-control form-control-sm {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                    name="name" 
                                    id="name"
                                    value="{{ old('name')}}"
                                    placeholder="Enter client name">
                                    @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="email">Client email</label>
                                    <input type="email"
                                    class="form-control form-control-sm {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    name="email" 
                                    id="email"
                                    value="{{ old('email')}}"
                                    placeholder="Enter client email">
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="phone">Client phone</label>
                                    <input type="text"
                                    class="form-control form-control-sm {{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                    name="phone" 
                                    id="phone"
                                    value="{{ old('phone')}}"
                                    placeholder="Enter client phone">
                                    @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="national_id">Client national id</label>
                                    <input type="text"
                                    class="form-control form-control-sm {{ $errors->has('national_id') ? ' is-invalid' : '' }}"
                                    name="national_id" 
                                    id="national_id"
                                    value="{{ old('national_id')}}"
                                    placeholder="Enter client national id">
                                    @if ($errors->has('national_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('national_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="dob">Client date of birth</label>
                                    <input type="text"
                                    class="form-control form-control-sm {{ $errors->has('dob') ? ' is-invalid' : '' }}"
                                    name="dob" 
                                    id="dob"
                                    value="{{ old('dob')}}"
                                    placeholder="Enter client date of birth">
                                    @if ($errors->has('dob'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                    @endif
                                </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="spouse">Spouse name</label>
                                <input type="text"
                                class="form-control form-control-sm {{ $errors->has('spouse') ? ' is-invalid' : '' }}"
                                name="spouse" 
                                id="spouse"
                                value="{{ old('spouse')}}"
                                placeholder="Enter spouse name">
                                @if ($errors->has('spouse'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('spouse') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="spouse_phone">Spouse phone</label>
                                <input type="text"
                                class="form-control form-control-sm {{ $errors->has('spouse_phone') ? ' is-invalid' : '' }}"
                                name="spouse_phone" 
                                id="spouse_phone"
                                value="{{ old('spouse_phone')}}"
                                placeholder="Enter spouse phone">
                                @if ($errors->has('spouse_phone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('spouse_phone') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="spouse_address">Spouse address</label>
                                <input type="text"
                                class="form-control form-control-sm {{ $errors->has('spouse_address') ? ' is-invalid' : '' }}"
                                name="spouse_address" 
                                id="spouse_address"
                                value="{{ old('spouse_address')}}"
                                placeholder="Enter spouse address">
                                @if ($errors->has('spouse_address'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('spouse_address') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="spouse_national_id">Spouse national ID</label>
                                <input type="text"
                                class="form-control form-control-sm {{ $errors->has('spouse_national_id') ? ' is-invalid' : '' }}"
                                name="spouse_national_id" 
                                id="spouse_national_id"
                                value="{{ old('spouse_national_id')}}"
                                placeholder="Enter spouse national ID">
                                @if ($errors->has('spouse_national_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('spouse_national_id') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="marital_status">Marital Status</label>
                                <select class="form-control form-control-sm {{ $errors->has('marital_status') ? ' is-invalid' : '' }}"
                                        name="marital_status"
                                        id="marital_status"
                                        value="{{ old('marital_status')}}">
                                    <option>Select Marital Status</option>
                                    <option value="Married">Married</option>
                                    <option value="Single">Single</option>
                                    <option value="Divorced">Divorced</option>
                                    <option value="Widowed">Widowed</option>
                                </select>
                                @if ($errors->has('marital_status'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('marital_status') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                    </div>
                        <div class="form-group">
                            <label for="address">Client address</label>
                            <textarea
                                   class="form-control form-control-sm {{ $errors->has('address') ? ' is-invalid' : '' }}"
                                   name="address"
                                   id="address"
                                   value="{{ old('address')}}"
                                   placeholder="Enter client address"></textarea>
                            @if ($errors->has('address'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                            @endif
                        </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="form-control btn btn-outline-dark">Create Client</button>
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
