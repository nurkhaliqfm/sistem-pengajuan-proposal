<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>
<?php $uri = current_url(true)->getSegment(4); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $header; ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6 text-right">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <a class="<?= $uri == 'p' || $uri == '' ? 'btn btn-primary active' : 'btn btn-default'; ?>" href="<?= base_url('admin/kelola_pengguna/p'); ?>">
                            Penyuluh
                        </a>
                        <a class="<?= $uri == 'a' ? 'btn btn-primary active' : 'btn btn-default'; ?>" href="<?= base_url('admin/kelola_pengguna/a'); ?>">
                            Admin
                        </a>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header ">
                    <div class="row">
                        <div class="col">
                            <h3 class="card-title">Daftar User</h3>
                        </div>
                        <td class="project-actions text-center">
                            <a class="btn btn-warning btn-sm" href="#" data-toggle="modal" data-target="#addModal">
                                <i class="fas fa-plus"></i>
                                Tambah User
                            </a>
                        </td>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 1%">
                                    No
                                </th>
                                <th style="width: 30%">
                                    Nama
                                </th>
                                <?php if ($uri == 'p' || $uri == '') : ?>
                                    <th style="width: 20%" class="text-center">
                                        Kelompok Tani
                                    </th>
                                <?php endif; ?>
                                <th style="width: 8%" class="text-center">
                                    Level User
                                </th>
                                <th style="width: 20%" class="text-center">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($data_user as $p) : ?>
                                <tr>
                                    <td>
                                        <?= $i++; ?>
                                    </td>
                                    <td>
                                        <a>
                                            <?= $p['full_name']; ?>
                                        </a>
                                    </td>
                                    <?php if ($uri == 'p' || $uri == '') : ?>
                                        <td class="text-center">
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <?= $p['team']; ?>
                                                </li>
                                            </ul>
                                        </td>
                                    <?php endif; ?>
                                    <td class="project-state text-center">
                                        <span class="badge badge-success"><?= $p['status_user']; ?></span>
                                    </td>
                                    <td class="project-actions text-center">
                                        <a class="btn btn-primary btn-sm" href="/admin/kelola_pengguna/<?= $p['slug']; ?>">
                                            <i class="fas fa-folder">
                                            </i>
                                            Detail
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
</div>
<!-- Add Modal-->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Menambah User</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">Mohon Maaf Fitur Ini Belum Tersedia</div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>