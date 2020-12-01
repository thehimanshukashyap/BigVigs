<?php
    include_once 'database/DBController.php';
    include_once 'noice.php';
    // include 'header.php';
    if($_SERVER['REQUEST_METHOD']=='POST'){

        if(isset($_POST['item_id'])){
            $_SESSION['itemUpdate'] = $_POST['item_id'];
        }
        $item = $_SESSION['itemUpdate'];


    $cat = $itemBrand = $itemGender = $itemMrp = $itemPrice = $itemCol = $itemSize = $itemCat =  $itemStock = $itemSubCat = $itemColour = "";
    $shop = $_SESSION['shop_id'];

    $stock = $price = $mrp = $gender = $brand = '';
    $sql = "SELECT * from product where item_id = $item;";
    $result = mysqli_query($con,$sql);
    $itemCat2 = "";
    $arr = array();
    while ($row = mysqli_fetch_assoc($result) ){
        $stock = $row['item_stock'];
        $price = $row['item_price'];
        $mrp = $row['item_mrp'];
        $itemGender = $row['item_gender'];
        $brand = $row['item_brand'];
        $itemCat  = $row['item_catagory'];
        $itemCat2 = $row['item_catagory'];
        $itemSubCat = $row['item_subcat'];
        $itemColour = $row['item_col'];
    }
        
        if( isset($_POST["updateSpec"]) || isset($_POST["exit"]) ){

            $item = $_POST['itemTrial'];
            $itemBrand =$_POST['prodBrand'];
            $itemGender = $_POST['prodGender'];
            $itemMrp = $_POST['mrp'];
            $itemPrice = $_POST['price'];
            $itemCol = $_POST['prodCol']; 
            $itemSize = serialize($_POST['prodSize']);
            $itemCat = $_POST['prodCategory'];
            $itemSubCat = $_POST['prodSubCategory'];
            $itemStock = $_POST['stock'];
            $discount = 100 - ($itemPrice*100)/$itemMrp;




            if($itemCat2 != $itemCat){
                $updateSql = "";
                if($itemCat2 == 1){
                    $updateSql = "DELETE FROM `specdropu` WHERE `specdropu`.`item_id` = ".$item;
                }
                if($itemCat2 == 2){
                    $updateSql = "DELETE FROM `specdropb` WHERE `specdropb`.`item_id` = ".$item;
                }
                $updateResult = mysqli_query($con,$updateSql);
                unset($_SESSION['itemUpdate']);
            }
    
// ----------------To move upload files----------------------------------
            $file_name = $_FILES['uploadfile']['name'];
            $file_type = $_FILES['uploadfile']['type'];
            $file_size = $_FILES['uploadfile']['size'];
            $file_temp_loc = $_FILES['uploadfile']['tmp_name'];
            $file_store = "trialimage/".$file_name;
            move_uploaded_file($file_temp_loc,$file_store);
// ----------------Upload files Ends------------------------------------

            if(!empty($_FILES['uploadfile']['name'])) //new image uploaded
            {
                //process your image and data
                // $sql = "UPDATE table SET name=$someName, image=$someImageName,... WHERE id = $someId";//save to DB with new image name

                $sql = "UPDATE `product` SET `product`.`item_brand`='$itemBrand', `product`.`item_img`='$file_store',
                `product`.`item_gender`='$itemGender', `product`.`item_mrp`='$itemMrp', `product`.`item_price`='$itemPrice',
                `product`.`item_col`='$itemCol', `product`.`item_size`='$itemSize', `product`.`item_catagory`='$itemCat', `product`.`item_subcat`='$itemSubCat' , `product`.`item_stock`='$itemStock',
                `product`.`discount`='$discount' where item_id='$item';";
    

            }
            else // no image uploaded
            {
                // save data, but no change the image column in MYSQL, so it will stay the same value
                // $sql = "UPDATE table SET name=$someName,... WHERE id = $someId";//save to DB but no change image column
                $sql = "SELECT item_img from product where item_id = $item";
                $result = mysqli_query($con,$sql);
                while($row = mysqli_fetch_assoc($result)){
                    $file_store = $row['item_img'];
                }

                $sql = "UPDATE `product` SET `product`.`item_brand`='$itemBrand', `product`.`item_img`='$file_store',
                `product`.`item_gender`='$itemGender', `product`.`item_mrp`='$itemMrp', `product`.`item_price`='$itemPrice',
                `product`.`item_col`='$itemCol', `product`.`item_size`='$itemSize', `product`.`item_catagory`='$itemCat', `product`.`item_subcat`='$itemSubCat' , `product`.`item_stock`='$itemStock',
                `product`.`discount`='$discount' where item_id='$item';";
    

            }

            $result = mysqli_query($con,$sql);

            if( isset($_POST["updateSpec"]) ){
                $cat = $_POST["prodCategory"];
                if($cat==1){
                    head("catUpUpdate.php?item_id=".$item);
                }
                if($cat==2){
                    head("catDownUpdate.php?item_id=".$item);
                }
            }
            if( isset($_POST["exit"]) ){
                head("myProducts.php");
            }
            
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Upload</title>
    <!-- Custom css -->
    <link rel="stylesheet" href="../CSS/index.css">
    <!-- Tailwind css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.7.3/tailwind.min.css" integrity="sha512-jJ4q433srLv86rVtrIu5Tco3NLLZ81Y4kkgr7jqm19oZG7cutkYOSSVLqQJ0I4niSm/5X5B4BeEbnBRvFfhWLg==" crossorigin="anonymous" />
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!-- GOOGLE ROBOTO FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Owl carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />
    <!-- font awesome kit -->
    <script src="https://kit.fontawesome.com/f2fae123e6.js" crossorigin="anonymous"></script>
    <!-- Jquery link -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3 .5.1/jquery.min.js"></script>

    <style>
    .dropdown-check-list {
  display: inline-block;
}

.dropdown-check-list .sizeAnchor {
  position: relative;
  cursor: pointer;
  display: inline-block;
  padding: 5px 50px 5px 10px;
  border: 1px solid #ccc;
}

.dropdown-check-list .sizeAnchor:after {
  position: absolute;
  content: "";
  border-left: 2px solid black;
  border-top: 2px solid black;
  padding: 5px;
  right: 10px;
  top: 20%;
  -moz-transform: rotate(-135deg);
  -ms-transform: rotate(-135deg);
  -o-transform: rotate(-135deg);
  -webkit-transform: rotate(-135deg);
  transform: rotate(-135deg);
}

.dropdown-check-list .sizeAnchor:active:after {
  /* right: 8px; */
  /* top: 21%; */
  /* -moz-transform: rotate(135deg);
  -ms-transform: rotate(-35deg);
  -o-transform: rotate(135deg);
  -webkit-transform: rotate(135deg);
  transform: rotate(135deg); */
}

.dropdown-check-list ul.sizeItems {
  padding: 2px;
  margin: 0;
  border: 1px solid #ccc;
  border-top: none;
  display: none;
}

.dropdown-check-list ul.sizeItems li {
  list-style: none;
}

.dropdown-check-list.visible .sizeAnchor {
  /* color: #0094ff; */
}

.dropdown-check-list.visible .sizeItems {
  /* display: block; */
  display: flex; flex-direction:column; justify-content: center; align-items: center;

}

</style>

<!-- <script>
    function random_function()
    {
        var a=document.getElementById("prodCategory").value;
        var b=document.getElementById("proGender").value;

        if(a==1 && b==="male")
        {
            var arr=['T-shirt','Shirt','Sweatshirt','Sweater','Jacket','Blazer','Coat','Suits','Rain Jackets','Nehru Jacket','Kurta','Sherwani','Sando','Hoodie','Vests'];
        }
        else if(a==1 && b==="female")
        {
            var arr=['T-shirt','Shirt','Sweatshirt','Sweater','Jacket','Blazer','Coat','Suits','Rain Jackets','Nehru Jacket','Kurta','Sando','Froak','Hoodie','Blouse','Dress','Bra','Sports Bra'];
        }
        else if(a==2 && b==="male")
        {
            var arr=['Jeans','Trousers','Shorts','Track pants','Joggers','Lounge Pants','Night Suit','Chudidars','Pyjama','Briefs','Dwarfs','Trunks'];
        }
        else if(a==2 && b==="female")
        {
            var arr=['Jeans','Trousers','Shorts','Track pants','Joggers','Lounge Pants','Night Suit','Chudidars','Pyjama','Salwar','Lehnga','Peticoat','Skirts','Plazzo','Pantie'];
        }
        else if(a==3 && b==="male"){
            var arr = ['Suit'];
        }
        else if(a==3 && b==="female"){
            var arr = ['Saree','Suit'];
        }
        else if(a==4 && b==="female"){
            var arr = ['Bikini','Swimsuit','Swimshorts'];
        }
        else if(a==4 && b==="male"){
            var arr = ['Swimsuit','Swimshorts'];
        }
        var string="<option selected disabled>Select Sub-category</option>";
        
        for(i=0;i<arr.length;i++)
        {
            let j =i+1;
            string=string+"<option value="+j+">"+arr[i]+"</option>";
        }
        document.getElementById("prodSubCategory").innerHTML=string;
    }
</script> -->


</head>
<body>

<form action="" method="post" enctype="multipart/form-data">

    <div class="container">

    <input type="hidden" value="<?php echo $item; ?>" name="itemTrial">
        <?php $image = '';?>
        <div class="row m-4"><h3 class="mx-auto">BIGVIGS STORE</h3><br/> </div>
        <div class="row">
            <div class="col-md-9 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <center>
                                        <h4>Edit Product</h4>
                                    </center>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                   <center>
                                        <hr />
                                    </center>
                            </div>
                        </div>
                        <div style="display: flex; justify-content: center;">
                            <?php $image = '';?>

                            <img class="img-fluid" style="width: 150px; height: 150px;" src="
                            
                            <?php
                                $sql = "SELECT item_img FROM product where item_id = $item";
                                $result = mysqli_query($con,$sql);
                                while($row = mysqli_fetch_assoc($result)){
                                    $image = $row['item_img'];
                                    echo $image;
                                }
                            ?>

                            " alt="<?php echo $image?>">
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="uploadfile">Change product Image</label>
                                <input type="file" name="uploadfile" value="<?php echo $image?>"/>
                              </div>
                              <div class="col-md-6">
                              <label>Select Gender</label>
                                <select name="prodGender" onchange="" id="proGender" class="form-control">
                                    <option value="" disabled selected>Select Gender</option>
                                    <option value="1" <?php if($itemGender == 1 ){ echo "selected";}?> >Male</option>
                                    <option value="2" <?php if($itemGender == 2 ){ echo "selected";}?> >Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Select Category</label>
                                <select name="prodCategory" id="prodCategory" onchange="" class="form-control">
                                    <option value="" disabled selected>Select Category</option>
                                    <?php
                                    $sql = "SELECT * FROM category;";
                                    $result = mysqli_query($con,$sql);
                                    while($row = mysqli_fetch_assoc($result)){
                                        if($row['cat_id'] == $itemCat){
                                            ?>
                                            <option value="<?php echo $row['cat_id']?>" selected><?php echo $row['cat_name']?></option>
                                            <?php
                                        }
                                        else{
                                            ?>
                                            <option value="<?php echo $row['cat_id']?>"><?php echo $row['cat_name']?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                              <label>Sub-categorie</label>

                              <select id="prodSubCategory" name="prodSubCategory" onchange="" class="form-control">
                                    <option value="" selected disabled> Select Sub-category</option>
                                    <?php
                                    $sql = "SELECT * FROM subcategory where subcat_gender in (".$itemGender.",3) AND subcat_type=".$itemCat;
                                    // echo "<option>".$sql."</option>";
                                    $result = mysqli_query($con,$sql);
                                    while($row = mysqli_fetch_assoc($result)){
                                        if($row['subcat_id'] == $itemSubCat){
                                            ?>
                                            <option value="<?php echo $row['subcat_id']?>" selected><?php echo $row['subcat_name']?></option>
                                            <?php
                                        }
                                        else{
                                            ?>
                                            <option value="<?php echo $row['subcat_id']?>"><?php echo $row['subcat_name']?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-md-6">
                                <label>Product Brand</label>
                                <input type="text" name="prodBrand" id="prodBrand" value="<?php echo $brand?>" class="form-control" placeholder="Product Brand">
                            </div>
                            <div class="col-md-6">
                            <label>Color</label>
                                <select name="prodCol" id="prodCol" class="form-control">
                                    <?php
                                        $sqlColour = "SELECT * FROM color";
                                        $resultColour = mysqli_query($con, $sqlColour);
                                        while($row = mysqli_fetch_assoc($resultColour)){
                                            ?>
                                            <option value="<?php echo $row['colId'];?>" <?php if($itemColour == $row['colId']){ echo "selected";} ?> ><?php echo $row['colName'];?></option>
                                            <?php

                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-xl-6 col-sm-12">
                                <label>Sizes</label>

                                <div id="sizeList1" class="dropdown-check-list" tabindex="100"  style="width: 100%; outline:none;">
                                    <span class="sizeAnchor" style="width: 100%;">Select Availale Sizes</span>
                                    <ul class="sizeItems" id="sizeItems">

                                        <?php
                                            $dbSize = $size = $data = "";
                                            $sqldbSize = "SELECT item_size from product where item_id =".$item;
                                            $resultdbSize = mysqli_query($con,$sqldbSize);
                                            while($row = mysqli_fetch_assoc($resultdbSize)){
                                                $dbSize = unserialize($row['item_size']);
                                            }
                                            $sqlSize = "SELECT cat_size from category where cat_id=".$itemCat;
                                            $sizeResult = mysqli_query($con,$sqlSize);
                                            while($row = mysqli_fetch_assoc($sizeResult)){
                                                $size = unserialize($row['cat_size']);
                                            }
                                            foreach($size as $size){
                                                ?>
                                                <li><input type='checkbox' id='prodSize' name='prodSize[]' value="<?php echo $size;?>" class='my-1' <?php for($i=0;$i<count($dbSize);$i++){ if($dbSize[$i] === $size){ echo "checked";}} ?> />&nbsp;&nbsp;<?php echo $size;?></li>
                                                <?php
                                            }
                                        ?>
                                        
                                    </ul>
                                </div>

                            </div>
                            <div class="col-xl-6 col-lg-6 col-sm-12">
                                <label for="">In Stock : </label>
                                <input type="text" name="stock" placeholder="In stock" class="form-control" value="<?php echo $stock?>">                                
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-xl-6 col-sm-12">
                                <label for="">More Price : </label><br>
                                <input type="text" name="mrp" class="form-control" placeholder="More Price" value="<?php echo $mrp?>">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-sm-12">
                                <label for="">Price : </label><br>
                                <input type="text" name="price"  class="form-control" placeholder="Price" value="<?php echo $price?>">                                
                            </div>
                        </div> 
                        <br />
                        <div class="row">
                            <div class="col">
                                <input type="submit" name="exit" value="Update and Quit" class="btn-block btn-lg btn btn-success"/>
                                <input type="submit" name="updateSpec" value="Update Specifications too >" class="btn-block btn-lg btn btn-success"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- --------------------------JS FILES---------------------------- -->

<script>

    // $(document).ready(function(){
    //     getSelectedSize();
    // });

    $('#proGender').change(function(){
            func();
    });
    $('#prodCategory').change(function(){
        if($(this).val() == 7){
            $("#prodSubCategory").html("<option selected disabled >Select Sub-category</option><option>Sunglasses</option>");
        }
        else{
            func();
        }
        selectSize();
    });

    function func(){
        let proGender = $('#proGender').val();
        let prodCategory = $('#prodCategory').val();
        let action = 'fetch_data';
        $.ajax({
            url: "action.php",
            type: "post",
            data: {action:action,proGender:proGender,prodCategory:prodCategory},
            success: function(data,status){
                data = JSON.parse(data);
                // alert(data);
                $("#prodSubCategory").html(data);
            }
        });
    }

    function getSelectedSize(){
        alert("inside this shit on line 463");
        let cat = $("#prodCategory").val();
        let SelectedSize = "get_size";
        let itemId = "<?php echo $item;?>";
        $.ajax({
            url: "action.php",
            type: "post",
            data: {SelectedSize:SelectedSize,cat:cat,itemId:itemId},
            success: function(data){
                // data = JSON.parse(data);
                alert(data);
                $("#sizeItems").html(data);
            },
            error: function(error){
                alert(error);
            }
        });
    }

    function selectSize(){
        let cat = $("#prodCategory").val();
        let getSize = "get_size";
        $.ajax({
            url: "action.php",
            type: "post",
            data: {getSize:getSize,cat:cat},
            success: function(data){
                data = JSON.parse(data);
                // alert(data);
                $("#sizeItems").html(data);
            },
            error: function(error){
                alert(error);
            }
        });
    }

    var checkList = document.getElementById('sizeList1');
    checkList.getElementsByClassName('sizeAnchor')[0].onclick = function(evt) {
      if (checkList.classList.contains('visible'))
        checkList.classList.remove('visible');
      else
        checkList.classList.add('visible');
    }
</script>

<!-- ------------------------------CUSTOM JS--- -->

</body>
</html>