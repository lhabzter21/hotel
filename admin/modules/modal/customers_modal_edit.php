<?php
    include('../../db_connect.php');
    $customers = $conn->query("SELECT * from customers WHERE id = ".$_GET['customer_id']);
    if($customers->num_rows > 0){
        foreach($customers->fetch_array() as $k => $val){
            $row[$k] = $val;
        }
    }
?>

<form id="frm_customer">
    <div class="modal-body">
        <input type="hidden" name="id" value="<?php echo $row['id']?>">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">First Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="first_name" onkeypress="return /[a-z]/i.test(event.key)" required value="<?php echo $row['first_name']?>" aria-describedby="helpId" placeholder="">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">Last Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="last_name" onkeypress="return /[a-z]/i.test(event.key)" required value="<?php echo $row['last_name']?>" aria-describedby="helpId" placeholder="">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">Username <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="username" minlength="4" required value="<?php echo $row['username']?>" aria-describedby="helpId" placeholder="">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" name="password" minlength="6" required value="<?php echo $row['password']?>" aria-describedby="helpId" placeholder="">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">Contact No. <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="contact_num" required value="<?php echo $row['contact_num']?>" aria-describedby="helpId" placeholder="">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="email" required value="<?php echo $row['email']?>" aria-describedby="helpId" placeholder="">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">Gender</label>
                    <select class="form-control" name="gender" required>
                        <option value="Male" <?php echo $row['gender'] == 'Male' ? 'Selected':''?>>Male</option>
                        <option value="Female" <?php echo $row['gender'] == 'Female' ? 'Selected':''?>>Female</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">Upload New Profile image</label>
                    <input type="file" name="image" class="form-control" accept="image/x-png,image/gif,image/jpeg">
                    <input type="hidden" name="profile_img" value="<?php echo $row['profile_img']?>">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">Address <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="address" required cols="30" rows="5"><?php echo $row['address']?></textarea>
                </div>
            </div>
            <div class="col-sm-12">
                <hr class="my-3">
                <button class="btn btn-primary" type="submit">Update</button>
                <button class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</form>
