<div class="container-fluid content-body-custom main-panel-custom" id="products_content">
    <h1 class="text-success">Products Offer</h1>
    <hr class="mb-5"/>

    <div class="row">
        <div class="col-lg-4 col-md-12 mb-3">
            <div class="card">
                <form id="frm_products_add">
                    <div class="card-header">
                        Product Form
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Product Name <span class="text-danger">*</span></label>
                            <input type="text"  class="form-control" name="name" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="">Price (₱) <span class="text-danger">*</span></label>
                            <input type="number"  class="form-control" name="price" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="">Description <small class="text-muted">(Optional)</small> </label>
                            <textarea class="form-control" name="description" cols="30" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Category <span class="text-danger">*</span></label>
                            <select name="category_id" class="form-control" required>
                                <?php
                                    $cat = $conn->query("SELECT * FROM categories order by name asc ");
                                    while($row= $cat->fetch_assoc()) {
                                        $cat_name[$row['id']] = $row['name'];
                                ?>
                                    <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Availability <span class="text-danger">*</span></label>
                            <select class="form-control" name="status" required >
                                <option value="0">Available</option>
                                <option value="1">Unavailable</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-success" type="submit">Add Record</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-lg-8 col-md-12">
            <div class="card">
                <div class="card-header">
                    List of Products
                </div>
                <div class="card-body">
                    <table class="table tbl-products-offer table-hover">
                        <thead class="bg-info text-white">
                            <th>#</th>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php 
                                $i = 1;
                                $checked = $conn->query("
                                    SELECT 
                                        p.*,
                                        c.name as category_name
                                    FROM 
                                        products as p 
                                    INNER JOIN 
                                        categories as c
                                    ON 
                                        p.category_id = c.id
                                    ORDER BY 
                                        p.id DESC
                                ");

                                while( $row = $checked->fetch_assoc()):
                            ?>
                                <tr>
                                    <td class="align-middle"><?php echo $i++ ?></td>
                                    <td class="align-middle">
                                        <?php echo $row['name'] ?>
                                        <?php 
                                            if($row['description'] != '')
                                            echo '<br/><br/><small class="text-muted">Description: '.$row['description'].'</small>'
                                        ?>
                                        
                                    </td>
                                    <td class="align-middle">₱<?php echo $row['price'] ?></td>
                                    <td class="align-middle">
                                        <?php echo $row['status'] == 0 ? '<span class="badge badge-success">Available</span>':'<span class="badge badge-secondary">Not available</span>' ?>
                                    </td>
                                    <td>
                                        <button class="btn btn-primary btn-products-edit" data-id="<?php echo $row['id']?>" >Edit</button>
                                        <button class="btn btn-danger btn-products-delete" data-id="<?php echo $row['id']?>" >Delete</button>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>