<?php include('component/masthead.php'); ?>

<section class="p-5">
    <div class="container my-5">
        <?php echo isset($_SESSION['setting_about_content']) ? html_entity_decode($_SESSION['setting_about_content']):''?>
    </div>
</section>

<section>
    <div id="carousel_about_page" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner py-5">


        <?php 
            $_feedbacks = $conn->query("
                SELECT 
                    f.*,
                    c.first_name,
                    c.last_name,
                    c.profile_img
                FROM 
                    feedbacks as f 
                INNER JOIN 
                    customers as c
                ON 
                    f.customer_id = c.id 
                LIMIT 10
            ");
            $ctr = 0;
            while( $row = $_feedbacks->fetch_assoc()):
        ?>

            <div class="carousel-item <?php echo $ctr == 0 ? 'active':''?>">
                <div class="container ">
                    <table width="100%">
                        <tr>
                            <td class="text-center">
                                <p class="mb-4 fst-italic">"<?php echo $row['comment'] ?>"</p>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <img class="rounded-circle mb-3 img-fluid" src="admin/uploads/profiles/<?php echo $row['profile_img'] == '' ? 'profile_default.jpg':$row['profile_img']?>" style="height: 100px; width: 100px;border: 3px solid silver;" alt="">
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <label class="mb-3"><?php echo strtoupper($row['first_name']) .' '.strtoupper($row['last_name']) ?></label>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
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
                        </tr>
                    </table>
                    
                    
                    
                </div>
            </div>

        <?php $ctr++; endwhile; ?>

        </div>
        <a class="carousel-control-prev" href="#carousel_about_page" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel_about_page" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>


<?php
    if(isset($_SESSION['login_id'])){
        $is_user_feedback = $conn->query("SELECT * FROM feedbacks WHERE customer_id = ".$_SESSION['login_id']);
        $display = true;
        if($is_user_feedback->num_rows > 0) {
            $display = false;
        }
    }
?>


<?php if(isset($_SESSION['login_id'])){?>
    <?php if($_SESSION['login_type'] == 3){?>
        <?php if($display){?>
            <section class="bg-light-gray py-5">
                <div class="container">
                    <div class="box">
                        <form id="frm_feedback_add">
                            <input type="hidden" name="customer_id" value="<?php echo $_SESSION['login_id']?>">
                            <div class="row">
                                <div class="col-sm-12 mb-4">
                                <label for="" class="mb-3">Rating Us<span class="text-danger">*</span></label>
                                    <div class="form-group">
                                        <div class="rate">
                                            <input type="radio" id="star5" name="rating" value="5" required/>
                                            <label for="star5" title="Excellent">5 stars</label>
                                            <input type="radio" id="star4" name="rating" value="4"/>
                                            <label for="star4" title="Good">4 stars</label>
                                            <input type="radio" id="star3" name="rating" value="3"/>
                                            <label for="star3" title="Medium">3 stars</label>
                                            <input type="radio" id="star2" name="rating" value="2"/>
                                            <label for="star2" title="Poorly">2 stars</label>
                                            <input type="radio" id="star1" name="rating" value="1"/>
                                            <label for="star1" title="Very Bad">1 star</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="" class="mb-3">Comment <span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="comment" required cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12 mt-5">
                                    <button type="submit" class="btn btn-block btn-lg btn-primary btn-orange">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        <?php } ?>
    <?php } ?>
<?php } ?>