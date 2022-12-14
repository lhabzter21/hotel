<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="description" content="" />
<meta name="author" content="" />
<title><?php echo isset($_SESSION['setting_hotel_name']) ? $_SESSION['setting_hotel_name']:'Company Name' ?></title>
<!-- Favicon-->
<link rel="icon" type="image/x-icon" href="ext/img/favicon.png" />

<!-- Bootstrap -->
<link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<!-- Fontawesome -->
<link href="lib/fontawesome/css/all.min.css" rel="stylesheet" />
<!-- Date Picker -->
<link href="lib/daterangepicker-master/daterangepicker.css" rel="stylesheet" />
<!-- Reset CSS -->
<link href="ext/css/reset.css" rel="stylesheet" />
<!-- Pages -->
<link href="ext/css/page.css" rel="stylesheet" />
<!-- Main -->
<link href="ext/css/app.css" rel="stylesheet" />

<?php
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI);
$pages = ['home', 'services', 'about', 'login'];
$clientPages = ['categories', 'services offer', 'products', 'logout'];

// check if the query is empty and redirect to home page
if (isset($path['query']) && !in_array(strtolower($path['query']), $pages)) {
    parse_str($path['query'], $params);
} else {
    header('Location: index.php?page=home');
}

// check if the query is empty and redirect to home page
if (isset($path['query']) && !in_array(strtolower($path['query']), $clientPages)) {
    parse_str($path['query'], $params);
} else {
    header('Location: index.php?page=home');
}



?>

<!-- Condition Here -->

<!-- Default  Navbar -->
<nav class="navbar my-navbar navbar-expand-md ">
    <div class="container">
        <a class="navbar-brand text-white" href="index.php?page=home">
            <?php echo isset($_SESSION['setting_hotel_name']) ? $_SESSION['setting_hotel_name']:'Company Name'; ?>
        </a>
        <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="<?php if ($params['page'] == "home" || empty($params['page'])) {
                                echo "nav-item nav-active";
                            } else {
                                echo "nav-item";
                            } ?>">
                    <a class="nav-link my-navlink" href="index.php?page=home">Home <span class="sr-only">(current)</span></a>
                </li>
                <?php if(isset($_SESSION['login_id'])){?>
                    <?php if($_SESSION['login_type'] == 3){?>
                        <li class="<?php if ($params['page'] == "category") {
                                        echo "nav-item nav-active";
                                    } else {
                                        echo "nav-item";
                                    } ?>">
                            <a class="nav-link my-navlink" href="index.php?page=category">Categories</a>
                        </li>
                    <?php } ?>
                <?php } ?>
                <li class="<?php if ($params['page'] == "services") {
                                echo "nav-item nav-active";
                            } else {
                                echo "nav-item";
                            } ?>">
                    <a class="nav-link my-navlink" href="index.php?page=services">Services</a>
                </li>
                <?php if(isset($_SESSION['login_id'])){?>
                    <?php if($_SESSION['login_type'] == 3){?>
                        <li class="<?php if ($params['page'] == "products") {
                                        echo "nav-item nav-active";
                                    } else {
                                        echo "nav-item";
                                    } ?>">
                            <a class="nav-link my-navlink" href="index.php?page=products">Products</a>
                        </li>
                    <?php } ?>
                <?php } ?>
                <li class="<?php if ($params['page'] == "about") {
                                echo "nav-item nav-active";
                            } else {
                                echo "nav-item";
                            } ?>">
                    <a class="nav-link my-navlink" href="index.php?page=about">About Us </a>
                </li>
                <?php if(isset($_SESSION['login_id'])){?>
                    <?php if($_SESSION['login_type'] == 1 || $_SESSION['login_type'] == 2){?>
                        <li class="nav-item">
                            <a class="nav-link my-navlink" href="admin/index.php">Admin Panel</a>
                        </li>
                    <?php } ?>
                <?php } ?>
                <?php if(!isset($_SESSION['login_id'])){?>
                    <li class="<?php if ($params['page'] == "login") {
                                    echo "nav-item nav-active";
                                } else {
                                    echo "nav-item";
                                } ?>">
                        <a class="nav-link my-navlink" href="admin/login.php">Login </a>
                    </li>
                <?php } ?>
                <?php if(isset($_SESSION['login_id'])){?>
                    <li class="nav-item">
                        <a class="nav-link my-navlink" href="admin/ajax.php?action=logout">Logout </a>
                    </li>
                <?php }?>
            </ul>
        </div>
    </div>
</nav>


<!-- Customer Navbar -->

<!-- <nav class="navbar my-navbar navbar-expand-md ">
    <div class="container">
        <a class="navbar-brand" href="#">

            LOGO</a>
        <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="<?php if ($params['page'] == "home" || empty($params['page'])) {
                                echo "nav-item nav-active";
                            } else {
                                echo "nav-item";
                            } ?>">
                    <a class="nav-link" href="index.php?page=home">Categories <span class="sr-only">(current)</span></a>
                </li>
                <li class="<?php if ($params['page'] == "categories") {
                                echo "nav-item nav-active";
                            } else {
                                echo "nav-item";
                            } ?>">
                    <a class="nav-link" href="index.php?page=services-offer">Services Offer</a>
                </li>
                <li class="<?php if ($params['page'] == "about") {
                                echo "nav-item nav-active";
                            } else {
                                echo "nav-item";
                            } ?>">
                    <a class="nav-link" href="index.php?page=products">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav> -->