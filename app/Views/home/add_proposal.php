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
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Silahkan Lengkapi Data Berikut </h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <form action="/home/send" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputProjectLeader">Penanggung Jawab</label>
                        <input type="text" name="name" class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?>" placeholder="Nama Lengkap" value="<?= old('name'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('name'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Judul Project</label>
                        <input type="text" name="title" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : ''; ?>" placeholder="Judul Proposal" value="<?= old('title'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('title'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Deskripsi Project</label>
                        <textarea name="description" class="form-control <?= ($validation->hasError('description')) ? 'is-invalid' : ''; ?>" rows="4" placeholder="Berikan Penjelasan Singkat Tentang Proposal Yang Diajukan"><?= old('description'); ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('description'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputClientCompany">Alamat</label>
                        <input type="text" name="address" class="form-control <?= ($validation->hasError('address')) ? 'is-invalid' : ''; ?>" placeholder="Alamat" value="<?= old('address'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('address'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputProjectLeader">Kelompok Tani</label>
                        <input type="text" name="team" class="form-control <?= ($validation->hasError('team')) ? 'is-invalid' : ''; ?>" placeholder=" Nama Kelompok Tani" value="<?= old('team'); ?>">
                        <div class=" invalid-feedback">
                            <?= $validation->getError('team'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fileupload">Upload Proposal</label>
                        <!-- <iframe src=""></iframe> -->
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('fileupload')) ? 'is-invalid' : ''; ?>" id="fileupload" name="fileupload" onchange="Priview()">
                            <div class="invalid-feedback">
                                <?= $validation->getError('fileupload'); ?>
                            </div>
                            <label class="custom-file-label" for="fileupload">Pilih file</label>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <td class="project-actions text-center">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Kirim</button>
                    </td>
                </div>
                <!-- /.card-footer-->
            </form>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<?= $this->endSection(); ?>