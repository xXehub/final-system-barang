<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Mini Project | 1204220052</title>
    <!-- Custom CSS -->
        @vite('resources/sass/app.scss')
    @vite('resources/dist/css/style.min.css')
    {{-- <link href="../dist/css/style.min.css" rel="stylesheet"> --}}
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        {{-- TOP BAR --}}
        @include('layouts.navbar')
        {{-- side bar --}}
        @include('layouts.sidebar')
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        {{-- <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">{{$ingfo_sakkarepmu}}</h4> --}}
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.html" class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">{{ $ingfo_sakkarepmu }}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            {{-- container fluid --}}
            <div class="container-fluid">
                @yield('content')
            </div>
            <footer class="footer text-center text-muted">
                All Rights Reserved by Sihub. Designed and Developed by <a href="https://localhost.com/">Hubsense</a>.
            </footer>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->

    @vite('resources/assets/libs/jquery/dist/jquery.min.js')
    @vite('resources/assets/libs/popper.js/dist/umd/popper.min.js')
    @vite('resources/dist/js/app-style-switcher.js')
    @vite('resources/dist/js/feather.min.js')
    @vite('resources/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')
    @vite('resources/assets/extra-libs/sparkline/sparkline.js')
    @vite('resources/dist/js/sidebarmenu.js')
    @vite('resources/dist/js/custom.min.js')
</body>

</html>
