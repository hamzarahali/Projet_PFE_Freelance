

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from xpanthersolutions.com/html/booster/html/vertical/form-validations.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 May 2020 04:27:13 GMT -->
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Booster is a Responsive Bootstrap & Laravel Admin Dashboard Template">
    <meta name="keywords" content="admin, admin template, admin panel, dashboard template, laravel, ui kits, web app, crm, cms, responsive, bootstrap 4, html, sass support, scss">
    <meta name="author" content="Themesbox">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    <title></title>

    <!-- Fevicon -->
    <link rel="shortcut icon" href="{{ url('assets/assets_backend/images/logoo.png') }}">

    <!-- Start CSS -->
    <link href="{{ url('assets/assets_backend/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('assets/assets_backend/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('assets/assets_backend/css/style.css') }}" rel="stylesheet" type="text/css">
     <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- End CSS -->

</head>

<body class="xp-vertical">

    @include('navbaradmin')
    @yield('body')
           
    <!-- Start JS -->        
    <script src="{{ url('assets/assets_backend/js/jquery.min.js') }}"></script>
    <script src="{{ url('assets/assets_backend/js/popper.min.js') }}"></script>
    <script src="{{ url('assets/assets_backend/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('assets/assets_backend/js/modernizr.min.js') }}"></script>
    <script src="{{ url('assets/assets_backend/js/detect.js') }}"></script>
    <script src="{{ url('assets/assets_backend/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ url('assets/assets_backend/js/sidebar-menu.js') }}"></script>

    <!-- Parsley JS -->
    <script src="{{ url('assets/assets_backend/plugins/validatejs/validate.min.js') }}"></script>

    <!-- Validate JS -->
    <script src="{{ url('assets/assets_backend/js/init/validate-init.js"></script>
    <script src="assets/js/init/form-validation-init.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ url('assets/assets_backend/js/main.js') }}"></script>
    <!-- End JS -->

</body>

<!-- Mirrored from xpanthersolutions.com/html/booster/html/vertical/form-validations.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 May 2020 04:27:17 GMT -->
</html>