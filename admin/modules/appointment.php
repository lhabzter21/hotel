<div class="container-fluid content-body-custom main-panel-custom" id="reservation_content">
    <h1 class="text-success">Appointment List</h1>
    <hr class="mb-3"/>

    <button class="btn btn-success btn-add-appointment">
        <i class="fa-solid fa-plus"></i> Add record
    </button>
    <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#filterCollapseAppointment" aria-expanded="false" aria-controls="filterCollapseAppointment">
        <i class="fa fa-filter" ></i> Filters
    </button>

    <div class="collapse my-4" id="filterCollapseAppointment">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Status</label>
                    <select class="form-control" name="app_status_filter" id="app_status_filter">
                        <option value="">All</option>
                        <option value="0">Pending</option>
                        <option value="1">On going</option>
                        <option value="2">Done</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Services</label>
                    <select name="app_services_filter" id="app_services_filter" class="form-control" required>
                        <option value="">All</option>
                        <?php
                            $qry_appointment_services_filter = $conn->query("
                                    SELECT 
                                        *
                                    FROM 
                                        services 
                                    ORDER BY 
                                        name ASC
                                ");
                            while( $row = $qry_appointment_services_filter->fetch_assoc()):
                        ?> 
                            <option value="<?php echo $row['id']?>"><?php echo strtoupper($row['name'])?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Appointment Date</label>
                    <input type="date" class="form-control" name="app_date_filter" id="app_date_filter" aria-describedby="helpId" placeholder="">
                </div>
            </div>
        </div>
    </div>

    <table class="table tbl-reservation table-hover">
        <thead class="bg-info text-white">
            <th>#</th>
            <th>Appointment Date</th>
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