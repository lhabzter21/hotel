<div class="container-fluid content-body-custom main-panel-custom" id="site_setting_content">
    <h1 class="text-success">Site Settings</h1>
    <hr class="mb-5"/>

    <?php
        $_site_settings = $conn->query("SELECT * from system_settings limit 1");
        if($_site_settings->num_rows > 0){
            foreach($_site_settings->fetch_array() as $k => $val){
                $meta[$k] = $val;
            }
        }
    ?>

    <div class="card">
        <form action="" id="frm_site_settings">
            <input type="hidden" name="id" value="<?php echo $meta['id']?>">
            <div class="card-header">
                Change Settings
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Hotel Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" minlength="4" name="hotel_name" value="<?php echo isset($meta['hotel_name']) ? $meta['hotel_name'] : '' ?>" placeholder="" required>
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
                    <textarea class="form-control" name="about_content" id="txt-editor" required><?php echo isset($meta['about_content']) ? $meta['about_content'] : '' ?></textarea>
                </div>
                <div class="form-group mt-4">
                    <label for="">Upload New Image Cover</label>
                    <input type="file" class="form-control" name="image" accept="image/x-png,image/gif,image/jpeg">
                </div>
                <img class="img-fluid my-4" style="height: 300px; width: 500px;" src="uploads/cover_photo/<?php echo isset($meta['cover_img']) ? $meta['cover_img']:'default.jpg'?>" alt="">
            </div>
            <div class="card-footer">
                <button class="btn btn-primary" type="submit">Save Settings</button>
            </div>
        </form>
    </div>
</div>