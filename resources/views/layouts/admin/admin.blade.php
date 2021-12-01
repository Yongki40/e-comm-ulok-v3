<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Webite Ulok</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/adminlte.css') }}">
    <script src="{{ asset('js/admin/adminlte.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper" style="height: 100vh">
        <!-- Main Sidebar Container -->
        @include('layouts.admin.sidebar')

        {{-- isi dari adminnya --}}
        <div class="content-wrapper">
            <div class="container">
                <h1>Admin @yield('jenis_admin')</h1>
                @yield('content')
            </div>
        </div>

    </div>

</body>

</html>
