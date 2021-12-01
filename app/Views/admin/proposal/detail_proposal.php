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

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detail Proposal</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="inputProjectLeader">Nama Pengusul</label>
                    <input disabled type="text" name="name" class="form-control" value="<?= $proposal['username']; ?>">
                </div>
                <div class="form-group">
                    <label for="inputName">Jenis Kegiatan Usulan</label>
                    <input disabled type="text" name="title" class="form-control" value="<?= $proposal['project']; ?>">
                </div>
                <div class="form-group">
                    <label for="inputDescription">Deskripsi Usulan</label>
                    <textarea disabled name="description" class="form-control" rows="4"><?= $proposal['description']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="inputClientCompany">Alamat</label>
                    <input disabled type="text" name="address" class="form-control" value="<?= $proposal['address']; ?>">
                </div>
                <div class="form-group">
                    <label for="inputProjectLeader">Kelompok Tani</label>
                    <input disabled type="text" name="team" class="form-control" value="<?= $proposal['team']; ?>">
                </div>
                <div class="form-group">
                    <label for="inputProjectLeader">Tanggal Upload</label>
                    <input disabled type="text" name="date" class="form-control" value="<?= $proposal['send_time']; ?>">
                </div>
                <div class="form-group">
                    <label for="inputProjectLeader">Status</label>
                    <input disabled type="text" name="status" class="form-control" value="<?= $proposal['status']; ?>">
                </div>
                <div class="form-group">
                    <label for="inputProjectLeader">Proposal Terupload</label>
                    <input disabled type="text" name="fileupload" class="form-control" value="<?= $proposal['document']; ?>">
                    <a style="margin-top: 10px;" class="btn btn-primary" href="/upload/document/<?= $proposal['document']; ?>" target="_blank">
                        <i class="far fa-file-pdf"></i>
                        Preview
                    </a>
                </div>
                <!-- <div class="card card-danger card-outline">
                    <a class="d-block w-100">
                        <div class="card-header">
                            <h4 class="card-title w-100" style="color: red;">
                                Catatan
                            </h4>
                        </div>
                    </a>
                    <div>
                        <div class="card-body">
                            <?php
                            if ($proposal['status'] == 'Disetujui') {
                                echo 'Terimakasih Proposal Anda Kami Terima. Silahkan Ke kantor Untuk Membahas Lebih Lanjut.';
                            } elseif ($proposal['status'] == 'Ditolak') {
                                echo 'Mohon Maaf Pengajuan Proposal Anda Belum Dapat Kami Terima Dengan Alasan Tertentu.';
                            } else {
                                echo 'Proposal Anda Masih Dalam Tahap Pemeriksaan.';
                            }; ?>
                        </div>
                    </div>
                </div> -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <td class="project-actions text-center">
                    <a class="btn btn-primary" href="/admin/respon/<?= $proposal['slug']; ?>">
                        <i class="fas fa-reply"></i>
                        Respon
                    </a>

                    <form action="/home/delete/<?= $proposal['id']; ?>" method="post" class="d-inline">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button disabled class="btn btn-danger" type="submit" onclick="return confirm('Apakah Anda Yakin?')"><i class="fas fa-trash-alt"></i> Delete</button>
                    </form>
                </td>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<?= $this->endSection(); ?>