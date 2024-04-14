{{--<x-app-layout>--}}
{{--    <x-slot name="header">--}}
{{--        <h2 class="font-semibold text-xl text-gray-800 leading-tight">--}}
{{--            {{ __('Dashboard') }}--}}
{{--        </h2>--}}
{{--    </x-slot>--}}

{{--    <div class="py-12">--}}
{{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
{{--            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">--}}
{{--                <div class="p-6 text-gray-900">--}}
{{--                    {{ __("You're logged in!") }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</x-app-layout>--}}

@extends('layouts.main')

@section('content')
<div class="main-content-inner">
    <div class="container">
        <div class="row">
            <!-- seo fact area start -->
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-6 mt-5 mb-3">
                        <div class="card">
                            <div class="seo-fact sbg1">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon"><i class="fa fa-group"></i> Nhân viên</div>
                                    <h2>{{$users->count()}}</h2>
                                </div>
{{--                                <canvas id="seolinechart1" height="50"></canvas>--}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-md-5 mb-3">
                        <div class="card">
                            <div class="seo-fact sbg2">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon"><i class="fa fa-archive"></i> Dự án</div>
                                    <h2>{{$projects->count()}}</h2>
                                </div>
{{--                                <canvas id="seolinechart2" height="50"></canvas>--}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3 mb-lg-0">
                        <div class="card">
                            <div class="seo-fact sbg3">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon"><i class="ti-pie-chart"></i> Vấn đề</div>
                                    <h2>{{$issues->count()}}</h2>
{{--                                    <canvas id="seolinechart3" height="60"></canvas>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="seo-fact sbg4">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon"><i class="fa fa-warning"></i> Rủi ro</div>
                                    <h2>{{$risks->count()}}</h2>
{{--                                    <canvas id="seolinechart4" height="60"></canvas>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- seo fact area end -->


            <!-- Advertising area start -->
            <div class="col-lg-4 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">BCTK Tiến độ dự án</h4>
                        <canvas id="seolinechart-custom-1" height="233"></canvas>
                    </div>
                </div>
            </div>
            <!-- Advertising area end -->

            <!-- Advertising area start -->
            <div class="col-lg-4 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">BCTK Tiến độ công việc</h4>
                        <canvas id="seolinechart-custom-2" height="233"></canvas>
                    </div>
                </div>
            </div>
            <!-- Advertising area end -->

            <!-- Advertising area start -->
            <div class="col-lg-4 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">BCTK Tiến độ vấn đề</h4>
                        <canvas id="seolinechart-custom-3" height="233"></canvas>
                    </div>
                </div>
            </div>
            <!-- Advertising area end -->
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    if ($('#seolinechart-custom-1').length) {
        var ctx = document.getElementById("seolinechart-custom-1").getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'doughnut',
            // The data for our dataset
            data: {
                labels: ["FB", "TW", "G+", "INS"],
                datasets: [{
                    backgroundColor: [
                        "#8919FE",
                        "#12C498",
                        "#F8CB3F",
                        "#E36D68"
                    ],
                    borderColor: '#fff',
                    data: [810, 410, 260, 150],
                }]
            },
            // Configuration options go here
            options: {
                legend: {
                    display: true
                },
                animation: {
                    easing: "easeInOutBack"
                }
            }
        });
    }
    if ($('#seolinechart-custom-2').length) {
        var ctx = document.getElementById("seolinechart-custom-2").getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'doughnut',
            // The data for our dataset
            data: {
                labels: ["FB", "TW", "G+", "INS"],
                datasets: [{
                    backgroundColor: [
                        "#8919FE",
                        "#12C498",
                        "#F8CB3F",
                        "#E36D68"
                    ],
                    borderColor: '#fff',
                    data: [810, 410, 260, 150],
                }]
            },
            // Configuration options go here
            options: {
                legend: {
                    display: true
                },
                animation: {
                    easing: "easeInOutBack"
                }
            }
        });
    }
    if ($('#seolinechart-custom-3').length) {
        var ctx = document.getElementById("seolinechart-custom-3").getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'doughnut',
            // The data for our dataset
            data: {
                labels: ["FB", "TW", "G+", "INS"],
                datasets: [{
                    backgroundColor: [
                        "#8919FE",
                        "#12C498",
                        "#F8CB3F",
                        "#E36D68"
                    ],
                    borderColor: '#fff',
                    data: [810, 410, 260, 150],
                }]
            },
            // Configuration options go here
            options: {
                legend: {
                    display: true
                },
                animation: {
                    easing: "easeInOutBack"
                }
            }
        });
    }
</script>
@endsection

