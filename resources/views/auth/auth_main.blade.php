<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') - Perpustakaan</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="{{ asset('style/vendors/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('style/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('style/vendors/themify-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('style/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{ asset('style/vendors/selectFX/css/cs-skin-elastic.css')}}">

    <link rel="stylesheet" href="{{ asset('style/assets/css/style.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body class="bg-dark">

    @yield('content')

    <script src="{{ asset('style/vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{ asset('style/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{ asset('style/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('style/assets/js/main.js')}}"></script>


</body>

</html>