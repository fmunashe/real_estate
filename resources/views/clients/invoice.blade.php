@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Invoice</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Invoice</li>
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
                    <div class="col-12">
                        <!-- Main content -->
                        <div class="invoice p-3 mb-3" id="invoice">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fas fa-globe"></i> MS Resource
                                        <small class="float-right">Date: {{ $invoice->created_at }}</small>
                                    </h4>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- info row -->
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    From
                                    <address>
                                        <strong>MS Resource.</strong><br>
                                        12 Edmonds Avenue<br>
                                        Belvedere, Harare<br>
                                        Phone: +263 242 776872 | +263 772 232 352 | +263 712 380 272<br>
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    To
                                    <address>
                                        <strong>{{ $invoice->name }}</strong><br>
                                        {{ $invoice->address }}<br>
                                        Phone: {{ $invoice->phone }}<br>
                                        Email: {{ $invoice->email }}
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    <b>Invoice #{{ $invoice->id }}</b><br>
                                    <br>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- Table row -->
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Qty</th>
                                            <th>Description</th>
                                            <th>Subtotal</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>{{ $invoice->description }}</td>
                                            <td>${{ $invoice->amount }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <!-- accepted payments column -->
                                <div class="col-6">
                                    {{--<p class="lead">Notes:</p>--}}

                                    {{--<p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">--}}
                                        {{--Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning--}}
                                        {{--heekya handango imeem--}}
                                        {{--plugg--}}
                                        {{--dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.--}}
                                    {{--</p>--}}
                                </div>
                                <!-- /.col -->
                                <div class="col-6">
                                    {{--<p class="lead">Amount Due 2/22/2014</p>--}}

                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                            {{--<tr>--}}
                                                {{--<th style="width:50%">Subtotal:</th>--}}
                                                {{--<td>$250.30</td>--}}
                                            {{--</tr>--}}
                                            {{--<tr>--}}
                                                {{--<th>Tax (9.3%)</th>--}}
                                                {{--<td>$10.34</td>--}}
                                            {{--</tr>--}}
                                            {{--<tr>--}}
                                                {{--<th>Shipping:</th>--}}
                                                {{--<td>$5.80</td>--}}
                                            {{--</tr>--}}
                                            <tr>
                                                <th>Total:</th>
                                                <td>${{ $invoice->amount }}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- this row will not appear when printing -->
                            <div class="row no-print">
                                <div class="col-12">
                                    <button type="button" class="btn btn-default float-right" onclick="printDiv('invoice')"><i
                                                class="fas fa-print"></i> Print</button>
                                    {{--<button type="button" class="btn btn-success float-right"><i--}}
                                                {{--class="far fa-credit-card"></i> Submit--}}
                                        {{--Payment--}}
                                    {{--</button>--}}
                                    {{--<button type="button" class="btn btn-primary float-right"--}}
                                            {{--style="margin-right: 5px;">--}}
                                        {{--<i class="fas fa-download"></i> Generate PDF--}}
                                    {{--</button>--}}
                                </div>
                            </div>
                        </div>
                        <!-- /.invoice -->
                    </div><!-- /.col -->
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
@endsection