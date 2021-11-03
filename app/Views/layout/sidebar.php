<?php $uri = current_url(true); ?>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="<?php echo base_url('pages') ?>" class="<?php if ($uri->getSegment(3) == '' || $uri->getSegment(3) == site_url('index')) {
                                                                        echo 'nav-link active';
                                                                    } else {
                                                                        echo 'nav-link';
                                                                    } ?>">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item">

                <a href="<?php echo base_url('pages/kelola_pengguna') ?>" class="<?php if ($uri->getSegment(3) == 'kelola_pengguna') {
                                                                                        echo 'nav-link active';
                                                                                    } else {
                                                                                        echo 'nav-link';
                                                                                    }  ?>">
                    <i class="nav-icon far fa-user"></i>
                    <p>
                        Kelola Pengguna
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo base_url('pages/level_pengguna') ?>" class="<?php if ($uri->getSegment(3) == 'level_pengguna') {
                                                                                    echo 'nav-link active';
                                                                                } else {
                                                                                    echo 'nav-link';
                                                                                }  ?>">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Level Pengguna
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo base_url('pages/data_pegawai') ?>" class="<?php if ($uri->getSegment(3) == 'data_pegawai') {
                                                                                    echo 'nav-link active';
                                                                                } else {
                                                                                    echo 'nav-link';
                                                                                }  ?>">
                    <i class="nav-icon fas fa-user-circle"></i>
                    <p>
                        Data Pegawai
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-address-card"></i>
                    <p>
                        Data Master
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Paramedis</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Jabatan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Bidang</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Poli</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-user-md"></i>
                    <p>
                        Data Dokter
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon far fa-calendar-alt"></i>
                    <p>
                        Jadwal Praktek Dokter
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-user-md"></i>
                    <p>
                        Data Pasien
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon far fa-edit"></i>
                    <p>
                        Data Pendaftaran
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon far fa-calendar-alt"></i>
                    <p>
                        Data Diagnosa
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-flask"></i>
                    <p>
                        Data Tindakan
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-pills"></i>
                    <p>
                        Data Obat
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Coming Soon</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-bed"></i>
                    <p>
                        Data Suplier
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-bed"></i>
                    <p>
                        Data Tin. Operasi
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Coming Soon</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-graduation-cap"></i>
                    <p>
                        Data Poli Kia
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        Data Perbaikan Gizi
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-graduation-cap"></i>
                    <p>
                        Data Tindakan Berobat
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon far fa-calendar-alt"></i>
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