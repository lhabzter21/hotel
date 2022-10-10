<!DOCTYPE html>
<html lang="en">

<?php 
    session_start();
    include('admin/db_connect.php');
    $query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
    foreach ($query as $key => $value) {
        if(!is_numeric($key))
            $_SESSION['setting_'.$key] = $value;
    }
?>
<?php include('header.php'); ?>

<body>
    <?php
        $page = isset($_GET['page']) && !empty($_GET['page']) ? $_GET['page'] : "home";
        include $page . '.php';
    ?>
</body>

<?php include('footer.php'); ?>

</html>