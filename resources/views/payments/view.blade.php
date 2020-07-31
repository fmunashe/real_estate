@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Payments</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/payments">Payments</a></li>
                            <li class="breadcrumb-item active">View Payment</li>
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
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="text-center" id="receipt">
                            <address>
                                <strong>MS Resource.</strong><br>
                                12 Edmonds Avenue<br>
                                Belvedere, Harare<br>
                                Phone: +263 242 776872 | +263 772 232 352 | +263 712 380 272<br>
                            </address>
                            <b>Client Name: </b> {{ $payment->name }} <br>
                            <b>Phone: </b> {{ $payment->phone }} <br>
                            <b>Email: </b> {{ $payment->email }} <br>
                            <b>Stand Number: </b> {{ $payment->stand_number }} <br>
                            <b>Location: </b> {{ $payment->location }} <br>
                            <b>Stand Size: </b> {{ $payment->size }} <br>
                            <b>Amount: </b> {{ $payment->amount }} <br>
                            <b>Date: </b> {{ $payment->created_at }} <br>
                        </div>
                        <button type="button" class="btn btn-default" onclick="printDiv('receipt')"><i class="fas fa-print"></i> Print</button>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.content -->
    </div>
@endsection
