<?php include_once 'noice.php';?>
<?php
    if(isset($_POST['deliveryComplete'])){
        $userid = $_POST['user_id'];
        $sql = "UPDATE `cart` SET `order_status` = '3' WHERE `cart`.`user_id` = ".$userid;
        mysqli_query($con,$sql);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> -->


    <link rel="stylesheet" href="CSS/index.css">
    <link rel="stylesheet" href="CSS/userprofile.css">
    <link rel="stylesheet" href="CSS/search.css">
    <!-- Tailwind css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.7.3/tailwind.min.css" integrity="sha512-jJ4q433srLv86rVtrIu5Tco3NLLZ81Y4kkgr7jqm19oZG7cutkYOSSVLqQJ0I4niSm/5X5B4BeEbnBRvFfhWLg==" crossorigin="anonymous" />
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- GOOGLE ROBOTO FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Owl carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />
    <!-- font awesome kit -->
    <script src="https://kit.fontawesome.com/f2fae123e6.js" crossorigin="anonymous"></script>

    <!-- For sidebar -->
    <link rel="stylesheet" href="CSS/style.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>


    <style>
        
    </style>
</head>
<body style="background: white;">
    <?php
        $sql="SELECT * FROM cart where order_status = 1";
        $result = mysqli_query($con,$sql);
        $valueArr = array();
        while($row = mysqli_fetch_assoc($result)){
            $valueArr[] = $row;
        }

foreach($valueArr as $valueArr){
    $shopDetailArr = array();
    $userDetailArr = array();

        $uId = $valueArr['user_id'];
        $userDetailSql = "SELECT * FROM user where user_id= '$uId' ";
        $resultuserDetail = mysqli_query($con,$userDetailSql);
        while($row = mysqli_fetch_assoc($resultuserDetail)){
            $userDetailArr[] = $row;
        }
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
                    <button style="width: 80%; height: 2rem; outline: none; border: none; border-radius: 12px; margin-top: 1rem; background-color: powderblue;">Get Direction</button>
                    <button style="width: 80%; height: 2rem; outline: none; border: none; border-radius: 12px; margin-bottom: 1rem; background-color: palegreen;">Apply</button>
                </div>
                <div class="col-6">
                    <img src="<?php echo $userDetailArr[0]['user_image']?>" class="m-2" alt="" style="height: 125px; width: 125px; border-radius: 50%;">
                </div>
            </div>
            <div class="row px-5 py-3">   
                <div class="col">
                    <div class="row">
                        <h5>Name: </h5>&nbsp;<?php echo $userDetailArr[0]['user_name']?>
                    </div>
                    <div class="row">
                        <h5>Address: </h5>&nbsp;<?php echo $userDetailArr[0]['user_address']?>
                    </div>
                    <div class="row mt-2">
                        <h5>Contact: </h5>&nbsp;<?php echo $userDetailArr[0]['user_contact1']?>&nbsp;&nbsp;<?php echo $userDetailArr[0]['user_contact2']?>
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
                        <button style="width: 80%; height: 2rem; outline: none; border: none; border-radius: 12px; margin-top: 1rem; background-color: powderblue;">Get Direction</button>
                        <!-- <button style="width: 80%; height: 2rem; outline: none; border: none; border-radius: 12px; margin-bottom: 1rem; background-color: palegreen;">Apply</button> -->
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
?>
    <!-- <div class="container" style="border: 2px solid green;">

        <div class="row">
            <div class="col-6 border"><p>Hmm</p></div>
            <div class="col-6 border"><p>Hmm</p></div>
        </div>
    </div> -->
<!-- Bootstrap js -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>