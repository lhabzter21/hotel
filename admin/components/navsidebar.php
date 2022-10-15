<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="../index.php"><?php echo isset($_SESSION['setting_hotel_name']) ? $_SESSION['setting_hotel_name']:'Company Name' ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto sidenav" id="navAccordion">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fa-solid fa-house mr-2"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fa-solid fa-users mr-2"></i> <span>Customers</span> 
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fa-solid fa-calendar mr-2"></i> <span>Appointment</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fa-solid fa-rss mr-2"></i> <span>Feedbacks</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fa-solid fa-list mr-2"></i> <span>Services Offer</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fa-solid fa-shopping-cart mr-2"></i> <span>Products Offer</span>
                </a>
            </li>

            <?php if($_SESSION['login_type'] == 1){?>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fa-solid fa-user mr-2"></i> <span>Users</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fa-solid fa-gear mr-2"></i> <span>Site Settings</span>
                    </a>
                </li>
            <?php }?>
        </ul>
        <form class="form-inline ml-auto mt-2 mt-md-0">
            <a href="ajax.php?action=logout" class="btn btn-link my-2 my-sm-0 text-white"><?php echo @$_SESSION['login_name'] ?> <i class="fa fa-power-off"></i></a>
        </form>
  </div>

</nav>