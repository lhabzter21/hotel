<div class="container-fluid content-body-custom main-panel-custom" id="services_content">
    <h1 class="text-success">Services Offer</h1>
    <hr class="mb-5"/>

    <div class="row">
        <div class="col-lg-4 col-md-12 mb-3">
            <div class="card">
                <div class="card-header">
                    Service Form
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Service Name <span class="text-danger">*</span></label>
                        <input type="text"  class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Price (₱) <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Upload Image</label>
                        <input type="file"  class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-success">Add Record</button>
                </div>
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
                                                $src = '../ext/img/img_placeholder.png';
                                            }
                                        ?>

                                        <img class="img-fluid img-custom"  src="<?php echo $src;?>" alt="image">
                                    </td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td>₱<?php echo $row['price'] ?></td>
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