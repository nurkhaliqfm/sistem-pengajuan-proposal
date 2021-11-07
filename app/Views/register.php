<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CodeBreak | Registration</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/fontawesome/all.min.css') ?>">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/icheck-bootstrap.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/adminlte.min.css') ?>">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="<?php echo base_url('register/index'); ?>" class="h3"><b>Sistem Pengajuan Proposal Dinas Pertanian</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Silahkan Melakukan Registrasi</p>
                <form action="<?php echo base_url('register/process'); ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control <?= ($validation->hasError('fullname')) ? 'is-invalid' : ''; ?>" placeholder="Nama Lengkap" name="fullname" value="<?= old('fullname'); ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            <?= $validation->getError('fullname'); ?>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : ''; ?>" placeholder="NIK" name="nik" value="<?= old('nik'); ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="far fa-id-card"></span>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            <?= $validation->getError('nik'); ?>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control <?= ($validation->hasError('phone')) ? 'is-invalid' : ''; ?>" placeholder="Nomor Telepon" name="phone" value="<?= old('phone'); ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            <?= $validation->getError('phone'); ?>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" placeholder="Password" name="password" value="<?= old('password'); ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            <?= $validation->getError('password'); ?>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control <?= ($validation->hasError('repassword')) ? 'is-invalid' : ''; ?>" placeholder="Ulangi password" name="repassword" value="<?= old('repassword'); ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            <?= $validation->getError('repassword'); ?>
                        </div>
                    </div>
                    <?= session()->getFlashdata('pesan'); ?>
                    <!-- /.col -->
                    <div class="mt-2 mb-3">
                        <button type="submit" class="btn btn-danger btn-block">Registrasi</button>
                    </div>
                    <!-- /.col -->
                </form>

                <a href="<?php echo base_url('login'); ?>" class="text-center">Saya Telah Punya Akun</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>