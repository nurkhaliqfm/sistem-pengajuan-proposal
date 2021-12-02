<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?php echo base_url('home/index'); ?>" class="nav-link">Home</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge"></span>
            </a>
        </li>
        <li class="nav-item">
            <i class="nav-link">Hello, <?= $admin_name; ?></i>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url('admin/index') ?>" class="brand-link">
        <img src="<?php echo base_url('assets/img/logo.png') ?>" alt="Logo" class="brand-image" style="opacity: .8">
        <span class="brand-text font-weight-light">
            <?= session()->get('user_level') == 'admin' ? 'Admin Kecamatan' : 'Super Admin'; ?>
        </span>
    </a>

    <?= $this->include('admin/layout/sidebar'); ?>
</aside>