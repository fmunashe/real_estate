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
            <li class="breadcrumb-item"><a href="/stands">Stands</a></li>
            <li class="breadcrumb-item active">Stand Details</li>
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
                <div class="col-md-6">
                  <b>Owner Name: </b>{{ $details->name }}<br>
                  <b>Phone Number: </b> {{ $details->phone }}<br>
                  <b>Email: </b> {{ $details->email }} <br>
                  <b>Address: </b> {{ $details->address }} <br>
                  <b>Stand Number: </b> {{ $details->stand_number }} <br>
                  <b>Stand Size: </b> {{ $details->size }} square meters<br>
                  <b>Location: </b> {{ $details->location }} <br>
                  <b>Purchase Price: </b> ${{ $details->price }} <br>
                  <b>Basic Amortisation Premium: </b> ${{ $details->armotisation }} <br>
                  <b>Mortgage Protection Plan: </b> ${{ $details->mortgage_protection }} <br>
                  <b>Monthly Installments: </b> ${{ $details->monthly_installment }} <br>
                  <b>Commencement Date: </b> {{ $details->com_date }} <br>
                </div>
                <div class="col-md-6">
                  <h3 class="profile-username">Key Beneficiary</h3>
                  <b>Name: </b> {{ $details->name }} <br>
                  <b>Phone: </b> {{ $details->phone }} <br>
                  <b>Address: </b> {{ $details->address }} <br>
                  <b>Approved By: </b> {{ $details->approved_by }} <br>
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
