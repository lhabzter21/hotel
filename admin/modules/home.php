<div class="container-fluid content-body-custom main-panel-custom" id="home_content">
    <h1 class="text-success">Dashboard</h1>
    <hr class="mb-5"/>

    <?php 
        $checked_in = $conn->query("SELECT * FROM checked WHERE status = 1");
        $checked_out = $conn->query("SELECT * FROM checked WHERE status = 2");
        $available_rooms = $conn->query("SELECT * FROM rooms WHERE status = 0");
    ?>

    <div class="row">
        <div class="col-lg-4 col-md-12 my-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <i class="fa-solid fa-calendar-days fa-5x float-right"></i> 
                    <h1 class="font-weight-bold">Check In</h1>
                    <h1 class="display-3 "><?php echo mysqli_num_rows($checked_in); ?></h1>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 my-3">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <i class="fa-solid fa-circle-up fa-5x float-right"></i> 
                    <h1 class="font-weight-bold">Check Out</h1>
                    <h1 class="display-3 "><?php echo mysqli_num_rows($checked_out); ?></h1>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 my-3">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <i class="fa-solid fa-bed fa-5x float-right"></i> 
                    <h1 class="font-weight-bold">Room Available</h1>
                    <h1 class="display-3 "><?php echo mysqli_num_rows($available_rooms); ?></h1>
                </div>
            </div>
        </div>
    </div>

    <hr class="my-5"/>

    <div id="booked_graph" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
</div>