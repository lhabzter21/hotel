<?php
    include('../../db_connect.php');
    $_users = $conn->query("SELECT * from users WHERE id = ".$_GET['user_id']);
    if($_users->num_rows > 0){
        foreach($_users->fetch_array() as $k => $val){
            $meta[$k] = $val;
        }
    }
?>

<form id="frm_user_edit">
    <div class="modal-body">
        <input type="hidden" name="id" value="<?php echo $meta['id']?>">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name"  value="<?php echo $meta['name']?>" required placeholder="">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">Username <span class="text-danger">*</span></label>
                    <input type="text" minlength="4" class="form-control" name="username" value="<?php echo $meta['username']?>" required placeholder="">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">New Password</label>
                    <input type="password" minlength="6" class="form-control" name="password" placeholder="">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">Type</label>
                    <select name="type" class="form-control" required>
                        <option value="1" <?php echo $meta['type'] == 1 ? 'selected':'' ?> >Admin</option>
                        <option value="2" <?php echo $meta['type'] == 2 ? 'selected':'' ?> >Staff</option>
                    </select>
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