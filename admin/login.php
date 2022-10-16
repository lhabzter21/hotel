<!DOCTYPE html>
<html lang="en">

<?php include('components/header.php');?>

<style>
    .card-custom { margin-top: 5vh;}

    .banner { display: none; }

    @media (min-width: 768px) { 
        .card-custom { margin-top: 10vh; }
        .banner {  display: block; }
        body { overflow: scroll; }
    }

    body { overflow: hidden !important; }

    input.form-control, select.form-control, textarea.form-control {
        margin-top: 6px !important;
        margin-bottom: 20px !important;
    }
</style>


<?php
    include('db_connect.php');
    if(isset($_SESSION['login_id']))
    header("Location: index.php");
?>

<body>
    <div class="row">
        <div class="col-md-7 banner">
            <img src="../ext/img/1664437680_treatment 2.jpg" class="img-fluid" alt="banner">
        </div>
        <div class="col-md-5 col-sm-12">
            <div class="container">
                <div class="card card-custom">
                    <div class="card-body">
                        <h2 class="text-center">
                            <a class="btn btn-link" href="../index.php"><?php echo isset($_SESSION['setting_hotel_name']) ? $_SESSION['setting_hotel_name']:'Company Name'; ?> | Login</a>
                        </h2>
                        <hr class="mb-5"/>
                        <form id="login-form" >
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="" required>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block mt-5">Login</button>
                        </form>
                    
                        <hr class="my-4"/>

                        Don't have an account? <a href="signup.php"class="btn btn-outline-success">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php include('components/footer.php');?>

<script>

    $('#login-form').submit(function(e){
		e.preventDefault()

		$('#login-form button[type="button"]').attr('disabled',true).text('Logging in...');

		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url: 'ajax.php?action=login',
			method: 'POST',
			data: $(this).serialize(),
			error: err=>{
		        $('#login-form button[type="button"]').removeAttr('disabled').html('Login');

			},
			success: function(res){

                console.log(res)
				if(res == 1 || res == 2){
					location.href ='index.php';
				} else if(res == 3) {
                    location.href ='../index.php';
                }else{
					$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
					$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
</script>

</html>