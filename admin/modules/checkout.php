<div class="container-fluid content-body-custom main-panel-custom" id="checkout_content">
    <h1 class="text-success">Check Out</h1>
    <hr class="mb-5"/>

    <table class="table table-bordered tbl-checkout table-hover">
        <thead>
            <th>#</th>
            <th>Room Category</th>
            <th>Room No.</th>
            <th>Room Price</th>
            <th>Check In</th>
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
                        c.contact_no,
                        c.status as checked_status,
                        c.name as checked_in_name,
                        rc.name as room_category,
                        rc.price as room_price,
                        rc.id as room_cat_id,
                        r.room as room_num
                    FROM 
                        checked as c 
                    INNER JOIN 
                        room_categories as rc 
                    ON 
                        c.booked_cid = rc.id 
                    INNER JOIN 
                        rooms as r 
                    ON 
                        c.room_id = r.id 
                    WHERE 
                        c.status != 0
                    ORDER BY c.status DESC, c.id ASC;
                ");

                while( $row = $checked->fetch_assoc()):
            ?>
                <tr>
                    <td class="text-center"><?php echo $i++ ?></td>
                    <td class="text-center"><?php echo $row['room_category'] ?></td>
                    <td class=""><?php echo $row['room_num'] ?></td>
                    <td class="">$<?php echo $row['room_price'] ?></td>
                    <td class=""><?php echo $row['checked_in_name'] ?></td>
                    <td class="text-center">
                        <span class="badge <?php echo $row['checked_status'] == '1' ? 'badge-warning':'badge-success' ?> "><?php echo $row['checked_status'] == '1' ? 'Checked In':'Checked Out' ?></span>
                    </td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-view-details-checkout" type="button">View Details</button>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>