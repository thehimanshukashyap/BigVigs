<div class="owl-carousel owl-theme top-banner-div">
    <?php
    $q = "shirt";
    $sql = "SELECT * FROM product where item_name like '%$q%' or  item_brand like '%$q%';";
    //   $sql = "SELECT * FROM product;";
    $result = mysqli_query($con,$sql);
    $resultcheck = mysqli_num_rows($result);


    if($resultcheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            ?>

            <!-- <div class="col-lg-2 col-xl-2 col-md-2 col-sm-6 my-3"> -->
                <div class="card1">
                    <a href="<?php printf('%s?item_id=%s','product.php',$row['item_id'])?>">
                    <div class="imgBox1">
                        <img src="<?php echo $row['item_image']?>" alt="">
                    </div>
                    <div class="cardBody1">
                        <!-- <div class="addtowishlist"><input type="button" class="btn_addtowishlist" value="Wishlist"></div> -->
                        <div class="top1"><span class="title"><?php $name = $row['item_name']; echo $row['item_name'];?></span><br>
                        <p>Lorem ipsum dolor ...</p></div>
                        <div class="priceSection"><span class="price">Rs <?php echo $row['item_price']?></span>&nbsp;&nbsp;<span class="strikedPrice"><small><s>Rs <?php echo $row['item_price']?></s></small></span>
                        <span class="discount"><small>(60% off)</small></span></div>
                    </div>
                    </a>
                    <button class="btn1"><span class="plus">+</span></button>
                </div>
            <!-- </div>         -->

            <?php
        }
    }
    ?>
</div>






