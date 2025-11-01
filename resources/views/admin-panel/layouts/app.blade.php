<!-- resources/views/layouts/admin.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    
    <!-- Bootstrap -->
    <link href="{{ asset('admin-panel/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{ asset('admin-panel/css/custom.min.css') }}" rel="stylesheet">
</head>
<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <!-- Sidebar -->
            @include('admin-panel.layouts.sidebar')

            <!-- Top Navigation -->
            @include('admin-panel.layouts.header')

            <!-- Page Content -->
            <div class="right_col" role="main">
                @yield('content') <!-- This will be replaced with actual content from different pages -->
            </div>

            <!-- Footer -->
            @include('admin-panel.layouts.footer')
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('admin-panel/js/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('admin-panel/js/bootstrap.min.js') }}"></script>
    <!-- Custom Theme Scripts -->
    <script src="{{ asset('admin-panel/js/custom.min.js') }}"></script>
</body>
</html>
