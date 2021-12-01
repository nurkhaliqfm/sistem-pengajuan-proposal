<?php $uri = current_url(true)->getSegment(3); ?>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="<?php echo base_url('admin/index') ?>" class="<?= $uri == '' || $uri == 'index' ? 'nav-link active' : 'nav-link'; ?>">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('admin/kelola_pengguna'); ?>" class="<?= $uri == 'kelola_pengguna' ? 'nav-link active' : 'nav-link'; ?>">
                    <i class="nav-icon fas fa-user-cog"></i>
                    <p>
                        Kelola Pengguna
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('admin/penyuluh'); ?>" class="<?= $uri == 'penyuluh' ? 'nav-link active' : 'nav-link'; ?>">
                    <i class="nav-icon fas fa-id-badge"></i>
                    <p>
                        Daftar Penyuluh
                    </p>
                </a>
            </li>
            <li class="<?= $uri == 'proposal_masuk' || $uri == 'proposal_disetujui' || $uri == 'proposal_ditolak' ? 'nav-item menu-open active' : 'nav-item' ?>">
                <a href="<?php echo base_url('admin/proposal_masuk') ?>" class="<?= $uri == 'proposal_masuk' || $uri == 'proposal_disetujui' || $uri == 'proposal_ditolak' ? 'nav-link active' : 'nav-link' ?>">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                        Proposal
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?php echo base_url('admin/proposal_masuk') ?>" class="<?= $uri == 'proposal_masuk' ? 'nav-link active' : 'nav-link' ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Masuk</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('admin/proposal_disetujui') ?>" class="<?= $uri == 'proposal_disetujui' ? 'nav-link active' : 'nav-link' ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Disetujui</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('admin/proposal_ditolak') ?>" class="<?= $uri == 'proposal_ditolak' ? 'nav-link active' : 'nav-link' ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Ditolak</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    <p>
                        Logout
                    </p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->