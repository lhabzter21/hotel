<?php include('component/masthead.php'); ?>

<section class="p-5">
    <div class="container my-5">
        <?php echo isset($_SESSION['setting_about_content']) ? html_entity_decode($_SESSION['setting_about_content']):''?>
    </div>
</section>

<section class="bg-light-gray py-5">
    <div class="container">
        <div class="box">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="" class="mb-3">Email <span class="text-danger">*</span></label>
                        <input type="text" class="form-control mb-4" name="" id="" aria-describedby="helpId" placeholder="">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="" class="mb-3">Comment <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="" id="" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="col-sm-12 mt-5">
                    <button class="btn btn-block btn-lg btn-primary btn-orange">Submit</button>
                </div>
            </div>
        </div>
    </div>
</section>