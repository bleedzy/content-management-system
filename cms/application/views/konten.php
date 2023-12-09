<header class="site-header d-flex flex-column justify-content-center align-items-center">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12 text-center">

                <h2 class="mb-0">Konten</h2>
            </div>

        </div>
    </div>
</header>
<section class="latest-podcast-section section-padding pb-10">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-12">
                <div class="row">

                    <div class="section-title-wrap mb-5">
                        <h4 class="section-title">Konten</h4>
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="custom-block-icon-wrap">
                            <div class="custom-block-image-wrap custom-block-image-detail-page">
                                <?php
                                if ($konten->foto != NULL) {
                                    echo '<img src="' . base_url('assets/images/konten/') . $konten->foto . '" class="img-fluid" alt="' . $konten->judul . '">';
                                } else {
                                    echo '<img src="' . base_url('assets/images/konten/default/def.jpg') . '" class="img-fluid" alt="' . $konten->judul . '">';
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="custom-block-info">
                            <h2 class="mb-2"><?= $konten->judul ?></h2>

                            <p><strong><?= $konten->kategori ?></strong></p>

                            <p class="text-capitalize"><?= $konten->isi_konten ?></p>

                            <div class="profile-block profile-detail-block d-flex flex-wrap align-items-center mt-5">
                                <div class="d-flex mb-3 mb-lg-0 mb-md-0">
                                    <img src="<?= base_url('assets/images/upload/') . $konten->image ?>" class="profile-block-image img-fluid">
                                    <p>
                                        <?= $konten->nama ?><br>
                                        <strong>@<?= $konten->username ?></strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>