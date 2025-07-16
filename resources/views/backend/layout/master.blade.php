<!DOCTYPE html>
<html lang="en">

<head>
    <title>SurfsideMedia</title>
    <meta charset="utf-8">
    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend\assets\css/animate.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend\assets\css/animation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend\assets\css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend\assets\css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend\assets\css\style.css')}}">
    <link rel="stylesheet" href="{{asset('backend\assets\font/fonts.css')}}">
    <link rel="stylesheet" href="{{asset('backend\assets\icon/style.css')}}">
    <link rel="shortcut icon" href="{{asset('backend\assets\images/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('backend\assets\images/favicon.ico')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend\assets\css/sweetalert.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend\assets\css/custom.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css">
</head>

<body class="body">
    <div id="wrapper">
        <div id="page" class="">
            <div class="layout-wrap">

                <!-- <div id="preload" class="preload-container">
    <div class="preloading">
        <span></span>
    </div>
</div> -->
                @include('backend.layout.sidebar')
                <div class="section-content-right">

                    @include('backend.layout.navbar')
                    @yield('main')
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="{{asset('backend\assets\js/jquery.min.js')}}"></script>
    <script src="{{asset('backend\assets\js/bootstrap.min.js')}}"></script>
    <script src="{{asset('backend\assets\js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('backend\assets\js/sweetalert.min.js')}}"></script>
    <script src="{{asset('backend\assets\js/apexcharts/apexcharts.js')}}"></script>
    <script src="{{asset('backend\assets\js/main.js')}}"></script>
    <script>
        (function ($) {

            var tfLineChart = (function () {

                var chartBar = function () {

                    var options = {
                        series: [{
                            name: 'Total',
                            data: [0.00, 0.00, 0.00, 0.00, 0.00, 273.22, 208.12, 0.00, 0.00, 0.00, 0.00, 0.00]
                        }, {
                            name: 'Pending',
                            data: [0.00, 0.00, 0.00, 0.00, 0.00, 273.22, 208.12, 0.00, 0.00, 0.00, 0.00, 0.00]
                        },
                        {
                            name: 'Delivered',
                            data: [0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00]
                        }, {
                            name: 'Canceled',
                            data: [0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00]
                        }],
                        chart: {
                            type: 'bar',
                            height: 325,
                            toolbar: {
                                show: false,
                            },
                        },
                        plotOptions: {
                            bar: {
                                horizontal: false,
                                columnWidth: '10px',
                                endingShape: 'rounded'
                            },
                        },
                        dataLabels: {
                            enabled: false
                        },
                        legend: {
                            show: false,
                        },
                        colors: ['#2377FC', '#FFA500', '#078407', '#FF0000'],
                        stroke: {
                            show: false,
                        },
                        xaxis: {
                            labels: {
                                style: {
                                    colors: '#212529',
                                },
                            },
                            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                        },
                        yaxis: {
                            show: false,
                        },
                        fill: {
                            opacity: 1
                        },
                        tooltip: {
                            y: {
                                formatter: function (val) {
                                    return "$ " + val + ""
                                }
                            }
                        }
                    };

                    chart = new ApexCharts(
                        document.querySelector("#line-chart-8"),
                        options
                    );
                    if ($("#line-chart-8").length > 0) {
                        chart.render();
                    }
                };

                /* Function ============ */
                return {
                    init: function () { },

                    load: function () {
                        chartBar();
                    },
                    resize: function () { },
                };
            })();

            jQuery(document).ready(function () { });

            jQuery(window).on("load", function () {
                tfLineChart.load();
            });

            jQuery(window).on("resize", function () { });
        })(jQuery);
    </script>
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>
    @stack('script')

</body>

</html>