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

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Projects</h3>

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
                                    <span class="badge badge-primary"><?= $p['status']; ?></span>
                                </td>
                                <td class="project-actions text-center">
                                    <a class="btn btn-primary btn-sm" href="/admin/<?= $p['slug']; ?>">
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