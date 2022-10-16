<div class="container-fluid content-body-custom main-panel-custom" id="reservation_content">
    <h1 class="text-success">Appointment List</h1>
    <hr class="mb-3"/>

    <button class="btn btn-success btn-add-appointment">
        <i class="fa-solid fa-plus"></i> Add record
    </button>

    <table class="table tbl-reservation table-hover">
        <thead class="bg-info text-white">
            <th>#</th>
            <th>Appointment Date</th>
            <th>From</th>
            <th>To</th>
            <th>Services</th>
            <th>Customer Name</th>
            <th>Status</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php 
                $i = 1;
                $checked = $conn->query("
                    SELECT 
                        a.id as appointment_id,
                        a.status, 
                        a.from_time, 
                        a.to_time, 
                        a.appointment_date,
                        s.name as service_name,
                        c.first_name,
                        c.last_name
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
                    <td><?php echo date("M d, Y",strtotime($row['appointment_date'])) ?></td>
                    <td><?php echo date("h:i A",strtotime($row['from_time'])) ?></td>
                    <td><?php echo date("h:i A",strtotime($row['to_time'])) ?></td>
                    <td><?php echo $row['service_name'] ?></td>
                    <td><?php echo $row['first_name'] .' '.$row['last_name'] ?></td>
                    <td>
                        <?php 
                            if($row['status'] == 0) {
                                echo '<span class="badge badge-warning">Pending</span>';
                            } else if($row['status'] == 1) {
                                echo '<span class="badge badge-primary">On Going</span>';
                            } else {
                                echo '<span class="badge badge-success">Done</span>';
                            }
                        ?>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-primary btn-edit-appointment" data-id="<?php echo $row['appointment_id'] ?>">Edit</button>
                        <button class="btn btn-sm btn-danger btn-delete-appointment" data-id="<?php echo $row['appointment_id'] ?>">Delete</button>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>