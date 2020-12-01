<?php

    if($_SERVER['REQUEST_METHOD']=="POST"){
        if(isset($_POST['userLogOut'])){
            // session_start();
            session_destroy();
            head('userLogIn.php');
        }
    }
    $sql = '';
    if(isset($_SESSION['user_id'])){
        $userId = $_SESSION['user_id'];
        $sql = "SELECT * FROM user where user_id = ".$userId;
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
                                <div class="col-sm-5">
                                    <div style="width: 130px; height: 130px; border-radius: 50%;">
                                
                                        <img src="<?php echo $row['user_image']?>" alt="" style="border-radius:50%; height: 130px; width: 130px; border: 3.5px solid lightgray;">
                                    </div>
                                </div>
                                <div class="col-sm-7 profile-name-column my-auto">
                                    <div class="row my-auto">
                                            <h5 class="m-auto"><?php echo $row['user_name'];?></h5>
                                            <h6 class="m-auto"><?php echo $row['user_email'];?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xl-3 col-sm-12 my-auto user-info">
                            <span><?php if($row['user_gender'] == 1){echo 'Male';}if($row['user_gender'] == 2){echo 'Female';}?></span><br>
                            <span><?php echo $row['user_dob'];?></span><br>
                            <span><?php echo $row['user_address'];?></span>
                        </div>
                        <div class="col-lg-3 d-flex align-items-center">
                            <a href="userUpdateData.php"><button class="btn border px-3 py-2">Update</button></a>
                        </div>
                    </div>
                </div>
                <div class="card col-xl-9 col-lg-8 col-sm-12 mt-1 mx-auto">
                    <div class="row text-center m-3">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <a href="bookmark.php">
                                <!-- <img src="Images\francesco-ungaro-V6TWE6h8gyg-unsplash.jpg" alt="" class="img-fluid"> -->
                                <i class="fas fa-bookmark"></i>
                                Bookmarks
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 border-right border-left">
                            <a href="cart.php">
                                <img src="Images\francesco-ungaro-V6TWE6h8gyg-unsplash.jpg" alt="" class="img-fluid">
                                My Cart
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <a href="myOrders.php">
                                <img src="Images\francesco-ungaro-V6TWE6h8gyg-unsplash.jpg" alt="" class="img-fluid">
                                My Orders
                            </a>
                        </div>
                    </div>
                    <hr class="m-2">
                    <div class="row text-center m-3">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <form method="post">
                                <button type="submit" name="userLogOut" class="btn">LogOut</button>
                            </form>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <a href="index.php">
                            <button class="btn btn-primary btn-xl">Continue Shopping</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        <?php
        }
    }
}
else{
    head('userLogIn.php');
}
?>