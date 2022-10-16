<div class="container-fluid content-body-custom main-panel-custom" id="users_content">
    <h1 class="text-success">Users</h1>
    <hr class="mb-5"/>

    <button class="btn btn-success btn-user-add">
        <i class="fa-solid fa-plus"></i> Add New User
    </button>

    <table class="table tbl-users table-hover">
        <thead class="bg-info text-white">
            <th>#</th>
            <th>Name</th>
            <th>Username</th>
            <th>Type</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php 
                $i = 1;
                $checked = $conn->query("
                    SELECT 
                        * 
                    FROM 
                        users 
                    ORDER BY 
                        id DESC
                ");

                while( $row = $checked->fetch_assoc()):
            ?>
                <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['username'] ?></td>
                    <td>
                        <?php echo $row['type'] == 1 ? 'Admin':'Staff'; ?>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-primary btn-user-edit" data-id="<?php echo $row['id']?>" >Edit</button>
                        <button class="btn btn-sm btn-danger btn-user-delete" data-id="<?php echo $row['id']?>">Delete</button>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>