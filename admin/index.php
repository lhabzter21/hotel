<!DOCTYPE html>
<html lang="en">

<?php include('header.php');?>

<style>
    .card-custom {
        margin-top: 25vh;
    }
    body { overflow: hidden !important; }
</style>

<body>
    <div class="row">
        <div class="col-md-7 d-sm-none d-md-block">
            <img src="../ext/img/1664437680_treatment 2.jpg" class="img-fluid" alt="banner">
        </div>
        <div class="col-md-5 col-sm-12">
            <div class="container">
                <div class="card card-custom">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="username" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="text" name="password" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>

                        <button type="submit" class="btn btn-primary btn-block mt-5">Login</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php include('footer.php');?>

</html>