<?php include('component/masthead.php'); ?>

<section class="services-heading my-5">
    <div class="container">
        <div class="heading">Heading</div>
        <div class="text">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec at nunc faucibus, scelerisque enim molestie, sagittis quam. Integer scelerisque lacinia dolor quis fermentum. Donec eu dapibus quam. Etiam eget elit a mauris rutrum volutpat sagittis quis mi. Curabitur finibus ut nunc at placerat. Pellentesque tempus, mi sed ornare vulputate, lacus lacus bibendum nunc, non mollis tellus justo a lectus. Curabitur bibendum non felis sed volutpat. Pellentesque accumsan, turpis vitae fringilla fermentum, erat orci porttitor dolor, in pretium justo urna ut turpis.
        </div>
    </div>
</section>

<section class="services mt-5" style="background-color:#efefef;">
    <div class="container">

        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <?php 
                $categories = $conn->query("SELECT * FROM categories");
                while( $row = $categories->fetch_assoc()):
            ?>
                <li class="item" role="presentation">
                    <button class="nav-link <?php echo $row['name'] == 'Face' ? 'active':''?>" id="pills-<?php echo $row['name']?>-tab" data-toggle="pill" data-target="#pills-<?php echo $row['name']?>" type="button" role="tab" aria-controls="pills-<?php echo $row['name']?>" aria-selected="true"><?php echo $row['name']?></button>
                </li>

            <?php endwhile; ?>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <?php 
                $categories = $conn->query("SELECT * FROM categories");
                while( $row = $categories->fetch_assoc()):
            ?>

            <div class="tab-pane fade show <?php echo $row['name'] == 'Face' ? 'active':''?>" id="pills-<?php echo $row['name']?>" role="tabpanel" aria-labelledby="pills-<?php echo $row['name']?>-tab">
                <div class="content">
                    <?php 
                        $services = $conn->query("SELECT * FROM services WHERE category_id = ".$row['id']);
                        while( $sub_row = $services->fetch_assoc()):
                    ?>

                        <div class="items" 
                            data-title="<?php echo $sub_row['name']?>" 
                            data-text="<?php echo $sub_row['description'] == '' ? '':$sub_row['description']?>" 
                            style="<?php echo $sub_row['img_path'] == '' ? "background:url('admin/uploads/img_placeholder.png') center/cover no-repeat":"background:url('admin/uploads/".$sub_row['img_path']."') center/cover no-repeat"?>">
                        </div>

                    <?php endwhile; ?>
                </div>
            </div>

            <?php endwhile; ?>
        </div>
    </div>
</section>