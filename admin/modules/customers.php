<div class="container-fluid content-body-custom main-panel-custom" id="booked_content">
    <h1 class="text-success">Customer List</h1>
    <hr class="mb-5"/>

    <button class="btn btn-success btn-add-customer">
        <i class="fa-solid fa-plus"></i> Add record
    </button>

    <table class="table tbl-booked table-hover">
        <thead class="bg-info text-white">
            <th>#</th>
            <th>Profile</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Username</th>
            <th>Date Registered</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php 
                $i = 1;
                $checked = $conn->query("
                    SELECT 
                        *
                    FROM 
                        customers 
                    WHERE 
                        deleted_at IS NULL
                    ORDER BY id DESC;
                ");

                while( $row = $checked->fetch_assoc()):
            ?>
                <tr>
                    <td><?php echo $i++ ?></td>
                    <td>
                        <?php
                            if (file_exists('uploads/profiles/'.$row['profile_img']) && $row['profile_img'] != '') {
                                $src = 'uploads/profiles/'.$row['profile_img'];
                            } else {
                                $src = 'uploads/img_placeholder.png';
                            }
                        ?>

                        <img class="img-fluid img-custom"  src="<?php echo $src;?>" alt="image">
                    </td>
                    <td><?php echo $row['first_name'] ?></td>
                    <td><?php echo $row['last_name'] ?></td>
                    <td><?php echo $row['username'] ?></td>
                    <td><?php echo $row['created_at'] ?></td>
                    <td>
                        <button class="btn btn-sm btn-primary btn-edit-customer" data-id="<?php echo $row['id']?>">Edit</button>
                        <button class="btn btn-sm btn-danger btn-delete-customer" data-id="<?php echo $row['id']?>" data-img="<?php echo $row['profile_img']?>">Delete</button>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</div>