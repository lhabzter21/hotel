<div class="container-fluid content-body-custom main-panel-custom" id="booked_content">
    <h1 class="text-success">Booked</h1>
    <hr class="mb-5"/>

    <table class="table table-bordered tbl-booked table-hover">
        <thead>
            <th>#</th>
            <th>Room Category</th>
            <th>Checked In</th>
            <th>Reference No.</th>
            <th>Status</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php 
                include('db_connect.php'); 
                $i = 1;
                $checked = $conn->query("
                    SELECT 
                        c.id as checked_id,
                        c.ref_no,
                        c.name as checked_in_name,
                        rc.name as room_name,
                        rc.id as room_cat_id
                    FROM 
                        checked as c 
                    INNER JOIN 
                        room_categories as rc 
                    ON 
                        c.booked_cid = rc.id
                    WHERE 
                        c.status = 0 
                    ORDER BY c.status DESC, c.id ASC;
                ");

                while( $row = $checked->fetch_assoc()):
            ?>
                <tr>
                    <td class="text-center"><?php echo $i++ ?></td>
                    <td class="text-center"><?php echo $row['room_name'] ?></td>
                    <td class="text-center"><?php echo $row['checked_in_name'] ?></td>
                    <td class=""><?php echo $row['ref_no'] ?></td>
                        <td class="text-center"><span class="badge badge-warning">Booked</span></td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary check_out" type="button" data-id="<?php echo $row['checked_id'] ?>">View</button>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</div>