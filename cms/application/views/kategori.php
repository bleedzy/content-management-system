<header class="site-header d-flex flex-column justify-content-center align-items-center">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12 text-center">

                <h2 class="mb-0">Kategori Konten</h2>
            </div>

        </div>
    </div>
</header>
<section class="related-podcast-section section-padding" id="konten">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12">
                <div class="section-title-wrap mb-5">
                    <h4 class="section-title">Konten <?= $key ?></h4>
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