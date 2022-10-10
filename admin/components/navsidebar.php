<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">Executive Facial System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto sidenav" id="navAccordion">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fa-solid fa-house mr-2"></i> <span>Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fa-solid fa-book mr-2"></i> <span>Booked</span> 
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fa-solid fa-key mr-2"></i> <span>Reservation</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fa-solid fa-right-to-bracket mr-2"></i> <span>Check Out</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fa-solid fa-list mr-2"></i> <span>Services Offer</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fa-solid fa-bed mr-2"></i> <span>Products Offer</span>
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