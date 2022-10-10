<div class="container-fluid content-body-custom main-panel-custom" id="booked_content">
    <h1 class="text-success">Customer List</h1>
    <hr class="mb-5"/>

    <table class="table tbl-booked table-hover">
        <thead class="bg-info text-white">
            <th>#</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Username</th>
            <th>Contact No.</th>
            <th>Email</th>
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
                    ORDER BY id ASC;
                ");

                while( $row = $checked->fetch_assoc()):
            ?>
                <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $row['first_name'] ?></td>
                    <td><?php echo $row['last_name'] ?></td>
                    <td><?php echo $row['username'] ?></td>
                    <td><?php echo $row['contact_num'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td>
                        <button class="btn btn-sm btn-primary" id="">View Details</button>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</div>