<!DOCTYPE html>
<html lang="en" class="no-js">  
    <head>
        <title>Aplikasi Pegawai - Login</title>
        
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta content="CMS Admin - Login" name="description" />
        <meta content="CMS Admin - Login" name="author" />

        <link rel="shortcut icon" href="{{ asset('admins/images/sitk-small.png') }}" />
        <link rel="stylesheet" href="{{ asset('admins/plugins/bootstrap/css/bootstrap.min.css') }}"  media="screen">
        <link rel="stylesheet" href="{{ asset('admins/css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('admins/css/main-responsive.css') }}">
        <link rel="stylesheet" href="{{ asset('admins/css/theme_dark.css') }}" id="skin_color">
        <link rel="stylesheet" href="{{ asset('admins/plugins/iCheck/skins/all.css') }}">
        <link rel="stylesheet" href="{{ asset('admins/fonts/style.css') }}">
        <link rel="stylesheet" href="{{ asset('admins/plugins/font-awesome/css/font-awesome.min.css') }}">
        
    </head>
    <body class="login">

        @yield('main')

        <script src="{{ asset('admins/js/jquery.min.js') }}"></script>
        <script src="{{ asset('admins/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('admins/js/main.js') }}"></script>
        <script src="{{ asset('admins/js/login.js') }}"></script>
        <script>
            jQuery(document).ready(function() {
                Main.init();
                Login.init();
            });
        </script>       
    </body>
</html>




