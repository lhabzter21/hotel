<div class="container-fluid content-body-custom main-panel-custom" id="services_content">
    <h1 class="text-success">Services Offer</h1>
    <hr class="mb-5"/>

    <div class="row">
        <div class="col-lg-4 col-md-12 mb-3">
            <div class="card">
                <form id="frm_services_add">
                    <div class="card-header">
                        Service Form
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Service Name <span class="text-danger">*</span></label>
                            <input type="text"  class="form-control" name="name" required placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">Category <span class="text-danger">*</span></label>
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
                                    <option value="<?php echo $row['id']?>"><?php echo strtoupper($row['name'])?></option>
                                <?php endwhile; ?>
                            </select>
                                </div>
                        <div class="form-group">
                            <label for="">Price (₱) <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="price" required placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">Description <small class="text-muted">(Optional)</small></label>
                            <textarea name="description" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Upload Image</label>
                            <input type="file"  class="form-control" name="image" placeholder="" accept="image/x-png,image/gif,image/jpeg">
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
                    List of Services Offer
                </div>
                <div class="card-body">
                    <table class="table tbl-services-offer table-hover">
                        <thead class="bg-info text-white">
                            <th>#</th>
                            <th>Img</th>
                            <th>Services</th>
                            <th>Price</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php 
                                $i = 1;
                                $checked = $conn->query("
                                    SELECT 
                                        * 
                                    FROM 
                                        services 
                                    ORDER BY 
                                        id DESC
                                ");

                                while( $row = $checked->fetch_assoc()):
                            ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td>
                                        <?php
                                            if (file_exists('uploads/'.$row['img_path']) && $row['img_path'] != '') {
                                                $src = 'uploads/'.$row['img_path'];
                                            } else {
                                                $src = 'uploads/img_placeholder.png';
                                            }
                                        ?>

                                        <img class="img-fluid img-custom"  src="<?php echo $src;?>" alt="image">
                                    </td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td>₱<?php echo $row['price'] ?></td>
                                    <td>
                                        <button class="btn btn-primary btn-services-edit" data-id="<?php echo $row['id'] ?>" >Edit</button>
                                        <button class="btn btn-danger btn-services-delete" data-id="<?php echo $row['id'] ?>" data-img="<?php echo $row['img_path'] ?>" >Delete</button>
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