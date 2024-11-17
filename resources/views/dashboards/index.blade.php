@extends('layouts.admin')

@section('title', 'Dashboard')

@section('breadcrumbs', 'Dashboard')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">

    <style>
        .traffic-chart {
            min-height: 335px;
        }
        .charts-container {
        display: grid;
        gap: 20px;
        margin-top: 20px;
    }

        .ct-chart {
            height: 300px;
        }

        .card-title {
            text-align: center;
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .card {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
@endsection

@section('content')
        <!-- Widgets  -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('pesan_kontak.index') }}">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-1">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count">{{ $dashboardData['kontak'] }}</span></div>
                                        <div class="stat-heading">Pesan Kontak</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('pesan_tabungan.index') }}">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-2">
                                    <i class="fa fa-thumbs-up"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count">{{ $dashboardData['tabungan'] }}</span></div>
                                        <div class="stat-heading">Pesan Tabungan</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('pesan_deposito.index') }}">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-3">
                                    <i class="fa fa-bank"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count">{{ $dashboardData['deposito'] }}</span></div>
                                        <div class="stat-heading">Pesan Deposito</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('pesan_kredit.index') }}">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-4">
                                    <i class="fa fa-money"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count">{{ $dashboardData['kredit'] }}</span></div>
                                        <div class="stat-heading">Pesan Kredit</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="charts-container">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Pesan Kontak</h4>
                    <div id="chart-kontak" class="ct-chart"></div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Pesan Tabungan</h4>
                    <div id="chart-tabungan" class="ct-chart"></div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Pesan Deposito</h4>
                    <div id="chart-deposito" class="ct-chart"></div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Pesan Kredit</h4>
                    <div id="chart-kredit" class="ct-chart"></div>
                </div>
            </div>
        </div>
        
@endsection


@section('script')

    <!-- Chartist Chart -->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>

    <script>
        jQuery(document).ready(function($) {
            "use strict";
    
            // Function to generate charts dynamically
            function generateChart(elementId, chartData) {
                if ($(elementId).length) {
                    var labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                    var series = new Array(12).fill(0); // Initialize with 0
    
                    // Fill series data based on `chartData`
                    for (const [month, count] of Object.entries(chartData)) {
                        series[month - 1] = count; // `month - 1` to map correctly to 0-indexed array
                    }
    
                    new Chartist.Line(elementId, {
                        labels: labels,
                        series: [series]
                    }, {
                        low: 0,
                        showArea: true,
                        fullWidth: true,
                        axisX: {
                            showGrid: true
                        }
                    });
                }
            }
    
            // Generate charts for each category
            generateChart('#chart-kontak', @json($data['charts']['kontak']));
            generateChart('#chart-tabungan', @json($data['charts']['tabungan']));
            generateChart('#chart-deposito', @json($data['charts']['deposito']));
            generateChart('#chart-kredit', @json($data['charts']['kredit']));
        });
    </script>
    
@endsection
