<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>WEB CMS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&family=Sono:wght@200;300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/podtalk/') ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/podtalk/') ?>css/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url('assets/podtalk/') ?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/podtalk/') ?>css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/podtalk/') ?>css/templatemo-pod-talk.css">
    <link rel="shortcut icon" href="<?= base_url('assets/star-admin/template/') ?>images/Hu.png">
</head>

<body>

    <main>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand me-lg-5 me-0" href="<?= site_url('') ?>">
                    <h2><?= $konfig->judul_web ?></h2>
                </a>

                <form action="<?= site_url('home/cari') ?>" method="get" class="custom-form search-form flex-fill me-3" role="search">
                    <div class="input-group input-group-lg">
                        <input name="search" type="search" class="form-control" id="search" placeholder="Cari Konten" aria-label="Search">

                        <button type="submit" class="form-control" id="submit">
                            <i class="bi-search"></i>
                        </button>
                    </div>
                </form>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('') ?>">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('home/galeri') ?>">Galeri</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Terbaru</a>

                            <ul class="dropdown-menu dropdown-menu-light">
                                <?php
                                foreach ($new as $n) {
                                ?>
                                    <li><a class="dropdown-item text-truncate" href="<?= site_url('home/konten/') . $n->id_konten ?>"><?= $n->judul ?></a></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Kategori</a>

                            <ul class="dropdown-menu dropdown-menu-light">
                                <?php
                                foreach ($kategori as $k) {
                                ?>
                                    <li><a class="dropdown-item text-truncate" href="<?= site_url('home/kategori_konten/') . $k->kategori ?>"><?= $k->kategori ?></a></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </li>

                        <li class="">
                            <a class="nav-link" href="<?= site_url('home/saran') ?>">Saran</a>
                        </li>

                        <div class="nav-item ms-auto">
                            <a href="<?= site_url('login') ?>" class="btn custom-btn custom-border-btn smoothscroll">Login</a>
                        </div>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- ini content -->
        <?= $contents ?>
    </main>


    <footer class="site-footer">
        <div class="container">
            <div class="row">


                <div class="col-lg-3 col-md-6 col-12 mb-4 mb-md-0 mb-lg-0">

                    <h6 class="site-footer-title mb-3"><?= $konfig->judul_web ?></h6>

                    <p class="mb-2"><?= $konfig->profil_web ?></p>

                    <ul class="social-icon">

                        <li class="social-icon-item">
                            <a href="https://drive.google.com/file/d/1_EwxK9D4UIYFCqG_gXf7QEDQfTnCzzkx/view?usp=drive_link" class="social-icon-link bi-book"></a>
                        </li>
                        
                        <li class="social-icon-item">
                            <a href="<?= $konfig->instagram ?>" class="social-icon-link bi-instagram"></a>
                        </li>

                        <li class="social-icon-item">
                            <a href="<?= $konfig->twitter ?>" class="social-icon-link bi-twitter"></a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mb-4 mb-md-0 mb-lg-0">
                    <h6 class="site-footer-title mb-3">Contact</h6>

                    <p class="mb-2">
                        <strong class="d-inline me-2">Email:</strong><br>
                        <a href="mailto:<?= $konfig->email ?>"><?= $konfig->email ?></a>
                    </p>

                    <p class="mb-2">
                        <strong class="d-inline me-2">Phone:</strong><br>
                        <?= $konfig->whatsapp ?>
                    </p>

                    <p>
                        <strong class="d-inline me-2">Alamat:</strong><br>
                        <?= $konfig->alamat ?>
                    </p>
                </div>

                <?php
                if (isset($aktif->kategori)) {

                    echo '<div class="col-lg-3 col-md-6 col-12 mb-4 mb-md-0 mb-lg-0">';
                    echo '<h6 class="site-footer-title mb-3">Kategori ' . $aktif->kategori . '</h6>';
                    echo '<ul class="site-footer-links">';
                    foreach ($ket as $k) {
                        echo '<li class="site-footer-link-item">';
                        echo '<i class="bi bi-chevron-right">';
                        echo '<a href="' . site_url('home/konten/') . $k->id_konten . '" class="site-footer-link mb-2">' . $k->judul . '</a></i>';
                        echo '</li><br>';
                    }
                    echo '</ul>';
                    echo '</div>';
                }
                ?>

                <div class="col-lg-3 col-md-6 col-12 mb-4 mb-md-0 mb-lg-0">

                    <h6 class="site-footer-title mb-3">Konten Terbaru</h6>

                    <ul class="site-footer-links">
                        <?php
                        foreach ($new as $n) {
                        ?>
                            <li class="site-footer-link-item">
                                <i class="bi bi-chevron-right">
                                    <a href="<?= site_url('home/konten/') . $n->id_konten ?>" class="site-footer-link mb-2"><?= $n->judul ?></a></i>
                            </li><br>
                        <?php
                        }
                        ?>
                    </ul>
                </div>

            </div>
        </div>

        <div class="container pt-5">
            <div class="row align-items-center">

                <div class="col-lg-3 col-12">
                    <p class="copyright-text mb-0">Copyright © 2023 Adhizy</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="<?= base_url('assets/podtalk/') ?>js/jquery.min.js"></script>
    <script src="<?= base_url('assets/podtalk/') ?>js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/podtalk/') ?>js/owl.carousel.min.js"></script>
    <script src="<?= base_url('assets/podtalk/') ?>js/custom.js"></script>
    <script>
        $("#menghilang").fadeTo(2000, 500).slideUp(500, function() {
            $("#menghilang").slideUp(500);
        });
    </script>

</body>

</html>