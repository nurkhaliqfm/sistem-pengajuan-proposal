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
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Silahkan Lengkapi Data Berikut </h3>
            </div>
            <form action="/admin/send" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputProjectLeader">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?>" placeholder="Nama Lengkap" value="<?= old('name'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('name'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName">NIK</label>
                        <input type="text" name="nik" class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : ''; ?>" placeholder="NIK" value="<?= old('nik'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nik'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputTeam">Kelompok Tani</label>
                        <input type="text" name="team" class="form-control <?= ($validation->hasError('team')) ? 'is-invalid' : ''; ?>" placeholder="Kelompok Tani" value="<?= old('team'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('team'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputClientCompany">Kecamatan</label>
                        <input type="text" name="district" class="form-control <?= ($validation->hasError('district')) ? 'is-invalid' : ''; ?>" placeholder="Kecamatan" value="<?= old('district'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('district'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputProjectLeader">Desa</label>
                        <input type="text" name="village" class="form-control <?= ($validation->hasError('village')) ? 'is-invalid' : ''; ?>" placeholder="Desa" value="<?= old('village'); ?>">
                        <div class=" invalid-feedback">
                            <?= $validation->getError('village'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputType">Jenis Tanaman</label>
                        <input type="text" name="type" class="form-control <?= ($validation->hasError('type')) ? 'is-invalid' : ''; ?>" placeholder="Jenis Tanaman" value="<?= old('type'); ?>">
                        <div class=" invalid-feedback">
                            <?= $validation->getError('type'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputSize">Luas Lahan (ha)</label>
                        <input type="text" name="size" class="form-control <?= ($validation->hasError('size')) ? 'is-invalid' : ''; ?>" placeholder="Contoh: 1.5, 2.0 (Gunakan tanda 'titik')" value="<?= old('size'); ?>">
                        <div class=" invalid-feedback">
                            <?= $validation->getError('size'); ?>
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