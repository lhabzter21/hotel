<form id="frm_customer_add">
    <div class="modal-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">First Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" onkeypress="return /[a-z]/i.test(event.key)" name="fname" id="first_name_add" required aria-describedby="helpId" placeholder="">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">Last Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" onkeypress="return /[a-z]/i.test(event.key)"name="lname" required placeholder="">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">Username <span class="text-danger">*</span></label>
                    <input type="text" minlength="4" class="form-control" name="username" required placeholder="">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">Password <span class="text-danger">*</span></label>
                    <input type="password" minlength="6" class="form-control" name="password" required placeholder="">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">Contact No. <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="contact_num" required placeholder="">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="email" required placeholder="">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">Gender</label>
                    <select class="form-control" name="gender" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">Upload Profile image <span class="text-danger">*</span></label>
                    <input type="file" name="image" class="form-control" accept="image/x-png,image/gif,image/jpeg" required>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">Address <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="address" id="address_add" required cols="30" rows="5"></textarea>
                </div>
            </div>
            <div class="col-sm-12">
                <hr class="my-3">
                <button class="btn btn-success" type="submit">Add</button>
                <button class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</form>
