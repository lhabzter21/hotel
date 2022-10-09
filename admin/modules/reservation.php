<div class="container-fluid content-body-custom main-panel-custom" id="reservation_content">
    <h1 class="text-success">Appointment Reservation</h1>
    <hr class="mb-5"/>

    <table class="table table-bordered tbl-reservation table-hover">
        <thead>
            <th>#</th>
            <th>Room Category</th>
            <th>Room No.</th>
            <th>Room Price</th>
            <th>Status</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php 
                include('db_connect.php'); 
                $i = 1;
                $checked = $conn->query("
                    SELECT 
                        r.id as room_id,
                        r.room,
                        r.status as room_status,
                        rc.name as room_category,
                        rc.price as room_price
                    FROM 
                        rooms as r
                    INNER JOIN 
                        room_categories as rc 
                    ON 
                        r.category_id = rc.id
                    ORDER BY r.id ASC;
                ");

                while( $row = $checked->fetch_assoc()):
            ?>
                <tr>
                    <td class="text-center"><?php echo $i++ ?></td>
                    <td class="text-center"><?php echo $row['room_category'] ?></td>
                    <td class=""><?php echo $row['room'] ?></td>
                    <td class="">$<?php echo $row['room_price'] ?></td>
                    <td class="text-center">
                        <span class="badge <?php echo $row['room_status'] == '1' ? 'badge-success':'badge-warning' ?> "><?php echo $row['room_status'] == '1' ? 'Available':'Unavailable' ?></span>
                    </td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary" <?php echo $row['room_status'] == '1' ? '':'disabled' ?> type="button" data-id="<?php echo $row['room_id'] ?>">Reserve</button>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>