<?php
        $shopName = $shopEmail = $shopOwnerName = $shopAddress = $shopOpenTime = $shopCloseTime = $shopContact1 = $shopContact2 = $shopDesc = $file_name = $file_type = $file_size = $file_temp_loc = $file_store = $fullname = $user_dob = $user_dob = $user_contact = $user_email = "";

        if(isset($_POST['shopEmail'])){
            $shopName = $_POST['shopName'];
            $shopEmail = $_POST['shopEmail'];
            $shopOwnerName = $_POST['shopOwnerName'];
            $shopAddress = $_POST['shopAddress'];
            $shopOpenTime = $_POST['shopOpenTime'];
            $shopCloseTime = $_POST['shopCloseTime'];
            $shopContact1 = $_POST['shopContact1'];
            $shopContact2 = $_POST['shopContact2'];
            $shopDesc = $_POST['storeDesc'];
            $file_name = $_FILES['shopImgUpload']['name'];
            $file_type = $_FILES['shopImgUpload']['type'];
            $file_size = $_FILES['shopImgUpload']['size'];
            $file_temp_loc = $_FILES['shopImgUpload']['tmp_name'];
            $file_store = "trialimage/".$file_name;

        }

        if(isset($_POST['user_email'])){
            $fullname = $_POST['full_name'];
            $user_dob = $_POST['user_dob'];
            $user_dob=date('Y-m-d',strtotime($user_dob));
            $user_contact = $_POST['user_contact'];
            $user_email = $_POST['user_email'];
        }
    if($_SERVER['REQUEST_METHOD']=="POST"){

        if(isset($_POST['lessgo'])){
            $password = $_POST['setPassword'];
            $pass = $_POST['setConfirmPassword'];
            if($pass === $password){
                $pass = password_hash($pass, PASSWORD_ARGON2I);
                if(isset($user_email) && !empty($user_email)){
                    
                    $fullname = $_POST['full_name'];
                    $user_dob = $_POST['user_dob'];
                    $user_dob=date('Y-m-d',strtotime($user_dob));
                    $user_contact = $_POST['user_contact'];
                    $user_email = $_POST['user_email'];
                    $user_image = "Images/imageProfile".rand(1,5).".png";
                    
                    $sql = "INSERT INTO `user` (`user_name`, `user_email`, `user_address`, `user_dob`, `user_free_trial`, `pass`, `user_contact1`, `user_image`) VALUES ('$fullname', '$user_email', '', '$user_dob', '0', '$pass', '$user_contact','$user_image' )";
                    mysqli_query($con,$sql);
                    // echo $sql;
                    
                    $sql = "SELECT user_id FROM user where user_email = '$user_email' and user_dob = '$user_dob';";
                    $result = mysqli_query($con,$sql);
                    $uid = mysqli_fetch_assoc($result);
                    $_SESSION['user_id'] = $uid['user_id'];
                    head("index.php");
                    
                }
                if(isset($shopEmail) && !empty($shopEmail)){
                    $shopName = $_POST['shopName'];
                    $shopEmail = $_POST['shopEmail'];
                    $shopOwnerName = $_POST['shopOwnerName'];
                    $shopAddress = $_POST['shopAddress'];
                    $shopOpenTime = $_POST['shopOpenTime'];
                    $shopCloseTime = $_POST['shopCloseTime'];
                    $shopContact1 = $_POST['shopContact1'];
                    $shopContact2 = $_POST['shopContact2'];
                    $shopDesc = $_POST['storeDesc'];
                    $shopImg = "";
                    if(isset($_FILES['shopImgUpload']['name']) && isset($_FILES['shopImgUpload']['type']) && isset($_FILES['shopImgUpload']['size']) ){
                        $file_name = $_FILES['shopImgUpload']['name'];
                        $file_type = $_FILES['shopImgUpload']['type'];
                        $file_size = $_FILES['shopImgUpload']['size'];
                        $file_temp_loc = $_FILES['shopImgUpload']['tmp_name'];
                        $file_store = "trialimage/".$file_name;
                        move_uploaded_file($file_temp_loc,$file_store);
                    }
                    
                    if($file_name != ""){
                        $shopImg = $file_store;
                    }
                    else{
                        $shopImg = "Images/shopProfileImage.png";
                    }
                    
                    $sqlShopSignUp = "INSERT INTO `shopinfo` (`shopName`, `shopOwnerName`, `shopAddress`, `shopImg`, `shopOpenDay`, `shopOpenTime`, `shopCloseTime`,
                    `shopDesc`, `shopContact1`, `shopContact2`, `shopEmail`, `shopPass`, `rp`, `shop_status`)
                    VALUES ('$shopName', '$shopOwnerName', '$shopAddress', '$shopImg', 'HImanshu', '$shopOpenTime', '$shopCloseTime', '$shopDesc',
                    '$shopContact1', '$shopContact2', '$shopEmail',
                    '$pass', '0', '0');";
                    mysqli_query($con,$sqlShopSignUp);
                    
                    $sqlInfo = "SELECT * from shopinfo where shopEmail = '$shopEmail' and shopContact1 = '$shopContact1';";
                    $result = mysqli_query($con,$sqlInfo);
                    // echo "<br>".$sqlInfo;
                    ?>
                    <input type="text" value="<?php echo $sqlInfo;?>">
                    <?php
                    while($row = mysqli_fetch_assoc($result)){
                        $_SESSION['shop_id'] = $row['shopId'];
                        // echo "This is shopId on line 92".$row['shopId']."<br>";
                    }
                    // echo "This is shopInfo: ". $_SESSION['shop_id']."<br>";
                    // echo $sqlShopSignUp;
                    ?>
                    <input type="text" value="<?php echo $sqlShopSignUp; ?>">
                    <?php
                    head("shopProfile.php");
                }
            }
            else{
                echo "passwords should be equal";
            }
        }
    }
?>

<form method="POST">


        <input type="hidden" name="shopName" value="<?php echo $shopName;?>">
        <input type="hidden" name="shopEmail" value="<?php echo $shopEmail;?>">
        <input type="hidden" name="shopOwnerName" value="<?php echo $shopOwnerName;?>">
        <input type="hidden" name="shopAddress" value="<?php echo $shopAddress;?>">
        <input type="hidden" name="shopOpenTime" value="<?php echo $shopOpenTime;?>">
        <input type="hidden" name="shopCloseTime" value="<?php echo $shopCloseTime;?>">
        <input type="hidden" name="shopContact1" value="<?php echo $shopContact1;?>">
        <input type="hidden" name="shopContact2" value="<?php echo $shopContact2;?>">
        <input type="hidden" name="shopDesc" value="<?php echo $shopDesc;?>">
        <input type="hidden" name="file_name" value="<?php echo $file_name;?>">     
        <input type="hidden" name="file_type" value="<?php echo $file_type;?>">     
        <input type="hidden" name="file_size" value="<?php echo $file_size;?>">     
        <input type="hidden" name="file_temp_loc" value="<?php echo $file_temp_loc;?>">     
        
        <input type="hidden" name = "full_name" value = "<?php echo $fullname ; ?>">
        <input type="hidden" name = "user_dob" value = "<?php echo $user_dob ; ?>">
        <input type="hidden" name = "user_dob" value = "<?php echo $user_dob ; ?>">
        <input type="hidden" name = "user_contact" value = "<?php echo $user_contact ; ?>">
        <input type="hidden" name = "user_email" value = "<?php echo $user_email ; ?>">
        

    <input type="hidden" name="">
    <div class="container">        
        <div class="row">
            <div class="col-md-6 mx-auto mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                    <h6>Set Password</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                    <hr />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">PASSWORD</label>
                                    <p style="color:green; font-size: small;">Password length should be greater than 8</p>
                                    <input type="password" placeholder="Password" class="form-control" id="setPassword" name="setPassword">
                                    <p style="color: red; font-size:small" id="passError"></p>
                                </div>
                                <div class="form-group">
                                    <label for="">CONFIRM PASSWORD</label>
                                <p style="color: red; font-size:small" id="Error"></p>

                                    <input type="password" class="form-control" placeholder="Confirm Password" id="setConfirmPassword" name="setConfirmPassword">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn-block btn btn-success btn-lg" name="lessgo" id="lessgo">Let's Go</button>
                                    <!-- <a href="userSignUp.php" class="btn-block btn btn-primary btn-lg" name="btn_usersignup">SIGN UP</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<br/>
<script>
    $(document).ready(function(){
        function validate(){
            $('#lessgo').prop('disabled', true);
            let pass = $("#setPassword").val();
            let confPass = $("#setConfirmPassword").val();
            if((pass === confPass) && (pass.length > 8)){
                $("#Error").html("");
                $('#lessgo').prop('disabled', false);
            }
        }
        $('#lessgo').prop('disabled', true);
        $("#setPassword").focus(function(){
            $("#passError").html("");
        });
        $("#setPassword").keyup(function(){
            validate();
        });
        $("#setConfirmPassword").keyup(function(){
            $("#Error").html("Passwords should be equal");
            $('#lessgo').prop('disabled', true);
            let pass = $("#setPassword").val();
            if(pass.length < 8){
                $("#passError").html("Password should greater than 8 digits");
            }
            validate();
        });
    });
</script>