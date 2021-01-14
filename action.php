<?php
    session_start();
    include_once 'database/DBController.php';
    $upload_location = "trialimage/";

    extract($_POST);

    if(isset($_POST["action"])){
        $sql = "SELECT * FROM subcategory where subcat_gender in (".$_POST['proGender'].",3) AND subcat_type =".$_POST['prodCategory'];
        $result = mysqli_query($con,$sql);
        $data = "<option selected disabled >Select Sub-category</option>";
        while($row = mysqli_fetch_assoc($result)){
            $data .= "<option value=".$row['subcat_id'].">".$row['subcat_name']."</option>";
        }
        echo json_encode($data);
    }
    
    if(isset($_POST['moveToBag'])){
        $user = $_SESSION['user_id'];
        $item = $_POST['item_id'];
        $shop_id = $_POST['shop_id'];
        $productSize = $_POST['productSize'];
        $sql = "INSERT INTO `cart` (`user_id`, `item_id`,`size`,`shop_id`) VALUES ('$user', '$item','$productSize','$shop_id');";
        mysqli_query($con,$sql);
        $sql = "DELETE FROM `wishlist` WHERE `wishlist`.`item_id` = $item and `wishlist`.`user_id` = $user; ";
        mysqli_query($con,$sql);
        echo 1;
    }

    if(isset($_POST["getSize"])){
        $cat = $_POST["cat"];
        $sqlSize = "SELECT cat_size from category where cat_id=".$cat;
        $sizeResult = mysqli_query($con,$sqlSize);
        $size = '';
        $data = "";
        while($row = mysqli_fetch_assoc($sizeResult)){
            $size = unserialize($row['cat_size']);
        }
        foreach($size as $size){
            $data .= "<li><input type='checkbox' id='prodSize' name='prodSize[]' value=".$size." class='my-1' />&nbsp;&nbsp;".$size."</li>";
        }
        echo json_encode($data);
    }
    
    if(isset($_POST["SelectedSize"])){
        $dbSize = $size = $data = "";
        $sqldbSize = "SELECT item_size from product where item_id =".$_POST['itemId'];
        $resultdbSize = mysqli_query($con,$sqldbSize);
        while($row = mysqli_fetch_assoc($resultdbSize)){
            $dbSize = unserialize($row['item_size']);
        }
        $cat = $_POST["cat"];
        $sqlSize = "SELECT cat_size from category where cat_id=".$cat;
        $sizeResult = mysqli_query($con,$sqlSize);
        while($row = mysqli_fetch_assoc($sizeResult)){
            $size = unserialize($row['cat_size']);
        }

        foreach($size as $size){
            if($dbSize[0] == $size || $dbSize[1] == $size){
                $data .= "<li><input type='checkbox' id='prodSize' name='prodSize[]' value=".$size." class='my-1' checked/>&nbsp;&nbsp;".$size."</li>";
            }else{
                $data .= "<li><input type='checkbox' id='prodSize' name='prodSize[]' value=".$size." class='my-1'/>&nbsp;&nbsp;".$size."</li>";
            }
        }

        echo $data;
        // echo json_encode($data);
    }

    if(isset($_POST['addAdd'])){
        $addNewName = $_POST['addNewName'];
        $addNewMobile = $_POST['addNewMobile'];
        $addNewPin = $_POST['addNewPin'];
        $addNewAdderss = $_POST['addNewAdderss'];
        $addNewCity = $_POST['addNewCity'];

        $addArr = array("name"=>$addNewName,"mobile"=>$addNewMobile,"pin"=>$addNewPin,"address"=>$addNewAdderss,"city"=>$addNewCity);

        $sqlCheck = "SELECT addArr FROM user where user_id = ".$_SESSION['user_id'];
        $resultcheck = mysqli_query($con,$sqlCheck);
        $arr = "";
        while($row = mysqli_fetch_assoc($resultcheck)){
            $arr = $row;
        }
        $arr = unserialize($arr['addArr']);

        if(is_array($arr)){
            
            array_push($arr,$addArr);
            $arr = serialize($arr);
            // echo $arr;
            $sql = "UPDATE `user` SET `addArr` = '$arr' WHERE `user`.`user_id` = ".$_SESSION['user_id'];
            $result = mysqli_query($con,$sql);
            if($result){
                echo 1;
            }
            else {
                echo 2;
            }
        }
        else{
            // echo "inside this sit";
            $arr = array($addArr);
            $arr = serialize($arr);
            // echo $arr;
            $sql = "UPDATE `user` SET `addArr` = '$arr' WHERE `user`.`user_id` = ".$_SESSION['user_id'];
            $result = mysqli_query($con,$sql);
            if($result){
                echo 1;
            }
            else {
                echo 2;
            }
        }

    }

    if(isset($_POST["par"])){
        $whereinq = 1;
        if(isset($_POST['gender'])){
            $filt_gender[] =$_POST['gender'];
            if($whereinq == 0){
              $query = $query." where item_gender = '$filt_gender[0]'";
              $whereinq = 1;
            }
            else{
              $query = $query." and item_gender = '$filt_gender[0]'";
            }
        }
          
        if(isset($_POST['brand'])){
            $filt_brand =$_POST['brand'];
            $f_brand = '"' . implode('", "', $filt_brand) . '"';
            if($whereinq == 0){
                $query = $query." where item_brand in ($f_brand)";
                $whereinq = 1;
            }
            else{
                $query = $query." and item_brand in ($f_brand)";
            }
        }
    
        if(isset($_POST['subcat'])){
            $filt_subcat =$_POST['subcat'];
            $f_subcat = implode(',', $filt_subcat);
            if($whereinq == 0){
                $query = $query." where item_subcat in ($f_subcat)";
                $whereinq = 1;
            }
            else{
                $query = $query." and item_subcat in ($f_subcat)";
            }
        }
    
        if(isset($_POST['colour'])){
            $filt_col =$_POST['colour'];
            $f_col = '"' . implode('", "', $filt_col) . '"';
            if($whereinq == 0){
                $query = $query." where item_col in ($f_col)";
            }
            else{
                $query = $query." and item_col in ($f_col)";
            }
        }
    
        if(isset($_POST['discount'])){
            $filt_discount =$_POST['discount'];
            if($whereinq == 0){
                $query = $query." where discount >= '$filt_discount'";
            }
            else{
                $query = $query." and discount >= '$filt_discount'";
            }
        }
        if(isset($_POST['sortByPrice'])){
            $sortMark = $_POST['sortByPrice'];
            if($sortMark == 1){
                $query = $query."ORDER BY item_price asc";
            }
            if($sortMark == 2){
                $query = $query."ORDER BY item_price desc";
            }
        }
        $html = '';
        $result = mysqli_query($con,$query);
        while($row = mysqli_fetch_assoc($result)){

            $subCat = "";
            $occ = "";
            $fit = "";

            $sql3 = "SELECT * from subcategory where subcat_id = ".$row['item_subcat'];
            $result3  = mysqli_query($con,$sql3);
            while($row3 = mysqli_fetch_assoc($result3)){
                $subCat = $row3["subcat_name"];
                $item_id = $row['item_id'];
                if($row3['subcat_type']==1){            
                    $sql1 = "SELECT * FROM specdropu where item_id = $item_id";
                    $specification = mysqli_query($con,$sql1);
                    while($spec = mysqli_fetch_assoc($specification)){
                        $occ = $spec["occasion"];
                        $fit = $spec["fit"];
                    }
                }
                else{
                    $sql2 = "SELECT * FROM specdropb where item_id = $item_id";
                    $specification = mysqli_query($con,$sql2);
                    while($spec = mysqli_fetch_assoc($specification)){
                        $occ = $spec["occasion"];
                        $fit = $spec["fit"];
                    }
                }
            }
            $table = $row['item_catagory'];
            $path = "product.php?item_id=".$row['item_id'];
            if($row['item_stock']>0){
                $html .= '<div class="col-xl-2 col-lg-3 col-md-4 col-6" style="display: flex; justify-content: center; padding:1px!important;">
                    <div class="card1 my-2">
                        <a href="'.$path.'">
                        <div class="imgBox1">
                            <img src="'.$row['item_img'].'" alt="" class="img-fluid">
                        </div>
                        <div class="cardBody1">
                            <div class="top1"><span class="title">'.$row['item_brand'].'</span><br>
                                <p>'.$fit.' '.$occ.' '.$subCat.'</p>
                            </div>
                            <div class="priceSection"><span class="price">Rs '.$row['item_price'].'</span>&nbsp;&nbsp;<span class="strikedPrice"><small><s>Rs '.$row['item_mrp'].'</s></small></span>
                            <span class="discount"><small>('.$row['discount'].'% off)</small></span></div>
                        </div>
                        </a>
                        <form method="post">
                            <input type="text" value="'.$row['item_id'].'" name="item_id" hidden />
                            <button class="btn1" name="bookmark"><span class="plus">+</span></button>
                        </form>
                    </div>
                </div>';
            }
        }
        echo $html;
    }

    if(isset($_POST['getName'])){
        $name = $_POST['name'];
        $sql = "SELECT patternCoverage from upperspecification;";
        $result = mysqli_query($con,$sql);
        $arr = '';
        while($row = mysqli_fetch_assoc($result)){
            $arr = unserialize($row['patternCoverage']);
        }
        echo json_encode($arr);
    }
    
    if(isset($_POST['getSuggest'])){
        $col = $_POST['column'];
        $table = $_POST['table'];
        $sql = "SELECT $col from $table;";
        $result = mysqli_query($con,$sql);
        $arr = '';
        while($row = mysqli_fetch_assoc($result)){
            $arr = unserialize($row[$col]);
        }
        echo json_encode($arr);
    }


    if(isset($_POST["prodUpload"])){
        $shop = $_SESSION['shop_id'];
        $cat = $itemBrand = $itemGender = $itemMrp = $itemPrice = $itemCol = $itemSize = $itemCat = $itemStock = "";

        $itemBrand =$_POST['prodBrand'];
        $itemGender = $_POST['prodGender'];
        $itemMrp = $_POST['mrp'];
        $itemPrice = $_POST['price'];
        $itemCol = $_POST['prodCol']; 
        $itemSize = array();
        $serializedSize = "";
        $arraySize = explode(',', $_POST['prodSize']);
        $serializedSize = serialize($arraySize);
        $itemCat = $_POST['prodCategory'];
        $itemSubCat = $_POST['prodSubCategory'];
        $itemStock = $_POST['stock'];
        $discount = 100 - ($itemPrice*100)/$itemMrp;

        $resultarr = array();
        $sql = "SELECT rp from shopinfo where shopId = ".$shop;
        $result = mysqli_query($con,$sql);
        $rp = '';

        while($row = mysqli_fetch_assoc($result)){
            $rp = $row['rp'];
        }
        $rp=$rp+1;
        $sql = "UPDATE `shopinfo` SET `rp` = '$rp' WHERE `shopinfo`.`shopId` = $shop";
        mysqli_query($con,$sql);
        $spectable = '';
        if($_POST['prodCategory']==2){
            $spectable = 2;
        }
        else{
            $spectable =1;
        }
// ----------------To move upload files----------------------------------
        $countfiles = count($_FILES['uploadfile']['name']);
        $files_arr = array();
        

        


        for($index = 0;$index < $countfiles;$index++){

            if(isset($_FILES['uploadfile']['name'][$index]) && $_FILES['uploadfile']['name'][$index] != ''){
               // File name
               $filename = $_FILES['uploadfile']['name'][$index];
            
            // Get extension
            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            $filename = 'productImages'.time().$shop.$index.'.'.$ext;
         
               // Valid image extension
               $valid_ext = array("png","jpeg","jpg");
         
               // Check extension
               if(in_array($ext, $valid_ext)){
         
                  // File path
                  $path = $upload_location.$filename;
         
                  // Upload file
                  if(move_uploaded_file($_FILES['uploadfile']['tmp_name'][$index],$path)){
                     $files_arr[] = $path;
                  }
               }
            }
         }
         

        $filesArr = serialize($files_arr);





        $file_name = $_FILES['mainProdImage']['name'];
        $extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $file_type = $_FILES['mainProdImage']['type'];
        $file_size = $_FILES['mainProdImage']['size'];
        $file_temp_loc = $_FILES['mainProdImage']['tmp_name'];
        $file_name = 'productMainImg'.time().$shop.'.'.$extension;
        $file_store = $upload_location.$file_name;
        move_uploaded_file($file_temp_loc,$file_store);


        $item =1 ;


// ----------------Upload files Ends------------------------------------

        $cat = $_POST["prodCategory"];
 
        $sql = "INSERT INTO `product` (`shopId`, `item_brand`, `item_img`, `item_images`, `item_gender`, `item_mrp`, `item_price`, `item_col`, `item_size`, `item_catagory`,`item_subcat` ,
        `item_stock`, `rp`, `discount`) VALUES ('$shop', '$itemBrand', '$file_store','$filesArr', '$itemGender', '$itemMrp', '$itemPrice', '$itemCol', '$serializedSize', '$itemCat', '$itemSubCat',
        '$itemStock', '$rp','$discount');";
        $res = mysqli_query($con,$sql);
        // if($cat==1){
        //     echo 1;
            
        // }
        // if($cat==2){
        //     echo 2;
        // }
        echo $cat;

    }
    
    // }

    if(isset($_POST['addtocart']))
    {
        
        if(isset($_SESSION['user_id'])){
            $user = $_SESSION['user_id'];
            $item = $_POST['item_id'];
            $shopId = $_POST['shop_id'];
            
            if(isset($_POST['productSize'])){
                $size = $_POST['productSize'];
                $sql = "INSERT INTO `cart` (`user_id`, `item_id`, `shop_id`, `size`) VALUES ('$user', '$item', '$shopId', '$size');";
                mysqli_query($con,$sql);
                echo 1;
            }
            else{
                echo "shake();";
            }
            ?>
            <?php
            
        }
        else{
            echo 2;
        }
    }

    if(isset($_POST['btn_userUpdate'])){
        $full_name = $_POST['full_name'];
        $user_dob = $_POST['user_dob'];
        $user_contact = $_POST['user_contact'];
        $user_email = $_POST['user_email'];
        $user_address = $_POST['user_address'];
        $user_gender = $_POST['user_gender'];
        $userImg = "";
        $file_store = "";
        $file_name = "";
  
        if(isset($_FILES['userImgUpload']['name']) && isset($_FILES['userImgUpload']['type']) && isset($_FILES['userImgUpload']['size']) ){
           $file_name = $_FILES['userImgUpload']['name'];
           $file_name = "userProfile".$_SESSION['user_id'].".jpg";
           $file_type = $_FILES['userImgUpload']['type'];
           $file_size = $_FILES['userImgUpload']['size'];
           $file_temp_loc = $_FILES['userImgUpload']['tmp_name'];
           $file_store = $upload_location.$file_name;
           move_uploaded_file($file_temp_loc,$file_store);
       }
       
        if($file_name != ""){
            $userImg = $file_store;
        }
        else{
            $sql = "SELECT user_image from user where user_id =".$_SESSION['user_id'];
            $result = mysqli_query($con,$sql);
            $userImage = mysqli_fetch_assoc($result);
            $userImg = $userImage['user_image'];
        }



        $sql = "UPDATE `user` SET `user_name` = '$full_name', `user_gender` = '$user_gender', `user_email` = '$user_email', `user_address` = '$user_address', `user_dob` = '$user_dob',
        `user_contact1` = '$user_contact', `user_contact2` = '1', `user_image` = '$userImg' WHERE `user`.`user_id` = ".$_SESSION['user_id'];
        $result = mysqli_query($con,$sql);
        if($result){
            echo 1;
        }
        else{
            echo 0;
        }
    }

    if(isset($_POST['updateStoreData'])){

        $shopName = $_POST['shopName'];
        $shopEmail = $_POST['shopEmail'];
        $shopOwnerName = $_POST['shopOwnerName'];
        $shopAddress = $_POST['shopAddress'];
        $shopOpenTime = $_POST['shopOpenTime'];
        $shopCloseTime = $_POST['shopCloseTime'];
        $shopContact1 = $_POST['shopContact1'];
        $shopContact2 = $_POST['shopContact2'];
        $shopDesc = $_POST['shopDesc'];
        $shopImg = "";
        $closeDays = $_POST['closeDays'];
        $file_store = "";
        $file_name = "";
  
        if(isset($_FILES['shopImgUpload']['name']) && isset($_FILES['shopImgUpload']['type']) && isset($_FILES['shopImgUpload']['size']) ){
           $file_name = $_FILES['shopImgUpload']['name'];
           $file_name = "shopImg".$_SESSION['shop_id'].".jpg";
           $file_type = $_FILES['shopImgUpload']['type'];
           $file_size = $_FILES['shopImgUpload']['size'];
           $file_temp_loc = $_FILES['shopImgUpload']['tmp_name'];
           $file_store = $upload_location.$file_name;
           move_uploaded_file($file_temp_loc,$file_store);
       }
       
        if($file_name != ""){
            $shopImg = $file_store;
        }
        else{
            $sql = "SELECT shopImg from shopinfo where shopId =".$_SESSION['shop_id'];
            $result = mysqli_query($con,$sql);
            $shopImage = mysqli_fetch_assoc($result);
            $shopImg = $shopImage['shopImg'];
        }
  
        $sql = "UPDATE `shopinfo` SET `shopName` = '$shopName', `shopOwnerName` = '$shopOwnerName', `shopAddress` = '$shopAddress',
        `shopImg` = '$shopImg', `shopOpenDay` = 'hi', `shopOpenTime` = '$shopOpenTime', `shopCloseTime` = '$shopCloseTime', `shopDesc` = '$shopDesc', `shopContact1` = '$shopContact1',
        `shopContact2` = '$shopContact2', `shopEmail` = '$shopEmail' WHERE `shopinfo`.`shopId` = ".$_SESSION['shop_id'];
        $result = mysqli_query($con,$sql);
        if($result){
            echo 1;
        }
        else{
            echo 0; 
        }
    }

    if(isset($_POST['btn_userlogin']))
    {
        if(isset($_POST['user_email_signin']) && isset($_POST['user_pass_signin'])){

            $email = $_POST['user_email_signin'];
            $dbPass = "";
            $pass = $_POST['user_pass_signin'];
            $sql = "SELECT * FROM user WHERE user_email = '$email';";
            $result = mysqli_query($con,$sql);
            $resultcheck = mysqli_num_rows($result);
            
            if($resultcheck > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $dbPass = $row['pass'];
                    if(password_verify($pass,$dbPass)){
                        session_destroy();
                        session_start();
                        $_SESSION['full_name'] = $row['user_name'];
                        $_SESSION['user_id'] = $row['user_id'];
                        $_SESSION['user_image'] = $row['user_image'];
                        echo 1;
                    }
                    else{
                        echo 0;
                    }
                }
            }
        }
    }

    if(isset($_POST['btn_shoplogin']))
    {
        $email = $_POST['shop_email_signin'];
        $dbPass = "";
        $pass = $_POST['shop_pass_signin'];
        $sql = "SELECT * FROM shopinfo WHERE shopEmail = '$email';";
        $result = mysqli_query($con,$sql);
        $resultcheck = mysqli_num_rows($result);

        if($resultcheck > 0){
            while($row = mysqli_fetch_assoc($result)){
                $dbPass = $row['shopPass'];
                if(password_verify($pass,$dbPass)){
                    session_destroy();
                    session_start();
                    $_SESSION['shop_id'] = $row['shopId'];
                    echo 1;
                }
                else{
                    echo 0;
                }
            }
        }
    }

?>