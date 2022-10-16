<?php
    include('../../db_connect.php');
    $_products = $conn->query("SELECT * from products WHERE id = ".$_GET['products_id']);
    if($_products->num_rows > 0){
        foreach($_products->fetch_array() as $k => $val){
            $meta[$k] = $val;
        }
    }
?>

<form id="frm_products_edit">
    <div class="modal-body">
        <input type="hidden" name="id" value="<?php echo $meta['id']?>">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">Product Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" required value="<?php echo $meta['name']?>" aria-describedby="helpId" placeholder="">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">Price (₱) <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="price" required value="<?php echo $meta['price']?>" aria-describedby="helpId" placeholder="">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">Description <small class="text-muted">(Optional)</small> </label>
                    <textarea name="description" class="form-control" cols="30" rows="10"><?php echo $meta['description']?></textarea>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">Category</label>
                    <select name="category_id" class="form-control" required>
                        <?php
                            $_categories_qry = $conn->query("
                                    SELECT 
                                        *
                                    FROM 
                                        categories 
                                    ORDER BY 
                                        name ASC
                                ");
                            while( $row = $_categories_qry->fetch_assoc()):
                        ?> 
                            <option value="<?php echo $row['id']?>" <?php echo $row['id'] == $meta['category_id'] ? 'selected':''?> ><?php echo strtoupper($row['name'])?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">Availability</label>
                    <select class="form-control" name="status" required >
                        <option value="0" <?php echo $meta['status'] == '0' ? 'selected':''?> >Available</option>
                        <option value="1" <?php echo $meta['status'] == '1' ? 'selected':''?> >Unavailable</option>
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
