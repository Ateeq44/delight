<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />

    <!-- Fonts -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/css/dataTables.bootstrap4.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css'>

    <!-- Styles -->
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet" />
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
        @include('layouts.inc.adminsidebar')
        <div class="content-wrapper">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-- Scripts -->
        <script src="{{ asset('admin/js/script.js') }}" defer></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.5/umd/popper.js'></script>
        <script src='https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/js/dataTables.bootstrap4.js'></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

        

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        @if (session('status'))
        <script>
            swal("{{session('status')}}");
        </script>
        @endif
        @yield('script')
    </body>
    </html>
