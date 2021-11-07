<?= $this->extend('home/layout/template'); ?>

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
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <td class="project-actions text-center">
                    <a class="btn btn-warning btn-sm" href="<?= base_url('home/create'); ?>">
                        <i class="fas fa-plus"></i>
                        Usulkan Proposal
                    </a>
                </td>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
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
                                Nama Project
                            </th>
                            <th style="width: 20%">
                                Team Pengusul
                            </th>
                            <th style="width: 8%" class="text-center">
                                Status
                            </th>
                            <th style="width: 20%" class="text-center">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($proposal as $p) : ?>
                            <tr>
                                <td>
                                    <?= $i++; ?>
                                </td>
                                <td>
                                    <a>
                                        <?= $p['project']; ?>
                                    </a>
                                    <br />
                                    <small>
                                        <?= $p['send_time']; ?>
                                    </small>
                                </td>
                                <td>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <?= $p['username']; ?>
                                        </li>
                                    </ul>
                                </td>
                                <td class="project-state">
                                    <span class="badge <?= $p['status'] == 'Menunggu' ? 'badge-primary' : ($p['status'] == 'Disetujui' ? 'badge-success' : 'badge-danger'); ?> "><?= $p['status']; ?></span>
                                </td>
                                <td class="project-actions text-center">
                                    <a class="btn btn-primary btn-sm" href="/home/<?= $p['slug']; ?>">
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
<?= $this->endSection(); ?>