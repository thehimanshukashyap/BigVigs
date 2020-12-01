<?php
$shop_id = $user_id = '';

  if(isset($_POST['cancelOrder'])){
    $itemid = $_POST['item_id'];
    $sql = "UPDATE `cart` SET `order_status` = '2' WHERE `cart`.`user_id` = ".$_SESSION['user_id']." and `cart`.`item_id` = '$itemid';";
    mysqli_query($con,$sql);
  }
  if(isset($_POST['returnOrder'])){
    $itemid = $_POST['item_id'];
    $sql = "UPDATE `cart` SET `order_status` = '4' WHERE `cart`.`user_id` = ".$_SESSION['user_id']." and `cart`.`item_id` = '$itemid';";
    mysqli_query($con,$sql);
  }


?>
    <!-- Product display section starts -->
<div class="row mx-0">
  <?php
  $sql = '';
    if(isset($_SESSION['shop_id']) && $_SESSION['shop_id'] != null ){
        $shop_id = $_SESSION['shop_id'];
        $sql = "SELECT * FROM product where item_id in (SELECT item_id FROM cart where shop_id = $shop_id and order_status=1 or order_status=3);";
    }
    if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != null){
      $user_id = $_SESSION['user_id'];
      $sql = "SELECT * from product where item_id in ( SELECT item_id FROM cart where user_id = '$user_id' and order_status =1 or order_status =3)";
    }
  $result = mysqli_query($con,$sql);
  $resultcheck = mysqli_num_rows($result);
  if($resultcheck > 0){
    while($row = mysqli_fetch_assoc($result)){
      $table = $row['item_catagory'];
      
        ?>

        <div class="col-lg-2 col-xl-2 col-md-2 col-sm-6 col-6 my-3 px-1" style="display: flex; justify-content: center; align-items:center;">
            <div class="card1 border">
                <a href="<?php printf('%s?item_id=%s','product.php',$row['item_id'])?>">
                <div class="imgBox1">
                    <img src="<?php echo $row['item_img']?>" alt="">
                </div>
                <div class="cardBody1">
                    <div class="top1"><span class="title"><?php $name = $row['item_brand']; echo $row['item_brand'];?></span><br>

                    <p>
                     <?php               
                        $item_id = $row['item_id'];
                        $occ = $fit = '';
                      if($table==1){
                        $sql1 = "SELECT * FROM specdropu where item_id = $item_id";
                        $specification = mysqli_query($con,$sql1);
                        while($spec = mysqli_fetch_assoc($specification)){
                          $occ = $spec['occasion'];
                          $fit = $spec['fit'];
                        }
                        echo $fit." ".$occ." ".$row['item_catagory'];
                      }
                      else{
                        $sql2 = "SELECT * FROM specdropb where item_id = $item_id";
                        $specification = mysqli_query($con,$sql2);
                        while($spec = mysqli_fetch_assoc($specification)){
                          $occ = $spec['occasion'];
                          $fit = $spec['fit'];
                        }
                        echo $fit." ".$occ." ".$row['item_catagory'];
                      } 
                    ?>
                    </p></div>
                    <div class="priceSection"><span class="price">Rs <?php echo $row['item_price']?></span>&nbsp;&nbsp;<span class="strikedPrice"><small><s>Rs <?php echo $row['item_mrp']?></s></small></span>
                    <span class="discount"><small>(<?php echo $row['discount']?>% off)</small></span></div>
                </div>
                </a>
                <?php
                if(isset($_SESSION['user_id'])){
                  ?>
                  <form method='post'>
                    <input type="text" value="<?php echo $row['item_id'];?>" name="item_id" hidden>
                    <?php
                      $item_id = $row['item_id'];
                      $OrderStatus = "";
                      $sqlOrderStatus = "SELECT order_status from cart where user_id =".$_SESSION['user_id']." AND item_id =".$row['item_id'];
                      $resultOrderStatus = mysqli_query($con,$sqlOrderStatus);
                      while($row = mysqli_fetch_assoc($resultOrderStatus)){
                        $OrderStatus = $row;
                      }
                      if($OrderStatus['order_status'] == 1){
                        ?>
                        <div class="text-center" style="background: #f8f8ff;">
                          <button class="my-2 mb-3" name="cancelOrder" style="width: 80%; border: 1px solid black; background: transparent;">Cancel Order</button>
                        </div>
                        <?php
                      }
                      if($OrderStatus['order_status'] == 3){
                        ?>
                        <div class="text-center" style="background: #f8f8ff;">
                        <?php
                          $dbDate = "";
                          $sqlDbDate = "SELECT order_date from cart where item_id =".$item_id;
                          $resultDbDate = mysqli_query($con,$sqlDbDate);
                          while($rowDbDate = mysqli_fetch_assoc($resultDbDate)){
                            $dbDate = $rowDbDate['order_date'];
                          }
                          $dbDate = strtotime($dbDate);
                          $date= date("Y-m-d");
                          $date = strtotime($date);
                          if(($date - $dbDate) <= 10){
                            ?>
                            <button class="my-2 mb-3" name="returnOrder" style="width: 80%; border: 1px solid black; background: transparent;" ><span>Return Order</span></button>
                        </div>

                        <?php
                          }
                        
                      }
                    ?>
                  </form>
                  <?php
                }
                ?>
                
              </div>
        </div>        

        <?php
    }
  }
  else{
    ?>
      <div class="not-found-img">
        <img src="Images/not-found.png" alt="Product not found">
      </div>
      <?php
      if(isset($shop_id) && !empty($shop_id)){
      ?>
        <div class="not-found-section">You've not Uploaded anything.&nbsp; <span class="not-found-item-word"> Lets upload something.</span></div><br>
        <p class="not-found-suggest">We are waiting for your beautiful products to be delivered to our customers. Lets upload something and fill fashion in people's life.</p>
      <?php
      }
      else{
        ?>
        <div class="not-found-section">It looks empty here.&nbsp; <span class="not-found-item-word"> Lets search something.</span></div><br>
        <p class="not-found-suggest">We are having various great products like shoes, shirts, saress and many more products that you might love to add to your wardrobe. So lets explore.</p>
        <?php
      }
  } 

  ?>
</div>

<!-- Product display section ends -->   