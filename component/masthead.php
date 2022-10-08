<header class="masthead">
    <div class="container h-100">
        <div class="row text-center  h-100 align-items-center justify-content-center">
            <div class="wrapper col-12 py-4 align-self-end mb-5">
                <h1 class="text-uppercase text-black font-weight-bold">
                <?php
                    $page = isset($_GET['page']) && !empty($_GET['page']) ? $_GET['page'] : "home";
                    echo strtoupper($page);
                ?>
                </h1>
            </div>

        </div>
    </div>
</header>
</header>