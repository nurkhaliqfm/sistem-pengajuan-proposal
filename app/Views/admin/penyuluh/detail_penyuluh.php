<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $header; ?></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url('assets/img/LogoCodeBreak.png') ?>" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center"><?= $penyuluh['full_name']; ?></h3>

                            <p class="text-muted text-center"><?= $penyuluh['status_user']; ?></p>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Data Diri</h3>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <strong><i class="fas fa-users"></i> Kelompok Tani</strong>

                                    <p class="text-muted"><?= $penyuluh['team']; ?></p>

                                    <hr>

                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>

                                    <p class="text-muted"><?= $penyuluh['address']; ?></p>

                                    <hr>

                                    <strong>
                                        <i class="fas fa-mobile-alt"></i></i> Kontak
                                    </strong>

                                    <p class="text-muted"><?= $penyuluh['phone']; ?></p>

                                </div>
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</div>
<?= $this->endSection(); ?>