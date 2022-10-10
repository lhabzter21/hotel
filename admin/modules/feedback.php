<div class="container-fluid content-body-custom main-panel-custom" id="checkout_content">
    <h1 class="text-success">Feedbacks</h1>
    <hr class="mb-5"/>

    <table class="table tbl-checkout table-hover">
        <thead class="bg-info text-white">
            <th>#</th>
            <th>Customer Name</th>
            <th>Rating</th>
            <th>Comment</th>
            <th>Email</th>
        </thead>
        <tbody>
            <?php 
                $i = 1;
                $checked = $conn->query("
                    SELECT 
                        f.rating, 
                        f.comment,
                        f.comment,
                        c.email, 
                        c.first_name, 
                        c.last_name
                    FROM 
                        feedbacks as f 
                    INNER JOIN 
                        customers as c 
                    ON 
                        f.customer_id = c.id
                    ORDER BY 
                        f.id DESC
                ");

                while( $row = $checked->fetch_assoc()):
            ?>
                <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $row['first_name'] .' '. $row['last_name'] ?></td>
                    <td>
                        <?php 
                            if($row['rating'] == 1) {
                                $stars = '<i class="fa fa-star text-warning"></i>';
                                $stars .= '<i class="fa fa-star text-secondary"></i>';
                                $stars .= '<i class="fa fa-star text-secondary"></i>';
                                $stars .= '<i class="fa fa-star text-secondary"></i>';
                                $stars .= '<i class="fa fa-star text-secondary"></i>';

                                echo $stars;
                            } else if($row['rating'] == 2){
                                $stars = '<i class="fa fa-star text-warning"></i>';
                                $stars .= '<i class="fa fa-star text-warning"></i>';
                                $stars .= '<i class="fa fa-star text-secondary"></i>';
                                $stars .= '<i class="fa fa-star text-secondary"></i>';
                                $stars .= '<i class="fa fa-star text-secondary"></i>';

                                echo $stars;
                            } else if($row['rating'] == 3){
                                $stars = '<i class="fa fa-star text-warning"></i>';
                                $stars .= '<i class="fa fa-star text-warning"></i>';
                                $stars .= '<i class="fa fa-star text-warning"></i>';
                                $stars .= '<i class="fa fa-star text-secondary"></i>';
                                $stars .= '<i class="fa fa-star text-secondary"></i>';

                                echo $stars;
                            } else if($row['rating'] == 4){
                                $stars = '<i class="fa fa-star text-warning"></i>';
                                $stars .= '<i class="fa fa-star text-warning"></i>';
                                $stars .= '<i class="fa fa-star text-warning"></i>';
                                $stars .= '<i class="fa fa-star text-warning"></i>';
                                $stars .= '<i class="fa fa-star text-secondary"></i>';

                                echo $stars;
                            } else {
                                $stars = '<i class="fa fa-star text-warning"></i>';
                                $stars .= '<i class="fa fa-star text-warning"></i>';
                                $stars .= '<i class="fa fa-star text-warning"></i>';
                                $stars .= '<i class="fa fa-star text-warning"></i>';
                                $stars .= '<i class="fa fa-star text-warning"></i>';

                                echo $stars;
                            }
                        ?>
                    </td>
                    <td>
                        <?php echo $row['comment'] == '' ? 'No Comment':$row['comment'] ?>
                    </td>
                    <td><?php echo $row['email'] ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>