<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url('assets/star-admin/template/') ?>vendors/feather/feather.css">
    <link rel="stylesheet" href="<?= base_url('assets/star-admin/template/') ?>vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/star-admin/template/') ?>vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url('assets/star-admin/template/') ?>vendors/typicons/typicons.css">
    <link rel="stylesheet" href="<?= base_url('assets/star-admin/template/') ?>vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="<?= base_url('assets/star-admin/template/') ?>vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?= base_url('assets/star-admin/template/') ?>css/vertical-layout-light/style.css">
    <link rel="shortcut icon" href="<?= base_url('assets/star-admin/template/') ?>images/Hu.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div id="menghilang">
                            <?php echo $this->session->flashdata('alert', true); ?>
                        </div>
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <a href="<?= site_url('') ?>" style="text-decoration: none;" class="text-dark">
                                    <h2>CMS</h2>
                                </a>
                            </div>
                            <h6 class="fw-light">Create account.</h6>
                            <form class="pt-3" action="<?= site_url('login/create') ?>" method="post" enctype="multipart/form-data">
                                <div class="form-floating mb-3">
                                    <input name="nama" type="text" class="form-control form-control-lg" placeholder="Nama" required>
                                    <label for="inputNama">Nama</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input name="username" class="form-control form-control-lg" type="text" placeholder="Username" required>
                                    <label for="inputUsername">Username</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input name="password" type="password" class="form-control form-control-lg" placeholder="Password" required>
                                    <label for="inputPassword">Password</label>
                                </div>
                                <div class="form-group">
                                    <label for="inputImage" class="form-label">Image Profile:</label>
                                    <input type="file" name="image" class="form-control form-control-lg">
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Create</button>
                                </div>
                                <div class="text-center mt-4 fw-light">
                                    Already have an account? <a href="<?= site_url('login') ?>" class="text-primary">Sign In</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url('assets/star-admin/template/') ?>vendors/js/vendor.bundle.base.js"></script>
    <script src="<?= base_url('assets/star-admin/template/') ?>vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="<?= base_url('assets/star-admin/template/') ?>js/off-canvas.js"></script>
    <script src="<?= base_url('assets/star-admin/template/') ?>js/hoverable-collapse.js"></script>
    <script src="<?= base_url('assets/star-admin/template/') ?>js/template.js"></script>
    <script src="<?= base_url('assets/star-admin/template/') ?>js/settings.js"></script>
    <script src="<?= base_url('assets/star-admin/template/') ?>js/todolist.js"></script>
    <script>
        $("#menghilang").fadeTo(2000, 500).slideUp(500, function() {
            $("#menghilang").slideUp(500);
        });
    </script>
</body>

</html>