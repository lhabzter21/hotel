<?php
    session_start();
    include('db_connect.php');
    $query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
    foreach ($query as $key => $value) {
        if(!is_numeric($key))
            $_SESSION['setting_'.$key] = $value;
    }
?>


<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="description" content="" />
<meta name="author" content="" />
<title><?php echo isset($_SESSION['setting_hotel_name']) ? $_SESSION['setting_hotel_name']:'Company Name' ?></title>
<!-- Favicon-->
<link rel="icon" type="image/x-icon" href="../ext/img/favicon.png" />

<!-- Bootstrap -->
<link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<!-- Fontawesome -->
<link href="../lib/fontawesome/css/all.min.css" rel="stylesheet" />
<!-- Reset CSS -->
<link href="../ext/css/reset.css" rel="stylesheet" />
<!-- DataTables -->
<link href="../lib/DataTables/datatables.min.css" rel="stylesheet" />
<!-- TinyMCE -->
<script src='../lib/tinymce/js/tinymce/tinymce.min.js'></script>
<!-- Main -->
<link href="../ext/css/app.css" rel="stylesheet" />

