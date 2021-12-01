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
                <div class="card card-danger card-outline">
                    <a class="d-block w-100">
                        <div class="card-header">
                            <h4 class="card-title w-100" style="color: red;">
                                Catatan
                            </h4>
                        </div>
                    </a>
                    <div>
                        <div class="card-body">
                            <?= $proposal['note']; ?>
                            <!-- <?php
                                    if ($proposal['status'] == 'Disetujui') {
                                        echo 'Terimakasih Proposal Anda Kami Terima. Silahkan Ke kantor Untuk Membahas Lebih Lanjut.';
                                    } elseif ($proposal['status'] == 'Ditolak') {
                                        echo 'Mohon Maaf Pengajuan Proposal Anda Belum Dapat Kami Terima Dengan Alasan Tertentu.';
                                    } else {
                                        echo 'Proposal Anda Masih Dalam Tahap Pemeriksaan.';
                                    }; ?> -->

                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <td class="project-actions text-center">
                    <a class="btn btn-primary" href="/home/edit/<?= $proposal['slug']; ?>">
                        <i class="fas fa-pen"></i>
                        Edit
                    </a>

                    <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#deleteModal">
                        <i class="fas fa-trash-alt"></i>

                        Delete
                    </a>
                </td>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>

<!-- Delete Modal-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Anda Yakin Menghapus Proposal Ini?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Klik Tombol "Delete" Jika Anda Sudah Yakin Untuk Menghapus Pengajuan Proposal Yang Anda Lakukan.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <form action="/home/delete/<?= $proposal['id']; ?>" method="post" class="d-inline">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="btn btn-danger" type="submit"><i class="fas fa-trash-alt"></i> Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>