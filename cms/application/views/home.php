<section class="hero-section">
    <!-- peringatan -->
    <div id="menghilang">
        <?php echo $this->session->flashdata('alert', true); ?>
    </div>
    <div class="container">
        <?php
        if (!empty($carousel)) {
            echo '<div id="carouselExampleInterval" class="carousel slide carousel-fade mb-5" data-bs-ride="carousel">';
            echo '<div class="carousel-indicators">';
            foreach ($carousel as $key => $c) {
                echo '<button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="' . $key . '"';
                echo $key === 0 ? 'class="active"' : '';
                echo '></button>';
            }
            echo '</div>';
            echo '<div class="carousel-inner">';
            foreach ($carousel as $key => $c) {
                echo '<div class="carousel-item';
                echo $key === 0 ? ' active' : '';
                echo '" data-bs-interval="10000">';
                echo '<img src="' . base_url('assets/images/carousel/') . $c->foto . '" class="d-block w-100" alt="' . $c->judul . '">';
                if ($c->judul != '(kosong)') {
                    echo '<div class="carousel-caption d-none d-md-block">';
                    echo '<h3 class="text-light text-capitalize">' . $c->judul . '</h3>';
                    echo '</div>';
                }
                echo '</div>';
            }
            echo '</div>';
            echo '<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">';
            echo '<span class="carousel-control-prev-icon" aria-hidden="true"></span>';
            echo '<span class="visually-hidden">Previous</span>';
            echo '</button>';
            echo '<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">';
            echo '<span class="carousel-control-next-icon" aria-hidden="true"></span>';
            echo '<span class="visually-hidden">Next</span>';
            echo '</button>';
            echo '</div>';
        }
        ?>
        <script>
            $(document).ready(function() {
                $('#carouselExampleInterval').carousel();
            });
        </script>
    </div>
</section>

<section class="trending-podcast-section section-padding" id="konten">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12">
                <div class="section-title-wrap mb-5">
                    <h4 class="section-title">Konten</h4>
                </div>
            </div>

            <?php
            foreach ($konten as $k) {
            ?>
                <div class="col-lg-4 col-12 mb-4 mt-4 mb-lg-0">
                    <div class="custom-block custom-block-full">
                        <div class="custom-block-image-wrap">
                            <a href="<?= site_url('home/konten/') . $k->id_konten ?>">
                                <?php
                                if ($k->foto != NULL) {
                                    echo '<img src="' . base_url('assets/images/konten/') . $k->foto . '" class="custom-block-image img-fluid" alt="' . $k->judul . '">';
                                } else {
                                    echo '<img src="' . base_url('assets/images/konten/default/def.jpg') . '" class="custom-block-image img-fluid" alt="' . $k->judul . '">';
                                }
                                ?>
                            </a>
                        </div>

                        <div class="custom-block-info">
                            <h5 class="mb-2">
                                <a href="<?= site_url('home/konten/') . $k->id_konten ?>">
                                    <?= $k->judul ?>
                                </a>
                            </h5>

                            <p class="text-capitalize"><strong><?= $k->kategori ?></strong></p>

                            <div class="profile-block d-flex">
                                <img src="<?= base_url('assets/images/upload/') . $k->image ?>" class="profile-block-image img-fluid">

                                <p class="text-capitalize">
                                    <?= $k->nama ?>
                                    <strong>@<?= $k->username ?></strong>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            echo $this->pagination->create_links();
            ?>
        </div>
    </div>
</section>