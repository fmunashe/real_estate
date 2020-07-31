@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Dashboard</li>
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
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $clients }}</h3>

                                <p>Clients</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <a href="/clients" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $sold_stands }}</h3>

                                <p>Sold Stands</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-chart-bar"></i>
                            </div>
                            <a href="/stands" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $stands }}</h3>

                                <p>Total Stands</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-map"></i>
                            </div>
                            <a href="/stands" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $locations }}</h3>

                                <p>Locations</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-map-marked-alt"></i>
                            </div>
                            <a href="/locations" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <!-- STACKED BAR CHART -->
                        <div class="card card-dark">
                            <div class="card-header">
                                <h3 class="card-title">Stands Activity by Location</h3>
                            </div>
                            <div class="card-body">
                                    <table id="table" class="table table-striped table-sm table-hover">
                                        <thead class="table-success">
                                        <tr>
                                            <th>Locations</th>
                                            <th colspan="10">Details</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($locs as $loc)
                                            <tr>
                                                <th class="bg-dark">{{$loc->name}}</th>
                                                @foreach($loc->stands($loc->id) as $star)
                                                    <td colspan="10">
                                            <tr @if($star->status) class="table-warning"
                                                @else class="table-success" @endif>
                                                <td>Stand Number</td>
                                                <td> {{$star->stand_number}}</td>
                                                <td>Size</td>
                                                <td> {{$star->size}}</td>
{{--                                                <td>Status</td>--}}
                                                <td>@if($star->status) Sold @else Available @endif</td>
                                                <td>Price</td>
                                                <td>${{number_format($star->pay($star->id)['price'],2)}}</td>
                                                <td>Installment</td>
                                                <td>${{number_format($star->pay($star->id)['monthly_installment'],2)}}</td>
                                                <td>Paid</td>
                                                <td>${{number_format($star->pay($star->id)['amount_paid']+$star->pay($star->id)['armotisation'],2)}}</td>
                                            </tr>
                                            </td>
                                            @endforeach
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot></tfoot>
                                    </table>
{{--                                {{$loc->stands($loc->id)->links()}}--}}
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
@endsection

@section('home')
    <script type="text/javascript" src="/js/home.js"></script>
@stop
