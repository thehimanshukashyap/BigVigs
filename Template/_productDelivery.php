<?php
    if(isset($_POST['deliveryComplete'])){
        $userid = $_POST['user_id'];
        $sql = "UPDATE `cart` SET `order_status` = '3' WHERE `cart`.`user_id` = ".$userid;
        mysqli_query($con,$sql);
    }

    $sql="SELECT * FROM cart where order_status = 1";
    $result = mysqli_query($con,$sql);
    $valueArr = array();
    while($row = mysqli_fetch_assoc($result)){
        $valueArr[] = $row;
    }

    function getDir ($dir){
        $address = $dir;
        $address = str_replace(" ","+",$address);
        $address = str_replace(",","%2C",$address);
        return "https://www.google.com/maps/dir/?api=1&destination=".$address;
        
    }

if(!empty($valueArr)){

foreach($valueArr as $valueArr){
    $shopDetailArr = array();
    $userDetailArr = "";

        $uId = $valueArr['user_id'];
        $userDetailSql = "SELECT orderAdd FROM user where user_id= '$uId' ";
        $resultuserDetail = mysqli_query($con,$userDetailSql);
        while($row = mysqli_fetch_assoc($resultuserDetail)){
            $userDetailArr = $row;
        }
        $userDetailArr= unserialize($userDetailArr['orderAdd']);
        
        $shopDetailSql = "SELECT * FROM shopinfo where shopId = ".$valueArr['shop_id'];
        $resultshopDetail = mysqli_query($con,$shopDetailSql);
        while($row = mysqli_fetch_assoc($resultshopDetail)){
            $shopDetailArr[] = $row;
        }
    ?>

    <div class="container p-2">
        <div>
            <div class="row p-3">
                <div class="col-6 p-0" style="display: flex;flex-direction: column; justify-content: space-evenly; align-items: center;">
                    <a href="<?php $dir = getDir($userDetailArr['address']); echo $dir;?>"  style="width: 80%; height: 2rem; outline: none; border: none; border-radius: 12px; margin-top: 1rem; background-color: powderblue; display:flex; align-items:center; justify-content:center; text-decoration:none; color:black;">Get Direction</a>
                    <!-- <button style="width: 80%; height: 2rem; outline: none; border: none; border-radius: 12px; margin-bottom: 1rem; background-color: palegreen;">Apply</button> -->
                </div>
                <div class="col-6">
                    <img src="<?php echo $userDetailArr['userImage']?>" class="m-2" alt="" style="height: 125px; width: 125px; border-radius: 50%;">
                </div>
            </div>
            <div class="row px-5 py-3">   
                <div class="col">
                    <div class="row">
                        <h5>Name: </h5>&nbsp;<?php echo $userDetailArr['name']?>
                    </div>
                    <div class="row">
                        <h5>Address: </h5>&nbsp;<?php echo $userDetailArr['address']?>
                    </div>
                    <div class="row mt-2">
                        <h5>Contact: </h5>&nbsp;<?php echo $userDetailArr['mobile']?>&nbsp;&nbsp;<?php echo $userDetailArr['mobile']?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container border p-2">
        <div style="display: flex; justify-content: center; align-items: center;">
            <h5 style="color: #6e6e6e;">Product Pick Up details</h5>
        </div>
        <div>
            <?php
            foreach($shopDetailArr as $shopDetailArr){
                ?>
                <div class="row mt-2 p-3">
                    <div class="col-6 border-right">
                        <img src="<?php echo $shopDetailArr['shopImg']?>" class="m-2" alt="" style="height: 125px; width: 125px; border-radius: 50%;">
                    </div>
                    <div class="col-6 p-0" style="display: flex;flex-direction: column; justify-content: space-evenly; align-items: center;">
                        <a href="<?php $dir = getDir($shopDetailArr['shopAddress']); echo $dir;?>"  style="width: 80%; height: 2rem; outline: none; border: none; border-radius: 12px; margin-top: 1rem; background-color: powderblue; display:flex; align-items:center; justify-content:center; text-decoration:none; color:black;">Get Direction</a>
                    </div>
                </div>
                <div class="row px-5 py-3">   
                    <div class="col">
                        <div class="row">
                            <h5>Shop Name: </h5>&nbsp;<?php echo $shopDetailArr['shopName']?>
                        </div>
                        <div class="row">
                            <h5>Shop Address: </h5>&nbsp;<?php echo $shopDetailArr['shopAddress']?>
                        </div>
                        <div class="row mt-2">
                            <h5>Shop Contact: </h5>&nbsp;<?php echo $shopDetailArr['shopContact1']?>&nbsp;&nbsp;<?php echo $shopDetailArr['shopContact2']?>
                        </div>
                    </div>
                </div>


                <div class="row">
        <?php
        $shopId = $shopDetailArr['shopId'];
        $sqlProductDetail = "SELECT * FROM product where item_id = ".$valueArr['item_id'];
        $result = mysqli_query($con,$sqlProductDetail);
        while($row = mysqli_fetch_assoc($result)){
          $table = $row['item_catagory'];
            if($row['item_stock']>0){
            ?>

            <div class="col-xl-2 col-lg-3 col-md-4 col-6" style="display: flex; justify-content: center; padding:1px!important;">
                <div class="card1 my-2">
                    <a href="<?php printf('%s?item_id=%s','product.php',$row['item_id'])?>">
                    <div class="imgBox1">
                        <img src="<?php echo $row['item_img']?>" alt="" class="img-fluid">
                    </div>
                    <div class="cardBody1">
                        <div class="top1"><span class="title"><?php $name = $row['item_brand']; echo $row['item_brand'];?></span><br>
                        <p>
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

                        <?php
                        
                          echo "<br>Size : ".$valueArr['size'];
                          echo "<br>Quantity : ".$valueArr['qty'];
                          echo "<br>Price : ".$valueArr['price'];

                        ?>

                    </div>
                    </a>
                </div>
            </div>        
            
            <?php
            }
            
        }
        ?>
      </div>    
      <div class="text-center">
          <form method='post'>
              <input type="text" value="<?php echo $uId;?>" name="user_id" hidden>
              <button class="btn btn-success btn-lg w-45 border my-3" name="deliveryComplete"><span>Delivered</span></button>
          </form>
      </div>

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
        <div class="d-flex justify-content-center mt-3"><h6>No Delivery Order yet.</h6></div>
    <?php
}
?>
    <!-- <div class="container" style="border: 2px solid green;">

        <div class="row">
            <div class="col-6 border"><p>Hmm</p></div>
            <div class="col-6 border"><p>Hmm</p></div>
        </div>
    </div> -->
<!-- Bootstrap js -->
