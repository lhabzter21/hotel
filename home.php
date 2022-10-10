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
                <div class="row">
                    <div class="col-md-8">
                        <label for="" class="mb-2">Apointment Date</label>
                        <input type="text" class="form-control input-lg" id="range_date">
                    </div>
                    <div class="col-md-4">
                        <label for="" class="mb-2">&nbsp;</label>
                        <button class="btn btn-primary btn-block btn-orange" id="btn_check_sched">Check Schedule</button>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
<?php } ?>