<div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://picsum.photos/700/700?random=1" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p class="mt-3">Some representative placeholder content for the first slide.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://picsum.photos/700/700?random=2" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p class="mt-3">Some representative placeholder content for the first slide.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://picsum.photos/700/700?random=3" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p class="mt-3">Some representative placeholder content for the first slide.</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </button>
</div>

<?php if(isset($_SESSION['login_id'])){?>
    <?php if($_SESSION['login_type'] == 3){?>
        <div class="container my-5 p-5">
            <div class="box">
                <form id="frm_set_appointment">
                    <input type="hidden" name="customer_id" value="<?php echo $_SESSION['login_id']?>">
                    <div class="row">
                        <div class="col-md-8">
                            <label for="" class="mb-2">Apointment Date</label>
                            <input type="date" name="appointment_date" id="date1" class="form-control" required>

                            <br/>

                            <label for="" class="mb-2">From</label>
                            <input type="time" min="09:00" max="18:00" name="from_time" class="form-control" required>

                            <br/>

                            <label for="" class="mb-2">To</label>
                            <input type="time" min="09:00" max="18:00" name="to_time" class="form-control" required>

                            <br/>

                            <label for="" class="mb-2">Services</label>
                            <select name="services_id" class="form-control" required>
                                <option value=""></option>
                                <?php
                                    $qry_appointment_services = $conn->query("
                                            SELECT 
                                                *
                                            FROM 
                                                services 
                                            ORDER BY 
                                                name ASC
                                        ");
                                    while( $row = $qry_appointment_services->fetch_assoc()):
                                ?> 
                                    <option value="<?php echo $row['id']?>"><?php echo strtoupper($row['name'])?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="" class="mb-2">&nbsp;</label>
                            <button class="btn btn-primary btn-block btn-orange" >Make an Appointment</button>
                        </div>
                    </div>
                </form>

                <div class="alert alert-info my-5">
                    <b>Note:</b> No available schedule on weekends and Open hours 9:00am to 6:00pm
                </div>

                <?php 
                    $my_app = $conn->query("SELECT * FROM appointments WHERE customer_id =".$_SESSION['login_id']." AND `status` = '0'");
                    while( $row = $my_app->fetch_assoc()):
                ?>

                    <div class="box mb-3 py-4">
                        <table width="100%">
                            <tr>
                                <td>
                                    <?php echo date("M d, Y",strtotime($row['appointment_date'])) . " From ". date("h:i A",strtotime($row['from_time'])) . " To ". date("h:i A",strtotime($row['to_time']))?>
                                </td>
                                <td class="text-right"><span class="badge badge-warning">Waiting</span></td>
                            </tr>
                        </table>
                    </div>

                <?php endwhile; ?>

            </div>
        </div>
    <?php } ?>
<?php } ?>