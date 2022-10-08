<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="description" content="" />
<meta name="author" content="" />
<title><?php echo $_SESSION['setting_hotel_name'] ?></title>
<!-- Favicon-->
<link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />

<!-- Bootstrap -->
<link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<!-- Fontawesome -->
<link href="lib/fontawesome/css/all.min.css" rel="stylesheet" />
<!-- Reset CSS -->
<link href="ext/css/reset.css" rel="stylesheet" />
<!-- Main -->
<link href="ext/css/app.css" rel="stylesheet" />

<?php
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI);
$pages = ['home', 'services', 'about'];

// check if the query is empty and redirect to home page
if(isset($path['query']) && !in_array(strtolower($path['query']), $pages)) {
    parse_str($path['query'], $params);
} else {
    header('Location: index.php?page=home');
}


?>

<nav class="navbar my-navbar navbar-expand-md navbar-light bg-white">
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
                    <a class="nav-link" href="index.php?page=home">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="<?php if ($params['page'] == "services") {
                                echo "nav-item nav-active";
                            } else {
                                echo "nav-item";
                            } ?>">
                    <a class="nav-link" href="index.php?page=services">Services</a>
                </li>
                <li class="<?php if ($params['page'] == "about") {
                                echo "nav-item nav-active";
                            } else {
                                echo "nav-item";
                            } ?>">
                    <a class="nav-link" href="index.php?page=about">About Us </a>
                </li>
            </ul>
        </div>
    </div>
</nav>