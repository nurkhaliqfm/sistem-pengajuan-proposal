<?php $uri = current_url(true)->getSegment(3); ?>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="/home" class="<?= $uri == '' || $uri == 'index' ? 'nav-link active' : 'nav-link'; ?>">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('home/profile') ?>" class="<?= $uri == 'profile' ? 'nav-link active' : 'nav-link'; ?>">
                    <i class="nav-icon far fa-user"></i>
                    <p>
                        Profil
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo base_url('home/proposal') ?>" class="<?= $uri == 'proposal' ? 'nav-link active' : 'nav-link' ?>">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                        Proposal
                    </p>
                </a>
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