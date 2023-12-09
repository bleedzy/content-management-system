<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <link rel="stylesheet" href="<?= base_url('assets/star-admin/template/') ?>vendors/feather/feather.css">
    <link rel="stylesheet" href="<?= base_url('assets/star-admin/template/') ?>vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/star-admin/template/') ?>vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url('assets/star-admin/template/') ?>vendors/typicons/typicons.css">
    <link rel="stylesheet" href="<?= base_url('assets/star-admin/template/') ?>vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="<?= base_url('assets/star-admin/template/') ?>vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?= base_url('assets/star-admin/template/') ?>vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="<?= base_url('assets/star-admin/template/') ?>js/select.dataTables.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/star-admin/template/') ?>css/vertical-layout-light/style.css">
    <link rel="shortcut icon" href="<?= base_url('assets/star-admin/template/') ?>images/Hu.png" />
</head>

<body>
    <div class="container-scroller">
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <div class="me-3">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                        <span class="icon-menu"></span>
                    </button>
                </div>
                <div>
                    <a class="navbar-brand brand-logo" href="<?= site_url('') ?>">
                        <img style="height: 100%; width: 10rem;" src="<?= base_url('assets/star-admin/template/') ?>images/FreeFire.png" alt="logo" />
                    </a>
                    <a class="navbar-brand brand-logo-mini" href="<?= site_url('') ?>">
                        <img style="height: 100%;" src="<?= base_url('assets/star-admin/template/') ?>images/ff.png" alt="logo" />
                    </a>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-top">
                <ul class="navbar-nav">
                    <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                        <h1 class="welcome-text">Selamat Datang, <span class="text-black fw-bold"><?= $ambil->nama ?></span></h1>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <div class="input-group date datepicker navbar-date-picker bg-white">
                            <span class="input-group-addon input-group-prepend border-right">
                                <span class="icon-calendar input-group-text calendar-icon"></span>
                            </span>
                            <input type="text" class="form-control bg-white" id="datepicker-popup" disabled>
                        </div>
                    </li>
                    <li class="nav-item dropdown user-dropdown">
                        <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php
                            if ($ambil->image != NULL) {
                                echo "<img class='img-xs rounded-circle' src='" . base_url('assets/images/upload/') . $ambil->image . "' alt='Profile image'>";
                            } else {
                                echo "<img class='img-xs rounded-circle' src='" . base_url('assets/images/upload/default/default.png') . "' alt='Profile image'>";
                            }
                            ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <div class="dropdown-header text-center">
                                <?php
                                if ($ambil->image != NULL) {
                                    echo "<img class='img-xs rounded-circle' src='" . base_url('assets/images/upload/') . $ambil->image . "' alt='Profile image'>";
                                } else {
                                    echo "<img class='img-xs rounded-circle' src='" . base_url('assets/images/upload/default/default.png') . "' alt='Profile image'>";
                                }
                                ?>
                                <h5 class="mb-1 mt-3 font-weight-semibold"><?= $ambil->nama ?></h5>
                            </div>
                            <a class="dropdown-item" href="<?= site_url('login/profile') ?>"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile</a>
                            <a class="dropdown-item" href="<?= site_url('login/logout') ?>"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <div class="container-fluid page-body-wrapper">
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item
                    <?php
                    if (current_url() == site_url('admin')) {
                        echo " active";
                    }
                    ?>
                    ">
                        <a class="nav-link" href="<?= site_url('admin') ?>">
                            <i class="mdi mdi-home menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item
                    <?php
                    if (current_url() == site_url('carousel')) {
                        echo " active";
                    }
                    ?>
                    ">
                        <a class="nav-link" href="<?= site_url('carousel') ?>">
                            <i class="mdi mdi-laptop-mac menu-icon"></i>
                            <span class="menu-title">Carousel</span>
                        </a>
                    </li>
                    <li class="nav-item
                    <?php
                    if (current_url() == site_url('kategori')) {
                        echo " active";
                    }
                    ?>
                    ">
                        <a class="nav-link" href="<?= site_url('kategori') ?>">
                            <i class="mdi mdi-grid-large menu-icon"></i>
                            <span class="menu-title">Kategori</span>
                        </a>
                    </li>
                    <li class="nav-item
                    <?php
                    if (current_url() == site_url('konten')) {
                        echo " active";
                    }
                    ?>
                    ">
                        <a class="nav-link" href="<?= site_url('konten') ?>">
                            <i class="mdi mdi-library-books menu-icon"></i>
                            <span class="menu-title">Konten</span>
                        </a>
                    </li>
                    <li class="nav-item
                    <?php
                    if (current_url() == site_url('galeri')) {
                        echo " active";
                    }
                    ?>
                    ">
                        <a class="nav-link" href="<?= site_url('galeri') ?>">
                            <i class="mdi mdi-image-multiple menu-icon"></i>
                            <span class="menu-title">Galeri</span>
                        </a>
                    </li>
                    <li class="nav-item
                    <?php
                    if (current_url() == site_url('_saran')) {
                        echo " active";
                    }
                    ?>
                    ">
                        <a class="nav-link" href="<?= site_url('_saran') ?>">
                            <i class="mdi mdi-email menu-icon"></i>
                            <span class="menu-title">Saran</span>
                        </a>
                    </li>
                    <li class="nav-item
                    <?php
                    if (current_url() == site_url('user')) {
                        echo " active";
                    }
                    ?>
                    ">
                        <a class="nav-link" href="<?= site_url('user') ?>">
                            <i class="menu-icon mdi mdi-account-circle-outline"></i>
                            <span class="menu-title">User</span>
                        </a>
                    </li>
                    <li class="nav-item
                    <?php
                    if (current_url() == site_url('konfigurasi')) {
                        echo " active";
                    }
                    ?>
                    ">
                        <a class="nav-link" href="<?= site_url('konfigurasi') ?>">
                            <i class="menu-icon mdi mdi-tune"></i>
                            <span class="menu-title">Konfigurasi</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="main-panel">
                <div class="content-wrapper">
                    <!-- ini peringatan -->
                    <div id="menghilang">
                        <?php echo $this->session->flashdata('alert', true); ?>
                    </div>
                    <!-- ini content -->
                    <?= $contents; ?>
                </div>
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2023.
                            Adhizy.</span>
                    </div>
                </footer>
            </div>
        </div>
    </div>
</body>
<script src="<?= base_url('assets/star-admin/template/') ?>vendors/js/vendor.bundle.base.js"></script>
<script src="<?= base_url('assets/star-admin/template/') ?>vendors/chart.js/Chart.min.js"></script>
<script src="<?= base_url('assets/star-admin/template/') ?>vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url('assets/star-admin/template/') ?>vendors/progressbar.js/progressbar.min.js"></script>
<script src="<?= base_url('assets/star-admin/template/') ?>js/off-canvas.js"></script>
<script src="<?= base_url('assets/star-admin/template/') ?>js/hoverable-collapse.js"></script>
<script src="<?= base_url('assets/star-admin/template/') ?>js/template.js"></script>
<script src="<?= base_url('assets/star-admin/template/') ?>js/settings.js"></script>
<script src="<?= base_url('assets/star-admin/template/') ?>js/todolist.js"></script>
<script src="<?= base_url('assets/star-admin/template/') ?>js/dashboard.js"></script>
<script src="<?= base_url('assets/star-admin/template/') ?>js/Chart.roundedBarCharts.js"></script>
<script>
    $("#menghilang").fadeTo(2000, 500).slideUp(500, function() {
        $("#menghilang").slideUp(500);
    });
</script>

</html>