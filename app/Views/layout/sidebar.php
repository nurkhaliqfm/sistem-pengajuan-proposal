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
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                        Proposal Masuk
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo base_url('login/logout') ?>" class="nav-link">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
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