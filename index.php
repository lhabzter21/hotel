<!DOCTYPE html>
<html lang="en">

<?php include('header.php'); ?>

<body>

    <?php
    $page = isset($_GET['page']) ? $_GET['page'] : "home";
    include $page . '.php';
    ?>

</body>
<?php include('footer.php') ?>

</html>