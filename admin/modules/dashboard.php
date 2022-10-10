<div class="container-fluid content-body-custom main-panel-custom" id="home_content">
    <h1 class="text-success">Dashboard</h1>
    <hr class="mb-5"/>

    <?php 
        $appointments = $conn->query("SELECT * FROM appointments");
        $products = $conn->query("SELECT * FROM products WHERE status = 0");
    ?>

    <div class="row">
        <div class="col-lg-6 col-md-12 my-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <i class="fa-solid fa-calendar-days fa-5x float-right"></i> 
                    <h1 class="font-weight-bold">Appointment</h1>
                    <h1 class="display-3 "><?php echo mysqli_num_rows($appointments); ?></h1>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 my-3">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <i class="fa-solid fa-star fa-5x float-right"></i> 
                    <h1 class="font-weight-bold">Available Products</h1>
                    <h1 class="display-3 "><?php echo mysqli_num_rows($products); ?></h1>
                </div>
            </div>
        </div>
    </div>

    <hr class="my-5"/>

    <div id="booked_graph" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
</div>
