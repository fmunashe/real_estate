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
                        <li class="breadcrumb-item active">Reports</li>
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
                            <h3>${{ $amount_paid }}</h3>

                            <p>Total Revenue Received</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-money"></i>
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
                            <h3>${{ $value_amount }}</h3>

                            <p>Total Value of Stands Sold</p>
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
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="user_type">Location</label>
                                        <select
                                            class="form-control {{ $errors->has('location_id') ? ' is-invalid' : '' }}"
                                            name="location_id" id="location_id" onchange="onSelectLocation()">
                                            <option value="">Select location</option>
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
                                    <a href="" id="locationReport" class="btn btn-info">View Report</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
{{--            <div class="row">--}}
{{--                <div class="col-md-12">--}}
{{--                    <!-- STACKED BAR CHART -->--}}
{{--                    <div class="card card-danger">--}}
{{--                        <div class="card-header">--}}
{{--                            <h3 class="card-title">Revenue Recieved per Location</h3>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="chart">--}}
{{--                                <canvas id="locations"--}}
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
{{--                    <!-- STACKED BAR CHART -->--}}
{{--                    <div class="card card-danger">--}}
{{--                        <div class="card-header">--}}
{{--                            <h3 class="card-title">Revenue Recieved per Location</h3>--}}
{{--                            <div class="card-tools">--}}
{{--                                <button type="button" class="btn btn-danger daterange" data-toggle="tooltip"--}}
{{--                                    title="Date range">--}}
{{--                                    <i class="far fa-calendar-alt"></i>--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                            <!-- /.card-tools -->--}}
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
        </div>
    </div>
    <!-- /.content -->
</div>
@endsection

@section('reports')
<script type="text/javascript" src="/js/reports.js"></script>
@stop
