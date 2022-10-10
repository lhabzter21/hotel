<div class="container-fluid content-body-custom main-panel-custom" id="reservation_content">
    <h1 class="text-success">Appointment List</h1>
    <hr class="mb-5"/>

    <table class="table tbl-reservation table-hover">
        <thead class="bg-info text-white">
            <th>#</th>
            <th>Appointment Date</th>
            <th>Services</th>
            <th>Customer Name</th>
            <th>Gender</th>
            <th>Status</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php 
                $i = 1;
                $checked = $conn->query("
                    SELECT 
                        a.status, 
                        a.appointment_date,
                        s.name as service_name,
                        c.first_name,
                        c.last_name,
                        c.gender
                    FROM 
                        appointments as a 
                    INNER JOIN 
                        customers as c 
                    ON 
                        a.customer_id = c.id 
                    INNER JOIN 
                        services as s 
                    ON 
                        a.services_id = s.id
                    ORDER BY 
                        a.id DESC
                ");

                while( $row = $checked->fetch_assoc()):
            ?>
                <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo date("M d, Y h:i A",strtotime($row['appointment_date'])) ?></td>
                    <td><?php echo $row['service_name'] ?></td>
                    <td><?php echo $row['first_name'] .' '.$row['last_name'] ?></td>
                    <td><?php echo $row['gender'] ?></td>
                    <td>
                        <?php 
                            if($row['status'] == 0) {
                                echo '<span class="badge badge-warning">Waiting</span>';
                            } else if($row['status'] == 1) {
                                echo '<span class="badge badge-primary">On Going</span>';
                            } else {
                                echo '<span class="badge badge-success">Done</span>';
                            }
                        ?>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-success">Reserve</button>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>