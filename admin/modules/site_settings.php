<div class="container-fluid content-body-custom main-panel-custom" id="site_setting_content">
    <h1 class="text-success">Site Settings</h1>
    <hr class="mb-5"/>

    <?php
        $qry = $conn->query("SELECT * from system_settings limit 1");
        if($qry->num_rows > 0){
            foreach($qry->fetch_array() as $k => $val){
                $meta[$k] = $val;
            }
        }
    ?>

    <div class="card">
        <form action="" id="frm_site_settings">
            <div class="card-header">
                Change Settings
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Hotel Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="hotel_name" value="<?php echo isset($meta['hotel_name']) ? $meta['hotel_name'] : '' ?>" placeholder="" required>
                </div>
                <div class="form-group">
                    <label for="">Hotel Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="email" value="<?php echo isset($meta['email']) ? $meta['email'] : '' ?>" placeholder="" required>
                </div>
                <div class="form-group">
                    <label for="">Hotel Contact <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="contact" value="<?php echo isset($meta['contact']) ? $meta['contact'] : '' ?>" placeholder="" required>
                </div>
                <div class="form-group">
                    <label for="" class="mb-2">Hotel About Content <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="txt-editor" required><?php echo isset($meta['about_content']) ? $meta['about_content'] : '' ?></textarea>
                </div>
                <div class="form-group mt-4">
                    <label for="">Upload Image <span class="text-danger">*</span></label>
                    <input type="file" class="form-control" name="cover_img" placeholder="" required>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary">Save Settings</button>
            </div>
        </form>
    </div>
</div>