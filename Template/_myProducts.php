<?php
$shop_id = $_SESSION['shop_id'];
if($_SERVER['REQUEST_METHOD']=='POST'){
  // Prod Remove button code starts
  if(isset($_POST['RemoveBtn'])){
    $spec_id = $_POST['spec_id'];
    $item_id = $_POST['item_id'];
    // echo $spec_id." ".$item_id;

    // Deleting from product table
    $sql = "DELETE FROM `product` WHERE `product`.`item_id` = $item_id";
    mysqli_query($con,$sql);

    // Deleting products from their respective specification tables
    if($spec_id==1){
      $sql = "DELETE FROM `specdropu` WHERE `specdropu`.`item_id` = $item_id";
      mysqli_query($con,$sql);
    }
    if($spec_id==2){
      $sql = "DELETE FROM `specdropb` WHERE `specdropb`.`item_id` = $item_id";
      mysqli_query($con,$sql);
    }
  }

  // Prod Remove button code ends


}

?>
    <!-- Product display section starts -->
<div class="row mx-3">
  <?php
  $sql = "SELECT * FROM product where shopId = $shop_id;";
  $result = mysqli_query($con,$sql);
  $resultcheck = mysqli_num_rows($result);
  if($resultcheck > 0){
    while($row = mysqli_fetch_assoc($result)){
      $table = $row['item_catagory'];
      
        ?>

        <div class="col-lg-2 col-xl-2 col-md-2 col-sm-6 my-3" style="display: flex; justify-content:center;">
            <div class="card1" style="border: 1px solid lightgray;">
                <a href="<?php printf('%s?item_id=%s','product.php',$row['item_id'])?>">
                <div class="imgBox1">
                    <img src="<?php echo $row['item_img']?>" alt="">
                </div>
                <div class="cardBody1">
                    <div class="top1"><span class="title"><?php $name = $row['item_brand']; echo $row['item_brand'];?></span><br>

                    <p style="white-space:nowrap;word-wrap:break-word;overflow:hidden;text-overflow:ellipsis; width:160px;">
                    <?php
                        $subCat = '';
                        $sql3 = "SELECT * from subcategory where subcat_id = ".$row['item_subcat'];
                        $result3  = mysqli_query($con,$sql3);
                        while($row3 = mysqli_fetch_assoc($result3)){
                          $subCat = $row3['subcat_name'];
                        }
            
                        $item_id = $row['item_id'];
                        if($table==1){
                          $occ = '';
                          $fit = '';
                          $sql1 = "SELECT * FROM specdropu where item_id = $item_id";
                          $specification = mysqli_query($con,$sql1);
                          while($spec = mysqli_fetch_assoc($specification)){
                            $occ = $spec['occasion'];
                            $fit = $spec['fit'];
                          }
                          echo $fit." ".$occ." ".$subCat;
                        }
                        else{
                          $sql2 = "SELECT * FROM specdropb where item_id = $item_id";
                          $specification = mysqli_query($con,$sql2);
                          while($spec = mysqli_fetch_assoc($specification)){
                            $occ = $spec['occasion'];
                            $fit = $spec['fit'];
                          }
                          echo $fit." ".$occ." ".$subCat;
                        } 
                      ?>
                    </p></div>
                    <div class="priceSection"><span class="price">Rs <?php echo $row['item_price']?></span>&nbsp;&nbsp;<span class="strikedPrice"><small><s>Rs <?php echo $row['item_mrp']?></s></small></span>
                    <span class="discount"><small>(<?php echo $row['discount']?>% off)</small></span></div>
                </div>
                </a>
                <form method='post' action="prodbasicUpdate.php">
                  <input type="text" value="<?php echo $row['item_id'];?>" name="item_id" hidden>
                  <input type="text" value="<?php echo $row['spec_id'];?>" name="spec_id" hidden>
                  <div class="text-center">
                    <button name="prodEditBtn" style="border: 0.01rem solid black; width: 93%; background-color: #5abbd3; color: black;"; class="mt-2 mx-auto text-center prodEditBtn">Edit</button>
                  </div>
                </form>
                <form action="" method="post" class="text-center">
                  <input type="text" value="<?php echo $row['item_id'];?>" name="item_id" hidden>
                  <input type="text" value="<?php echo $row['item_catagory'];?>" name="spec_id" hidden>
                  <button name="RemoveBtn" style="border: 1px solid black; width: 93%; background : white;" class="my-1 mb-2 text-center prodRemoveBtn">Remove</button>
                </form>
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
      <div class="not-found-section">You've not Uploaded anything.&nbsp; <span class="not-found-item-word"> Lets upload something.</span></div><br>
      <p class="not-found-suggest">We are waiting for your beautiful products to be delivered to our customers. Lets upload something and fill fashion in people's life.</p>
    <?php
  } 

  ?>
</div>

<!-- Product display section ends -->   