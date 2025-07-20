<!DOCTYPE html>
<html lang="en">

<head>
    <title>SurfsideMedia</title>
    <meta charset="utf-8">
    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- CSS ملفات -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/animation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/font/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/icon/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/sweetalert.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/custom.css') }}">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- DataTables CSS مع Bootstrap 5 -->
    <link href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css" rel="stylesheet" />

    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('backend/assets/images/favicon.ico') }}">
</head>

<body class="body">
    <div id="wrapper">
        <div id="page" class="">
            <div class="layout-wrap">

                @include('backend.layout.sidebar')
                <div class="section-content-right">

                    @include('backend.layout.navbar')
                    @yield('main')
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery أولاً -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('backend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/bootstrap-select.min.js') }}"></script>

    <!-- مكتبات أخرى -->
    <script src="{{ asset('backend/assets/js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ asset('backend/assets/js/main.js') }}"></script>

    <!-- DataTables JS مع Bootstrap 5 -->
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>

    <!-- DataTables Buttons -->
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>

    <!-- أزرار التصدير والطباعة -->
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

    <!-- مكتبات توليد الملفات للتصدير -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('script')
</body>

</html>