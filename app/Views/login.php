<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CodeBreak | Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/fontawesome/all.min.css') ?>">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/icheck-bootstrap.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/adminlte.min.css') ?>">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="<?php echo base_url('login/index'); ?>" class="h3"><b>Sistem Pengajuan Proposal Dinas Pertanian</b></a>
            </div>
            <div class="card-body">
                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('success'); ?>
                    </div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('wrong_pass')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session()->getFlashdata('wrong_pass'); ?>
                    </div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('user_or_pass')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session()->getFlashdata('user_or_pass'); ?>
                    </div>
                <?php endif; ?>
                <p class="login-box-msg">Silahkan login terlebih dahulu</p>
                <form action="<?php echo base_url('login/auth'); ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="input-group mb-3">
                        <input type="text" name="nik" class="form-control" placeholder="Masukkan NIK">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="far fa-id-card"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Masukkan Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="mt-2 mb-3">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                    <div class="mt-2 mb-3">
                        <a href="<?php echo base_url('register'); ?>" class="text-center btn btn-danger btn-block">Registrasi</a>
                    </div>
                    <!-- /.col -->
                </form>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>