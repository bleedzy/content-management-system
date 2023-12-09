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
<div class="container">

   <div class="profile">
      <?php
         if($fetch->image == ''){
            echo '<img src="'. base_url('assets/images/upload/default/default.png') .'">';
         }else{
            echo '<img src="' . base_url('assets/images/upload/') . $fetch->image . '">';
         }
      ?>
      <h1><?= $fetch->nama ?></h1>
      <h5 style="color: #696969;">@<?= $fetch->username ?></h5>
      <a href="<?= site_url('login/update_profile') ?>" class="btn">Update Profile</a>
      <a href="<?= site_url('login/back') ?>" class="delete-btn">Go Back</a>
   </div>

</div>
</body>
</html>