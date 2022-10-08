<!DOCTYPE html>
<html lang="en">

<?php include('header.php'); ?>

<nav class="navbar my-navbar navbar-expand-md navbar-light bg-white">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="https://imgur.com/sbUlQpy" alt="" />
            LOGO</a>
        <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item nav-active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<body>



    <?php
    $page = isset($_GET['page']) ? $_GET['page'] : "home";
    include $page . '.php';
    ?>

</body>
<footer class="bg-light py-5">
    <div class="container">
        <div class="small text-center text-muted">Executive Facial Care system | 2022 </div>
    </div>
</footer>
<?php include('footer.php') ?>

</html>