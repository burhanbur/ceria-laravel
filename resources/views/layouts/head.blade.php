    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Pengabdian Masyarakat Universitas Pertamina">
    <meta name="author" content="Burhan Mafazi">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/icon.png') }}">
    <title>CPanel - CERIA</title>
    <!-- Custom CSS -->
    <link href="{{ asset('admin/assets/extra-libs/c3/c3.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/libs/chartist/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="{{ asset('admin/dist/css/style.min.css') }}" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('admin/assets/libs/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/libs/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/libs/bootstrap-datepicker/datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/libs/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/libs/bootstrap-switch/css/bootstrap3/bootstrap-switch.min.css') }}">
    
    <link rel="stylesheet" href="{{ asset('admin/assets/libs/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <style>
        .required {
            color: red;
        }

        .center {
            text-align: center;
        }

        .img-circle {
            border-radius: 50%;
        }

        .profile-user-img {
            margin: 0 auto;
            padding: 3px;
            width: 150px;
        }

        .img-fluid {
            max-width: 100%;
            height: auto;
        }

        .card-primary {
            border-top: 3px solid #007bff;
        }

        img {
            vertical-align: middle;
        }
    </style>

    @yield('css')