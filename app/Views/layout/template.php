<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Puskesmas</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/fontawesome/all.min.css') ?>">

    <!-- Ionicons -->
    <!-- <link rel="stylesheet" href="<?php echo base_url('assets/css/ionicons.min.css') ?>"> -->
    <!-- Tempusdominus Bootstrap 4
    <link rel="stylesheet" href="<?php echo base_url('assets/css/tempusdominus-bootstrap-4.min.css') ?>"> -->
    <!-- iCheck
    <link rel="stylesheet" href="<?php echo base_url('assets/css/icheck-bootstrap.min.css') ?>"> -->
    <!-- JQVMap -->
    <!-- <link rel="stylesheet" href="<?php echo base_url('assets/css/jqvmap.min.css') ?>"> -->

    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/adminlte.min.css') ?>">

    <!-- overlayScrollbars -->
    <!-- <link rel="stylesheet" href="<?php echo base_url('assets/css/OverlayScrollbars.min.css') ?>"> -->
    <!-- Daterange picker -->
    <!-- <link rel="stylesheet" href="<?php echo base_url('assets/css/daterangepicker.css') ?>"> -->
    <!-- summernote -->
    <!-- <link rel="stylesheet" href="<?php echo base_url('assets/css/summernote-bs4.min.css') ?>"> -->
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?php echo base_url('assets/img/AdminLTELogo.png') ?>" alt="Logo" height="60" width="60">
        </div>

        <?= $this->include('layout/navbar'); ?>
        <?= $this->renderSection('content'); ?>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>

    <!-- jQuery UI 1.11.4 -->
    <!-- <script src="<?php echo base_url('assets/js/jquery-ui.min.js') ?>"></script> -->
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script> -->

    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- ChartJS -->
    <!-- <script src="<?php echo base_url('assets/js/Chart.min.js') ?>"></script> -->
    <!-- Sparkline -->
    <!-- <script src="<?php echo base_url('assets/js/sparkline.js') ?>"></script> -->
    <!-- JQVMap -->
    <!-- <script src="<?php echo base_url('assets/js/jquery.vmap.min.js') ?>"></script> -->
    <!-- <script src="<?php echo base_url('assets/js/jquery.vmap.usa.js') ?>"></script> -->
    <!-- jQuery Knob Chart -->
    <!-- <script src="<?php echo base_url('assets/js/jquery.knob.min.js') ?>"></script> -->
    <!-- daterangepicker -->
    <!-- <script src="<?php echo base_url('assets/js/moment.min.js') ?>"></script> -->
    <!-- <script src="<?php echo base_url('assets/js/daterangepicker.js') ?>"></script> -->
    <!-- Tempusdominus Bootstrap 4 -->
    <!-- <script src="<?php echo base_url('assets/js/tempusdominus-bootstrap-4.min.js') ?>"></script> -->
    <!-- Summernote -->
    <!-- <script src="<?php echo base_url('assets/js/summernote-bs4.min.js') ?>"></script> -->
    <!-- overlayScrollbars -->
    <!-- <script src="<?php echo base_url('assets/js/jquery.overlayScrollbars.min.js') ?>"></script> -->

    <!-- AdminLTE App -->
    <script src="<?php echo base_url('assets/js/adminlte.js') ?>"></script>
</body>

</html>