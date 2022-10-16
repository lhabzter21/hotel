<?php include('component/masthead.php'); ?>

<section class="bg-light-gray py-5">
    <div class="container">
        <?php 
            $_products = $conn->query("SELECT * FROM products WHERE `status` = '0'");
            while( $row = $_products->fetch_assoc()):
        ?>

        <div class="box mb-3 py-4">
            <table width="100%">
                <tr>
                    <td><?php echo $row['name']?></td>
                    <td class="text-right font-weight-bold">₱ <?php echo $row['price']?></td>
                </tr>
            </table>
        </div>

        <?php endwhile; ?>
    </div>
</section>