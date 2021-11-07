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
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Proposal</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <form action="/home/update/<?= $proposal['id']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $proposal['slug']; ?>">
                <input type="hidden" name="lastDocument" value="<?= $proposal['document']; ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputProjectLeader">Penanggung Jawab</label>
                        <input type="text" name="name" class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?>" placeholder="Nama Lengkap" value="<?= (old('name')) ? old('name') : $proposal['username']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('name'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Judul Project</label>
                        <input type="text" name="title" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : ''; ?>" placeholder="Judul Proposal" value="<?= (old('title')) ? old('title') : $proposal['project']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('title'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Deskripsi Project</label>
                        <textarea name="description" class="form-control <?= ($validation->hasError('description')) ? 'is-invalid' : ''; ?>" rows="4" placeholder="Berikan Penjelasan Singkat Tentang Proposal Yang Diajukan"><?= (old('description')) ? old('description') : $proposal['description']; ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('description'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputClientCompany">Alamat</label>
                        <input type="text" name="address" class="form-control <?= ($validation->hasError('address')) ? 'is-invalid' : ''; ?>" placeholder="Alamat" value="<?= (old('address')) ? old('address') : $proposal['address']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('address'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputProjectLeader">Kelompok Tani</label>
                        <input type="text" name="team" class="form-control <?= ($validation->hasError('team')) ? 'is-invalid' : ''; ?>" placeholder=" Nama Kelompok Tani" value="<?= (old('team')) ? old('team') : $proposal['team']; ?>">
                        <div class=" invalid-feedback">
                            <?= $validation->getError('team'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fileupload">Upload Proposal</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('fileupload')) ? 'is-invalid' : ''; ?>" id="fileupload" name="fileupload" onchange="Priview()">
                            <div class="invalid-feedback">
                                <?= $validation->getError('fileupload'); ?>
                            </div>
                            <label class="custom-file-label" for="fileupload"><?= $proposal['document']; ?></label>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <td class="project-actions text-center">
                        <a class="btn btn-primary" href="/home/proposal">
                            <i class="fas fa-times-circle"></i>
                            Batal
                        </a>

                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                    </td>
                </div>
                <!-- /.card-footer-->
            </form>
    </section>
    <!-- /.content -->
</div>
<?= $this->endSection(); ?>