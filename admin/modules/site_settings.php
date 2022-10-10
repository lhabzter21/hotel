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
        <div class="card-header">
            Change Settings
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="">Hotel Name</label>
                <input type="text" class="form-control" name="" id="" value="<?php echo isset($meta['hotel_name']) ? $meta['hotel_name'] : '' ?>" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Hotel Email</label>
                <input type="text" class="form-control" name="" id="" value="<?php echo isset($meta['email']) ? $meta['email'] : '' ?>" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Hotel Contact</label>
                <input type="text" class="form-control" name="" id="" value="<?php echo isset($meta['contact']) ? $meta['contact'] : '' ?>" placeholder="">
            </div>
            <div class="form-group">
                <label for="" class="mb-2">Hotel About Content</label>
                <textarea class="form-control" id="txt-editor"><?php echo isset($meta['about_content']) ? $meta['about_content'] : '' ?></textarea>
            </div>
            <div class="form-group mt-4">
                <label for="">Upload Image</label>
                <input type="file" class="form-control" name="" id="" placeholder="">
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary">Save Settings</button>
        </div>
    </div>
</div>