<?php 
if(empty($this->session->userdata('id'))){
    redirect('login');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/') ?>style.css">
    <link rel="shortcut icon" href="<?= base_url('assets/star-admin/template/') ?>images/Hu.png" />

</head>

<body>
    <div class="update-profile">
        <form action="<?= site_url('login/update') ?>" method="post" enctype="multipart/form-data">
            <?php
            if ($fetch->image == '') {
                echo '<img src="' . base_url('assets/images/upload/default/default.png') . '">';
            } else {
                echo '<img src="' . base_url('assets/images/upload/') . $fetch->image . '">';
            }
            ?>
            <div class="flex">
                <div class="inputBox">
                    <span>Nama :</span>
                    <input type="text" name="nama" value="<?= $fetch->nama ?>" class="box">
                    <span>Image Profile :</span>
                    <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box">
                </div>
                <div class="inputBox">
                    <span>Username :</span>
                    <input type="text" name="username" value="<?= $fetch->username ?>" class="box">
                </div>
            </div>
            <input type="submit" value="Update Profile" class="btn">
            <a href="<?= site_url('login/profile') ?>" class="delete-btn">Go Back</a>
        </form>

    </div>
</body>

</html>