<!DOCTYPE html>
<html lang="en">

<?php include('components/header.php');?>

<style>
    .card-custom { margin-top: 5vh;}

    .banner { display: none; }

    @media (min-width: 992px) { 
        .card-custom { margin-top: vh; }
        .banner {  display: block; }
    }

    input.form-control, select.form-control, textarea.form-control {
        margin-top: 6px !important;
        margin-bottom: 20px !important;
    }
</style>

<body>
    <div class="row">
        <div class="col-lg-7 banner">
            <img src="../ext/img/1664437680_treatment 2.jpg" class="img-fluid" alt="banner">
        </div>
        <div class="col-lg-5 col-md-12 col-sm-12">
            <div class="container">
                <div class="card card-custom">
                    <div class="card-body">

                        <h2 class="text-primary">Registration</h2>
                        <hr class="mb-5"/>

                        <form id="reg_form">
                            <div class="form-group">
                                <label for="">First Name <span class="text-danger">*</span></label>
                                <input type="text" name="fname" id="fname" class="form-control" placeholder="" aria-describedby="validation_fname">
                                <div id="validation_fname" class="invalid-feedback">
                                    Please provide a first name.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Last name <span class="text-danger">*</span></label>
                                <input type="text" name="lname" id="lname" class="form-control" placeholder="" aria-describedby="validation_lname">
                                <div id="validation_lname" class="invalid-feedback">
                                    Please provide a last name.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Password <span class="text-danger">*</span></label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="" aria-describedby="validation_password">
                                <div id="validation_password" class="invalid-feedback">
                                    Please provide a password.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Contact Number <span class="text-danger">*</span></label>
                                <input type="number" name="contact_num" id="contact_num" class="form-control" placeholder="" aria-describedby="validation_contact_num">
                                <div id="validation_contact_num" class="invalid-feedback">
                                    Please provide a Contact number.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Email <span class="text-danger">*</span></label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="" aria-describedby="validation_email">
                                <div id="validation_email" class="invalid-feedback">
                                    Please provide an email address.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Gender <span class="text-danger">*</span></label>
                                <select name="gender" class="form-control" id="gender" aria-describedby="validation_gender">
                                    <option value=""></option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                <div id="validation_gender" class="invalid-feedback">
                                    Please provide an gender.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Address <span class="text-danger">*</span></label>
                                <textarea name="address" id="address" class="form-control" cols="30" rows="10" aria-describedby="validation_address"></textarea>
                                <div id="validation_address" class="invalid-feedback">
                                    Please provide an address.
                                </div>
                            </div>
                            

                            <button type="button" id="btnRegister" class="btn btn-success btn-block mt-5">Register</button>
                        </form>
                        
                        <hr class="my-4"/>

                        Already have an account? <a class="btn btn-outline-primary" href="index.php">Login Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php include('components/footer.php');?>

<script>

    function validateEmail(input) {
        var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        return input.value.match(validRegex) ? true:false;
    }

    $("#btnRegister").click(function(){


        if($("#email").val() != '') {
            let chk = !validateEmail(document.getElementById('email'));

            console.log(chk)
            if(chk) {
                $("#email").addClass('is-invalid')
                $("#validation_email").text('Invalid email')
                return false;
            }
        }

        $.ajax({
			url:'ajax.php?action=register',
			method:'POST',
			data:$("#reg_form").serialize(),
			error:err=>{
				console.log(err)

			},
			success:function(res){
				let response = JSON.parse(res);

                // if missing data response
                if(response.success === 0) {
                    let errors = response.data;

                    // remove css 'is-invalid'
                    $("#reg_form").find('.form-control').each(function(){
                        $(this).removeClass('is-invalid');
                    })

                    for(let i = 0; i < errors.length; i++) {
                        $("#"+ errors[i]).addClass('is-invalid')
                    }
                }

                // if no data missing response
                if(response.success === 1) {

                    // remove css 'is-invalid' and clear inputs
                    $("#reg_form").find('.form-control').each(function(){
                        $(this).removeClass('is-invalid');
                        $(this).val('');
                    })

                    $.notify('Successfully Created', 'success');
                }
			}
		})
    })
</script>

</html>