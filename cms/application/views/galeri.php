<header class="site-header d-flex flex-column justify-content-center align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12 text-center">
                <h2 class="mb-0">Galeri</h2>
            </div>
        </div>
    </div>
</header>

<section class="related-podcast-section section-padding">
    <style>
        .col-sm-4 img {
            opacity: 1;
            cursor: pointer;
            width: 100%;
        }

        .col-sm-4 img:hover {
            opacity: 0.7;  
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
    </style>
    <!-- content -->
    <div class="container">
        <div class="row" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <?php
            foreach ($galeri as $key => $g) {
            ?>
                <div class="col-sm-4 mb-4 mr-3">
                    <img src="<?= base_url('assets/images/galeri/') . $g->foto ?>" class="img-fluid" data-bs-target="#carouselExample" data-bs-slide-to="<?= $key ?>" alt="Image 1">
                </div>
            <?php
            }
            ?>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Image</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="carouselExample" class="carousel slide" data-bs-interval="false">
                            <div class="carousel-inner">
                                <?php
                                foreach ($galeri as $key => $g) {
                                ?>
                                    <div class="carousel-item <?= $key === 0 ? ' active' : '' ?>">
                                        <img src="<?= base_url('assets/images/galeri/') . $g->foto ?>" class="d-block w-100">
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>