<?php
    if($_SERVER['REQUEST_METHOD']=="POST"){
        if(isset($_POST['shopLogOut'])){
            session_start();
            session_destroy();
            head('index.php');
        }
    }

    $shopId = $_SESSION['shop_id']??0;
    $sql1 = "SELECT * FROM orders where shop_id = $shopId";
    $result1 = mysqli_query($con,$sql1);
    $numOrders = mysqli_num_rows($result1);

    $sql = "SELECT * FROM shopInfo where shopId = ".$shopId;
    $result = mysqli_query($con,$sql);
    $resultcheck = mysqli_num_rows($result);

if($resultcheck > 0){
    while($row = mysqli_fetch_assoc($result)){
?>

    <div class="container mt-5">
        <div class="card col-xl-9 col-lg-8 col-sm-12  mx-auto">
            <div class="row my-2">
                <div class="col-lg-6 col-xl-6 col-sm-12 border-right">
                    <div class="row">
                        <div class="col-sm-5 d-flex justify-content-center">
                            <img src="<?php echo $row['shopImg'];?>" alt="" >
                        </div>
                        <div class="col-sm-7 profile-name-column my-auto">
                            <div class="row my-auto">
                                    <h5 class="m-auto"><?php echo $row['shopName']?></h5>
                                    <h6 class="m-auto"><?php echo $row['shopEmail']?></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-6 col-sm-12 my-auto py-3 user-info">
                    <div class="container">
                        <div class="row">
                            <span><strong> Contact :</strong> <?php echo $row['shopContact1']?>,</span>&nbsp;
                            <span><?php echo $row['shopContact2']?></span><br>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 p-0">
                                <span><strong> Opening Time :</strong> <?php echo $row['shopOpenTime']?></span>&nbsp;&nbsp;&nbsp;
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 p-0">
                                <span><strong>Closing Time :</strong> <?php echo $row['shopCloseTime']?></span>
                            </div>
                        </div>
                        <div class="row">
                            <span><strong>Address :</strong> <?php echo $row['shopAddress']?></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-xl-12 col-sm-12 my-2 p-0 d-flex justify-content-center">
                    <a href="shopUpdate.php"><button class="btn btn-block shadow-none" style="border: 2px solid black; color: black; font-weight:600;">Update</button></a>
                </div>
            </div>
        </div>

        <?php
        if(isset($_SESSION['shop_id'])){
            $shopId = $_SESSION['shop_id'];
            $sql = "SELECT shop_status from shopInfo where shopId =".$shopId;
            $result = mysqli_query($con,$sql);
            $status;
            while($row = mysqli_fetch_assoc($result)){
                $status = $row['shop_status'];
            }
            if($status == 1){
                ?>
        <div class="card col-xl-9 col-lg-8 col-sm-12 mt-1 mx-auto">
            <div class="row text-center m-3">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <a href="productUpload.php">
                        <img src="Images\francesco-ungaro-V6TWE6h8gyg-unsplash.jpg" alt="" class="img-fluid">
                        Upload Product
                    </a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 border-right border-left">
                    <a href="myProducts.php">
                        <img src="Images\francesco-ungaro-V6TWE6h8gyg-unsplash.jpg" alt="" class="img-fluid">
                        My Products
                    </a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <a href="myOrders.php">
                        <img src="Images\francesco-ungaro-V6TWE6h8gyg-unsplash.jpg" alt="" class="img-fluid">
                        My Orders <br>
                        <?php echo $numOrders;?>
                    </a>
                </div>
            </div>

            <?php
            }
            else{
                ?>
                <div class="card col-xl-9 col-lg-8 col-sm-12 mt-1 mx-auto text-center p-2">
                    <span style="line-height: 1.5rem; margin-top: 0.5rem;">Please wait while your shop is approved by BIGVIGS.<br><span style="color: #0000f9; font-style: Roboto;">We will shortly be in contact with you.</span></span>
                </div>
                <?php
            }
            ?>
        </div>


        <div class="container mt-3">
            <div class="col-xl-9 col-lg-8 col-sm-12 mt-2 mx-auto text-center">
                <form method="post">
                    <button type="submit" name="shopLogOut" class="btn w-50 mx-auto border btn-danger">LogOut</button>
                </form>
            </div>
        </div>

              
            
            <?php
        }
        ?>

    </div>

<?php
    }
}
else{
    head('index.php');
}
?>