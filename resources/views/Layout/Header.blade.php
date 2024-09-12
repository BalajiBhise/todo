<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="TO Do">
    <meta name="author" content="Balaji Bhise">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <meta name="Technolgy" content="PHP(Laravel Framework 8.5.4)">
    <title>@yield('title')</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('/public')}}/Login/assets/images/todo.svg">

    <!-- chartist CSS -->
    <link href="{{url('/public')}}/assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="{{url('/public')}}/Login/assets/libs/toastr/toastr.min.css" rel="stylesheet">

    <!-- SweetAlert -->
    <link href="{{url('/public')}}/assets/node_modules/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{url('/public')}}/assets/dist/css/style.min.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="{{url('/public')}}/assets/dist/css/pages/dashboard1.css" rel="stylesheet">
    <!-- Data table -->
    <link rel="stylesheet" type="text/css" href="{{url('/public')}}/assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="{{url('/public')}}/assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css">

    <!-- select 2 -->
    <link rel="stylesheet" type="text/css" href="{{url('/public')}}/Login/assets/libs/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{url('/public')}}/assets/dist/css/custom.css">
    <link rel="stylesheet" href="{{url('/public')}}/assets/dist/css/loader.css">



    <!-- Toaster -->
    <link href="{{url('public/Login')}}/assets/libs/toastr/toastr.min.css" id="app-style" rel="stylesheet" type="text/css" />

    <!-- ============================================================== -->
    <script src="{{url('/public')}}/assets/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="{{url('public/Login')}}/assets/libs/toastr/toastr.min.js"></script>


    <link rel="stylesheet" href="{{url('/public')}}/assets/dist/css/all.min.css" />
    <link rel="stylesheet" href="{{url('/public')}}/css/bootstrap-datepicker.min.css" />
 

    <style>
        @media (min-width: 767px) {
            .horizontal-nav .sidebar-nav #sidebarnav>li:last-child>ul {
                right: 0;
                left: 0px;
            }

            .horizontal-nav .sidebar-nav #sidebarnav>li>ul {
                width: 164px;
            }
        }
    </style>
    @yield("css")
</head>

<body class="horizontal-nav skin-megna fixed-layout"> 
    <div id="loader" class="loader_hidden">
        <img id="loading-image" src="{{ asset('public/assets/images/loading.gif') }}" />
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        @include("Layout.Topbar")