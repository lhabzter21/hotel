<?php include('component/masthead.php'); ?>

<section class="bg-light-gray py-5">
    <div class="container">
        <?php 
            $categories = $conn->query("SELECT * FROM categories");
            while( $row = $categories->fetch_assoc()):
        ?>

        <div class="category-box">
            <h1 class="text-white display-3"><?php echo $row['name']?></h1>
        </div>

        <?php endwhile; ?>
    </div>
</section>