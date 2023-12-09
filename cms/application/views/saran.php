<header class="site-header d-flex flex-column justify-content-center align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12 text-center">
                <h2 class="mb-0">Saran</h2>
            </div>
        </div>
    </div>
</header>

<section class="contact-section section-padding pt-0">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-12 mx-auto">
                <div class="section-title-wrap mb-5">
                    <h4 class="section-title">Saran Anda</h4>
                </div>

                <form action="<?= site_url('home/saran_simpan')?>" method="post" class="custom-form contact-form" role="form">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-floating">
                                <input type="text" name="name" id="full-name" class="form-control" placeholder="Nama Lengkap" required="">

                                <label for="floatingInput">Nama Lengkap</label>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-floating">
                                <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Alamat Email" required="">

                                <label for="floatingInput">Alamat Email</label>
                            </div>
                        </div>

                        <div class="col-lg-12 col-12">
                            <div class="form-floating">
                                <textarea class="form-control" id="message" name="message" placeholder="Saran Anda"></textarea>

                                <label for="floatingTextarea">Saran Anda</label>
                            </div>
                        </div>

                        <div class="col-lg-4 col-12 ms-auto">
                            <button type="submit" class="form-control">Submit</button>
                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>
</section>