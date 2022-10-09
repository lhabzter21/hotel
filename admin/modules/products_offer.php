<div class="container-fluid content-body-custom main-panel-custom" id="products_content">
    <h1 class="text-success">Products Offer</h1>
    <hr class="mb-5"/>

    <div class="row">
        <div class="col-lg-4 col-md-12 mb-3">
            <div class="card">
                <div class="card-header">
                    Products Form
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Products Offer</label>
                        <input type="text"  class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Category</label>
                        <select name="" id="" class="form-control">
                            <?php
                                $cat = $conn->query("SELECT * FROM room_categories order by name asc ");
                                while($row= $cat->fetch_assoc()) {
                                    $cat_name[$row['id']] = $row['name'];
                            ?>
                                <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Availability</label>
                        <select class="form-control" name="" id="">
                            <option value="0">Available</option>
						    <option value="1">Unavailable</option>
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>

        <div class="col-lg-8 col-md-12">
            <div class="card">
                <div class="card-header">
                    List of Products Offer
                </div>
                <div class="card-body">
                    <table class="table tbl-products-offer table-hover">
                        <thead class="bg-info text-white">
                            <th>#</th>
                            <th>Category</th>
                            <th>Products</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php 
                                $i = 1;
                                $checked = $conn->query("
                                    SELECT 
                                        r.room as products,
                                        r.status as room_status,
                                        rc.name as room_category
                                    FROM 
                                        rooms as r 
                                    INNER JOIN 
                                        room_categories as rc
                                    ON 
                                        r.category_id = rc.id
                                    ORDER BY 
                                        r.id DESC
                                ");

                                while( $row = $checked->fetch_assoc()):
                            ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $row['room_category'] ?></td>
                                    <td><?php echo $row['products'] ?></td>
                                    <td>
                                        <?php 
                                            echo $row['room_status'] == 0 ? '<span class="badge badge-success">Available</span>':'<span class="badge badge-secondary">Unavailable</span>';
                                        ?>
                                    </td>
                                    <td>
                                        <button class="btn btn-primary">Edit</button>
                                        <button class="btn btn-danger">Delete</button>
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