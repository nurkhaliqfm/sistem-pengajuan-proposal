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
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('success'); ?>
                </div>
            <?php endif; ?>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- About Me Box -->
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Proposal</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputProjectLeader">Nama Pengusul</label>
                                <input disabled type="text" name="name" class="form-control" value="<?= $proposal['username']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Jenis Kegiatan Usulan</label>
                                <input disabled type="text" name="title" class="form-control" value="<?= $proposal['project']; ?>">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- Profile Image -->
                    <div class="card card-danger card-outline">
                        <!-- Main content -->
                        <section class="content">

                            <!-- Default box -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Respon Proposal</h3>
                                </div>
                                <form action="/admin/update/<?= $proposal['id']; ?>" method="post" enctype="multipart/form-data">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="slug" value="<?= $proposal['slug']; ?>">
                                    <input type="hidden" name="lastDocument" value="<?= $proposal['document']; ?>">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="inputStatus">Status</label>
                                            <select name="inputStatus" id="inputStatus" class="form-control custom-select <?= ($validation->hasError('inputStatus')) ? 'is-invalid' : ''; ?>">
                                                <option selected disabled>Pilih Status</option>
                                                <option>Tolak</option>
                                                <option>Terima</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('inputStatus'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputDescription">Catatan Proposal</label>
                                            <textarea name="note" class="form-control <?= ($validation->hasError('note')) ? 'is-invalid' : ''; ?>" rows="4" placeholder="Catatan Untuk Yang Memasukkan Proposal"><?= old('note'); ?></textarea>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('note'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <td class="project-actions text-center">
                                            <a class="btn btn-primary" href="/admin/proposal_masuk">
                                                <i class="fas fa-times-circle"></i>
                                                Batal
                                            </a>

                                            <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Kirim</button>
                                        </td>
                                    </div>
                                    <!-- /.card-footer-->
                                </form>
                        </section>
                        <!-- /.content -->
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