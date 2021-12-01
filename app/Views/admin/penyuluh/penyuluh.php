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
            </div><!-- /.container-fluid -->
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('success'); ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('deleted')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= session()->getFlashdata('deleted'); ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('edited')) : ?>
                <div class="alert alert-warning" role="alert">
                    <?= session()->getFlashdata('edited'); ?>
                </div>
            <?php endif; ?>
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header ">
                    <div class="row">
                        <div class="col">
                            <h3 class="card-title">Daftar Penyuluh</h3>
                        </div>
                        <td class="project-actions text-center">
                            <a class="btn btn-warning btn-sm" href="<?= base_url('admin/penyuluh/create'); ?>">
                                <i class="fas fa-plus"></i>
                                Tambah Penyuluh
                            </a>
                        </td>
                    </div>
                    <form action="" method="get">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group" style="margin-top: 4%;">
                                    <select name="inputStatus" id="inputStatus" class="form-control custom-select">
                                        <option selected disabled>Pilih Wilayah</option>
                                        <option <?= $selected == 'Wotu' ? 'selected' : ''; ?>>Wotu</option>
                                        <option <?= $selected == 'Tomoni' ? 'selected' : ''; ?>>Tomoni</option>
                                        <option <?= $selected == 'Tomoni Timur' ? 'selected' : ''; ?>>Tomoni Timur</option>
                                        <option <?= $selected == 'Mangkutana' ? 'selected' : ''; ?>>Mangkutana</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3" style="margin-top: 4%;">
                                    <input type="text" name="keyword" class="form-control" placeholder="Cari Penyuluh" value="<?= ($keyword) ? $keyword : ''; ?>">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary btn-block">Cari</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 1%">
                                    No
                                </th>
                                <th style="width: 10%" class="text-center">
                                    NIK
                                </th>
                                <th style="width: 20%" class="text-center">
                                    Nama
                                </th>
                                <th style="width: 20%" class="text-center">
                                    Kelompok Tani
                                </th>
                                <th style="width: 15%" class="text-center">
                                    Lokasi
                                </th>
                                <th style="width: 10%" class="text-center">
                                    Jenis Tanaman
                                </th>
                                <th style="width: 10%" class="text-center">
                                    Luas Lahan (ha)
                                </th>
                                <th style="width: 20%" class="text-center">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 + (10 * ($current_page - 1)); ?>
                            <?php foreach ($member as $p) : ?>
                                <tr>
                                    <td>
                                        <?= $i++; ?>
                                    </td>
                                    <td class="text-center">
                                        <a>
                                            <?= $p['nik']; ?>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a>
                                            <?= strtoupper($p['name']); ?>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a>
                                            <?= strtoupper($p['team']); ?>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a>
                                            <?= strtoupper($p['village']); ?>-<?= strtoupper($p['district']); ?>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a>
                                            <?= strtoupper($p['type']); ?>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a>
                                            <?= $p['size']; ?>
                                        </a>
                                    </td>
                                    <td class="project-actions text-center">
                                        <a class="btn btn-primary btn-sm" href="#">
                                            <i class="fas fa-folder">
                                            </i>
                                            Detail
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?= $pager->links('member', 'member_pagination'); ?>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <?= $this->endSection(); ?>