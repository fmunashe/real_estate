@extends('layouts.admin')

@section('content')
<div class="content-wrapper" style="min-height: 1416.81px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Client Profile</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/clients">Clients</a></li>
            <li class="breadcrumb-item active">Client Profile</li>
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
          <div class="card card-dark card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="/libs/admin-lte/img/user.png" alt="User profile picture">
              </div>

              <h3 class="profile-username text-center">{{ $client[0]->name }}</h3>

              <b>National ID: </b> {{ $client[0]->national_id }} <br>
              <b>Phone: </b> {{ $client[0]->phone }} <br>
              <b>Email: </b> {{ $client[0]->email }} <br>
              <b>Address: </b> {{ $client[0]->address }} <br>
              <b>Marital Status: </b> {{ $client[0]->marital_status }} <br>
              <b>Date of Birth: </b> {{ $client[0]->dob }}
              <h3 class="profile-username text-center">Spouse Details</h3>
              <b>Name: </b> {{ $client[0]->spouse }} <br>
              <b>National ID: </b> {{ $client[0]->spouse_national_id }} <br>
              <b>Phone: </b> {{ $client[0]->spouse_phone }} <br>
              <b>Address: </b> {{ $client[0]->spouse_address }} <br>

              <a href="/client/{{ $client[0]->id }}/edit" class="btn btn-dark btn-block"><i class="fas fa-edit"></i><b> Edit</b></a>
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
                <li class="nav-item"><a class="nav-link active" href="#stands" data-toggle="tab">Stands</a></li>
                <li class="nav-item"><a class="nav-link" href="#invoices" data-toggle="tab">Invoices</a></li>
                <li class="nav-item"><a class="nav-link" href="#payments" data-toggle="tab">Payments</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane active" id="stands">
                  <div class="card">
                    <div class="card-header p-2">
                      <a href="/client/{{ $client[0]->id }}/stand" class="btn btn-dark"><i class="fas fa-plus-circle"></i> Add Stand</a>
                    </div>
                    <div class="card-body">
                      @foreach($stands as $stand)
                      <div class="callout callout-success">
                        <div class="row">
                          <div class="col-md-6">
                            <h3>Details</h3>
                            <b>Stand Number: </b> {{ $stand->stand_number }} <br>
                            <b>Stand Size: </b> {{ $stand->size }} square meters<br>
                            <b>Location: </b> {{ $stand->location }} <br>
                            <b>Purchase Price: </b> ${{ $stand->price }} <br>
                            <b>Basic Amortisation Premium: </b> ${{ $stand->armotisation }} <br>
                            <b>Mortgage Protection Plan: </b> ${{ $stand->mortgage_protection }} <br>
                            <b>Monthly Installments: </b> ${{ $stand->monthly_installment }} <br>
                            <b>Commencement Date: </b> {{ $stand->com_date }} <br>
                            <h3 class="profile-username">Key Beneficiary</h3>
                            <b>Name: </b> {{ $stand->name }} <br>
                            <b>Phone: </b> {{ $stand->phone }} <br>
                            <b>Address: </b> {{ $stand->address }} <br>
                            <b>Relationship: </b> {{ $stand->relationship }} <br>
                            <b>Approved By: </b> {{ $stand->created_by }} <br>
                          </div>
                          <div class="col-md-6">
                            <button class="btn btn-dark" data-toggle="modal" data-target="#payment" onclick="setPaymentData({{ $stand->stand_id}}, {{ $stand->client_id }})"><i class="fas fa-money"></i> Make Payment</button><br>
                            <b>Amount Paid so Far: </b> ${{ $stand->amount_paid+$stand->armotisation }} <br>
                            <b>Balance Remaining: </b> ${{ $stand->price - $stand->amount_paid }} <br>
                          </div>
                        </div>
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="invoices">
                  <div class="card">
                    <div class="card-header">
                      <!-- <h3 class="card-title">DataTable with default features</h3> -->
                   </div>
                   <!-- /.card-header -->
                   <div class="card-body">
                    <table id="table" class="table table-bordered table-striped table-sm">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Stand Number</th>
                          <th>Size</th>
                          <th>Location</th>
                          <th>Amount</th>
                          <th>Date</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($invoices as $item)
                        <tr>
                          <td>{{ $item->id }}</td>
                          <td>{{ $item->stand_number }}</td>
                          <td>{{ $item->size }}</td>
                          <td>{{ $item->location }}</td>
                          <td>{{ $item->amount }}</td>
                          <td>{{ $item->created_at }}</td>
                          <td>
                            <a href="/client/{{$item->id}}/invoice" class="btn btn-xs btn-info"><i class="fas fa-eye"></i> View</a>
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
                          <th>Amount</th>
                          <th>Date</th>
                          <th>Action</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="payments">
                <div class="card">
                    <div class="card-header">
                      <!-- <h3 class="card-title">DataTable with default features</h3> -->
                   </div>
                   <!-- /.card-header -->
                   <div class="card-body">
                    <table id="payments" class="table table-bordered table-striped table-sm">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Stand Number</th>
                          <th>Size</th>
                          <th>Location</th>
                          <th>Amount</th>
                          <th>Date</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($payments as $item)
                        <tr>
                          <td>{{ $item->id }}</td>
                          <td>{{ $item->stand_number }}</td>
                          <td>{{ $item->size }}</td>
                          <td>{{ $item->location }}</td>
                          <td>{{ $item->amount }}</td>
                          <td>{{ $item->created_at }}</td>
                          <td>
                            <a href="/payment/{{$item->id}}/view" class="btn btn-xs btn-info"><i class="fas fa-eye"></i> View</a>
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
                          <th>Amount</th>
                          <th>Date</th>
                          <th>Action</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
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

<div class="modal fade" id="payment">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Make Payment</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/payment" method="post" id="paymentForm">
        {{csrf_field()}}
        <div class="modal-body">
          <div class="modal-body">
            <input type="number" name="stand_id" id="stand_id" hidden>
            <input type="number" name="client_id" id="client_id" hidden>
            <div class="form-group">
              <label for="amount">Amount</label>
              <input type="number" 
              name="amount" 
              class="form-control"
              placeholder="Amount" required>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="form-control btn btn-danger" data-dismiss="modal">Cancel</button>
          <button type="button" class="form-control btn btn-dark" data-dismiss="modal" onclick="paymentFormSubmit()">Pay</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection
