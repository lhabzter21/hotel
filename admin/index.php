<!DOCTYPE html>
<html lang="en">

<?php include('components/header.php');?>
<link href="../ext/css/admin.css" rel="stylesheet" />

<!-- init DB connection for all the pages -->
<?php include('db_connect.php'); ?>

<?php
  if(!isset($_SESSION['login_id'])) {
    header("Location: login.php");
  } else {
    // redirect customer login
    if($_SESSION['login_type'] == 3)
    header("Location: ../index.php");
  }
?>



<body>
  <?php include('components/navsidebar.php'); ?>

<main class="content-wrapper content-main">
  <?php include('modules/home.php'); ?>
  <?php include('modules/booked.php'); ?>
  <?php include('modules/reservation.php'); ?>
  <?php include('modules/checkout.php')?>
  <?php include('modules/services_offer.php'); ?>
  <?php include('modules/products_offer.php'); ?>
  <?php include('modules/users.php'); ?>
  <?php include('modules/site_settings.php'); ?>
</main>

</body>

<?php include('components/footer.php');?>
<script src="../ext/js/main.js"></script>

</html>