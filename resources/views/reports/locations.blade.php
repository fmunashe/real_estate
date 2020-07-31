@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Reports</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/reports">Reports</a></li>
                        <li class="breadcrumb-item active">Location Report</li>
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
                            <h3 id="totalRevenue">${{ $revenue }}</h3>

                            <p>Total revenue received for {{$name}}</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-people"></i>
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
                            <h3 id="soldStands">{{$sold}}</h3>

                            <p>Sold Stands for {{$name}}</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
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
                            <h3 id="stands"> {{$total}}</h3>

                            <p>Total Stands for {{$name}}</p>
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
                            <h3 id="totalValue">$ {{$value}}</h3>

                            <p>Value of Stands Sold in {{$name}}</p>
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
{{--            <div class="row">--}}
{{--                <div class="col-md-12">--}}
{{--                    <!-- Revenue report -->--}}
{{--                    <div class="card card-danger">--}}
{{--                        <div class="card-header">--}}
{{--                            <h3 class="card-title">Revenue Recieved by Stand Size</h3>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="chart">--}}
{{--                                <canvas id="revenue"--}}
{{--                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- /.card-body -->--}}
{{--                    </div>--}}
{{--                    <!-- /.card -->--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="row">--}}
{{--                <div class="col-md-12">--}}
{{--                    <!-- Revenue report -->--}}
{{--                    <div class="card card-danger">--}}
{{--                        <div class="card-header">--}}
{{--                            <h3 class="card-title">Stands Activity</h3>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="chart">--}}
{{--                                <canvas id="standsChart"--}}
{{--                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- /.card-body -->--}}
{{--                    </div>--}}
{{--                    <!-- /.card -->--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="row">--}}
{{--                <div class="col-md-12">--}}
{{--                    <!-- Revenue report -->--}}
{{--                    <div class="card card-danger">--}}
{{--                        <div class="card-header">--}}
{{--                            <h3 class="card-title">Stands Count by Size</h3>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="chart">--}}
{{--                                <canvas id="standsCountChart"--}}
{{--                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- /.card-body -->--}}
{{--                    </div>--}}
{{--                    <!-- /.card -->--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
    <!-- /.content -->
</div>
@endsection

@section('location')
<script type="text/javascript" src="/js/locationReports.js"></script>
@stop
