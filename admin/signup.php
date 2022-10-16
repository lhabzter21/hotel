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

                        <form id="frm_signup_add">
                            <div class="form-group">
                                <label for="">First Name <span class="text-danger">*</span></label>
                                <input type="text" name="fname" onkeypress="return /[a-z]/i.test(event.key)" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label for="">Last name <span class="text-danger">*</span></label>
                                <input type="text" name="lname" onkeypress="return /[a-z]/i.test(event.key)" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label for="">Username <span class="text-danger">*</span></label>
                                <input type="text" name="username" minlength="4" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label for="">Password <span class="text-danger">*</span></label>
                                <input type="password" name="password" minlength="6" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label for="">Contact Number <span class="text-danger">*</span></label>
                                <input type="number" name="contact_num" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label for="">Email <span class="text-danger">*</span></label>
                                <input type="text" name="email" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label for="">Gender <span class="text-danger">*</span></label>
                                <select name="gender" class="form-control" required>
                                    <option value=""></option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Upload Profile image <span class="text-danger">*</span></label>
                                <input type="file" name="image" class="form-control" accept="image/x-png,image/gif,image/jpeg" required>
                            </div>
                            <div class="form-group">
                                <label for="">Address <span class="text-danger">*</span></label>
                                <textarea name="address" class="form-control" required cols="30" rows="10"></textarea>
                            </div>
                            

                            <button type="submit" class="btn btn-success btn-block mt-5">Register</button>
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

    $(document).on('submit', '#frm_signup_add', function(e) {
        e.preventDefault();

        $.ajax({
            method: 'POST',
            url: 'ajax.php?action=register',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            success: function(res) {
                if(res == 1) {
                    swal("Success!", "Successfully Registered!", "success");
                    setTimeout(function() {
                        location.reload();
                    },1000)
                } else {
                    swal("Invalid!", "Username already exist!", "error");
                }
            },
            error: function(res) {
                console.log(res)
            }
        })
    })

</script>

</html>