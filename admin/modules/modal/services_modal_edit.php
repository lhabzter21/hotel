<?php
    include('../../db_connect.php');
    $_services = $conn->query("SELECT * from services WHERE id = ".$_GET['services_id']);
    if($_services->num_rows > 0){
        foreach($_services->fetch_array() as $k => $val){
            $meta[$k] = $val;
        }
    }
?>

<form id="frm_services_edit">
    <div class="modal-body">
        <input type="hidden" name="id" value="<?php echo $meta['services_id']?>">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">Service Name</label>
                    <input type="text" class="form-control" name="name" required value="<?php echo $meta['name']?>" aria-describedby="helpId" placeholder="">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">Category</label>
                    <select name="category_id" class="form-control" required>
                        <?php
                            $categories_qry = $conn->query("
                                    SELECT 
                                        *
                                    FROM 
                                        categories 
                                    ORDER BY 
                                        name ASC
                                ");
                            while( $row = $categories_qry->fetch_assoc()):
                        ?> 
                            <option value="<?php echo $row['id']?>" <?php echo $row['id'] == $meta['category_id'] ? 'selected':''?> ><?php echo strtoupper($row['name'])?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">Price (₱)</label>
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
                    <label for="">Upload New Image</label>
                    <input type="file" class="form-control" name="image" aria-describedby="helpId" placeholder="">
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
