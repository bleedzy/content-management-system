<div id="carouselExampleInterval" class="carousel slide mb-5" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <?php foreach ($carousel as $key => $c) { ?>
            <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="<?= $key ?>" <?php echo $key === 0 ? 'class="active"' : ''; ?>></button>
        <?php } ?>
    </div>
    <div class="carousel-inner">
        <?php
        foreach ($carousel as $key => $c) {
        ?>
            <div class="carousel-item<?= $key === 0 ? ' active' : '' ?>" data-bs-interval="10000">
                <img src="<?= base_url('assets/images/carousel/') . $c->foto ?>" class="d-block w-100" alt="<?= $c->judul ?>">

                <?php
                if ($c->judul != '(kosong)') {
                    echo '<div class="carousel-caption d-none d-md-block">';
                    echo '<h3 class="text-light text-capitalize">' . $c->judul . '</h3>';
                    echo '</div>';
                }
                ?>

            </div>
        <?php
        }
        ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<script>
    $(document).ready(function() {
        $('#carouselExampleInterval').carousel();
    });
</script>