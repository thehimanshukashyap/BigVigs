<?php
session_start();
    include_once 'database/DBController.php';
    // include 'header.php';

//     $cat = $itemBrand = $itemGender = $itemMrp = $itemPrice = $itemCol = $itemSize = $itemCat = $itemStock = "";
//     $shop = $_SESSION['shop_id'];

//     if($_SERVER['REQUEST_METHOD']=="POST"){
        
    
//         if(isset($_POST["submit"])){

//             $itemBrand =$_POST['prodBrand'];
//             $itemGender = $_POST['prodGender'];
//             $itemMrp = $_POST['mrp'];
//             $itemPrice = $_POST['price'];
//             $itemCol = $_POST['prodCol']; 
//             $itemSize = serialize($_POST['prodSize']);
//             $itemCat = $_POST['prodCategory'];
//             $itemSubCat = $_POST['prodSubCategory'];
//             $itemStock = $_POST['stock'];
//             $discount = 100 - ($itemPrice*100)/$itemMrp;

//             $resultarr = array();
//             $sql = "SELECT rp from shopinfo where shopId = ".$shop;
//             $result = mysqli_query($con,$sql);
//             $rp = '';

//             while($row = mysqli_fetch_assoc($result)){
//                 $rp = $row['rp'];
//             }
//             $rp=$rp+1;
//             $sql = "UPDATE `shopinfo` SET `rp` = '$rp' WHERE `shopinfo`.`shopId` = $shop";
//             mysqli_query($con,$sql);
//             $spectable = '';
//             if($_POST['prodCategory']==2){
//                 $spectable = 2;
//             }
//             else{
//                 $spectable =1;
//             }
// // ----------------To move upload files----------------------------------
//             $file_name = $_FILES['uploadfile']['name'];
//             $file_type = $_FILES['uploadfile']['type'];
//             $file_size = $_FILES['uploadfile']['size'];
//             $file_temp_loc = $_FILES['uploadfile']['tmp_name'];
//             $file_store = "trialimage/".$file_name;
//             move_uploaded_file($file_temp_loc,$file_store);


//             $item =1 ;


// // ----------------Upload files Ends------------------------------------

//             $cat = $_POST["prodCategory"];
//             $sql = "INSERT INTO `product` (`shopId`, `item_brand`, `item_img`, `item_gender`, `item_mrp`, `item_price`, `item_col`, `item_size`, `item_catagory`,`item_subcat` ,
//             `item_stock`, `rp`, `discount`) VALUES ('$shop', '$itemBrand', '$file_store', '$itemGender', '$itemMrp', '$itemPrice', '$itemCol', '$itemSize', '$itemCat', '$itemSubCat',
//             '$itemStock', '$rp','$discount');";
//             // echo $sql;
//             $res = mysqli_query($con,$sql);
//             if($cat==1){
//                 header("Location: catUp.php");
//             }
//             if($cat==2){
//                 header("Location: catDown.php");
//             }
//         }
//     }
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
</head>
<body>

<form action="" method="post" enctype="multipart/form-data">

    <div class="container">
        <div class="row m-4"><h3 class="mx-auto">BIGVIGS STORE</h3><br/> </div>
        <div class="row">
            <div class="col-md-9 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <center>
                                        <h4>Upload Product</h4>
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
                        <div class="row">
                            <div class="col-12">
                                <label for="mainProdImage">Banner Image</label>
                                <input type="file" name="mainProdImage" id="mainProdImage" value=""/>
                                <p style="color: red; font-size: small;" id="mainProdImgError"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="uploadfile">Other Images</label>
                                <input type="file" name="uploadfile[]" id="uploadfile" value="" multiple/>
                                <p style="color: red; font-size: small;" id="prodImgError"></p>
                              </div>
                              <div class="col-md-6">
                              <label>Gender</label>
                                <select name="prodGender" id="proGender" class="form-control">
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                </select>
                                <p style="color: red; font-size: small;" id="prodGenderError"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Category</label>
                                <!-- <form action="" method="post"> -->
                                <select name="prodCategory" id="prodCategory" class="form-control">
                                <option value="" disabled selected>Select Category</option>
                                    <?php
                                    $sql = "SELECT * FROM category;";
                                    $result = mysqli_query($con,$sql);
                                    while($row = mysqli_fetch_assoc($result)){
                                        ?>

                                        <option value="<?php echo $row['cat_id']?>"><?php echo $row['cat_name']?></option>

                                        <?php
                                    }
                                    ?>
                                </select>
                                <p style="color: red; font-size: small;" id="prodCategoryError"></p>
                                <!-- </form> -->
                            </div>
                            <div class="col-md-6">
                              <label>Sub-catagorie</label>
                              <select id="prodSubCategory" name="prodSubCategory" class="form-control">
                                    <option value="" selected disabled> Select Sub-category</option>
                                </select>
                                <p style="color: red; font-size: small;" id="prodSubCategoryError"></p>
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-md-6">
                                <label>Product Brand</label>
                                <input type="text" name="prodBrand" id="prodBrand" class="form-control" placeholder="Product Brand">
                                <p style="color: red; font-size: small;" id="prodBrandError"></p>
                            </div>
                            <div class="col-md-6">
                            <label>Color</label>
                                <select name="prodCol" id="prodCol" class="form-control">
                                    <option value="" selected disabled>Select Colour</option>
                                    <?php
                                        $sqlColor = "SELECT * FROM color";
                                        $resultColor = mysqli_query($con,$sqlColor);
                                        while($row = mysqli_fetch_assoc($resultColor)){
                                            ?>
                                            <option value="<?php echo $row['colId'];?>"><?php echo $row['colName'];?></option>
                                            <?php
                                        }
                                    ?>
                                    <!-- <option value=2>Black</option>
                                    <option value=3>Blue</option>
                                    <option value=4>Pink</option> -->
                                </select>
                                <p style="color: red; font-size: small;" id="prodColError"></p>
                            </div>
                        </div>
                        
                        <!-- <label for="">Avaiable Sizes : </label>
                        <div class="row">
                              
                        </div> -->

                        <div class="row">
                            <div class="col-lg-6 col-xl-6 col-sm-12">
                            <label>Sizes</label><br>

                                <div id="sizeList1" class="dropdown-check-list" tabindex="100"  style="width: 100%; outline:none;">
                                    <span class="sizeAnchor" style="width: 100%;">Select Availale Sizes</span>
                                    <ul class="sizeItems" id="sizeItems">
                                        <li>SELECT ABOVE DETAILS FIRST</li>
                                        
                                    </ul>
                                </div>
                                <p style="color: red; font-size: small;" id="prodSizeError"></p>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-sm-12">
                                <label for="">In Stock : </label>
                                <input type="text" name="stock" id="stock" placeholder="In stock" class="form-control">                                
                                <p style="color: red; font-size: small;" id="stockError"></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-xl-6 col-sm-12">
                                <label for="">More Price : </label><br>
                                <input type="text" name="mrp" id="mrp" class="form-control" placeholder="More Price">
                                <p style="color: red; font-size: small;" id="mrpError"></p>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-sm-12">
                                <label for="">Price : </label><br>
                                <input type="text" name="price" id="price" class="form-control" placeholder="Price">                                
                                <p style="color: red; font-size: small;" id="priceError"></p>
                            </div>
                        </div> 
                        <br />
                        <div class="row">
                            <div class="col">
                                <input type="submit" name="submit" id="submit" value="Move next >" class="btn-block btn-lg btn btn-success"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
  <!--  -->
        </div>
    </div>
</form>

<!-- --------------------------JS FILES---------------------------- -->
<script>
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
        let aciton = 'fetch_data';
        $.ajax({
            url: "action.php",
            type: "post",
            data: {action:aciton,proGender:proGender,prodCategory:prodCategory},
            success: function(data,status){
                data = JSON.parse(data);
                $("#prodSubCategory").html(data);
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

    $("#prodBrand").focus(function(){
    $("#prodBrand").removeAttr("style");
    $("#prodBrandError").html("");
});
$("#proGender").focus(function(){
    $("#proGender").removeAttr("style");
    $("#prodGenderError").html("");
});
$("#mrp").focus(function(){
    $("#mrp").removeAttr("style");
    $("#mrpError").html("");
});
$("#price").focus(function(){
    $("#price").removeAttr("style");
    $("#priceError").html("");
});
$("#prodCol").focus(function(){
    $("#prodCol").removeAttr("style");
    $("#prodColError").html("");
});
$("#prodSize").focus(function(){
    $("#prodSize").removeAttr("style");
    $("#prodSizeError").html("");
});
$("#prodCategory").focus(function(){
    $("#prodCategory").removeAttr("style");
    $("#prodCategoryError").html("");
});
$("#prodSubCategory").focus(function(){
    $("#prodSubCategory").removeAttr("style");
    $("#prodSubCategoryError").html("");
});
$("#stock").focus(function(){
    $("#stock").removeAttr("style");
    $("#stockError").html("");
});

$("#submit").click(function(event){
    event.preventDefault();
    validate = true;
    prodBrand = $("#prodBrand").val();
    prodGender = $("#proGender").val();
    mrp = $("#mrp").val();
    price = $("#price").val();
    prodCol = $("#prodCol").val();
    var prodSize = [];
    $("#prodSize:checked").each(function() {
        prodSize.push($(this).val());
    });
    prodCategory = $("#prodCategory").val();
    prodSubCategory = $("#prodSubCategory").val();
    stock = $("#stock").val();
    mainProdImage = $("#mainProdImage")[0].files;

    if(prodBrand === null || prodGender === null || mrp === null || price === null || prodCol === null || prodSize === null || prodCategory === null || prodSubCategory === null || stock === null || prodBrand === '' || prodGender === '' || mrp === '' || price === '' || prodCol === '' || prodSize === '' || prodCategory === '' || prodSubCategory === '' || stock === ''){
        validate = false;
        if(prodBrand === null || prodBrand === ''){
            $("#prodBrand").css({"border":"1px solid red"});
            $("#prodBrandError").html("Please enter Product Brand");
        }
        if(mrp === null || mrp === ''){
            $("#mrp").css({"border":"1px solid red"});
            $("#mrpError").html("Please enter MRP price");
        }
        if(price === null || price === ''){
            $("#price").css({"border":"1px solid red"});
            $("#priceError").html("Please enter Selling Price");
        }
        if(prodCol === null || prodCol === ''){
            $("#prodCol").css({"border":"1px solid red"});
            $("#prodColError").html("Please enter Product Colour");
        }
        if(prodSize === null || prodSize === ''){
            $("#prodSize").css({"border":"1px solid red"});
            $("#prodSizeError").html("Please enter Product Size");
        }
        if(prodCategory === null || prodCategory === ''){
            $("#prodCategory").css({"border":"1px solid red"});
            $("#prodCategoryError").html("Please enter Product Category");
        }
        if(prodSubCategory === null || prodSubCategory === ''){
            $("#prodSubCategory").css({"border":"1px solid red"});
            $("#prodSubCategoryError").html("Please enter Product Sub-category");
        }
        if(stock === null || stock === ''){
            $("#stock").css({"border":"1px solid red"});
            $("#stockError").html("Please enter Stock");
        }
    }
    if(validate){
        if(stock <= 0 || mrp<=0 || price<=0){
            validate = false;
            if(stock <= 0){
                $("#stock").css({"border":"1px solid red"});
                $("#stockError").html("Quantity of Stock should be greater than 0");
            }
            if(mrp<=0){
                $("#mrp").css({"border":"1px solid red"});
                $("#mrpError").html("MRP of product should be greater than 0");
            }
            if(price<=0){
                $("#price").css({"border":"1px solid red"});
                $("#priceError").html("Price of product should be greater than 0");
            }
        }
    }
    if(uploadfile.length == 0){
        validate = false;
        $("#prodImgError").html("Please Select Product Image");
    }
    if(uploadfile.length>0){
        var file = uploadfile[0];
        var fileType = file.type;
        var match = ['application/pdf', 'application/msword', 'application/vnd.ms-office', 'image/jpeg', 'image/png', 'image/jpg'];
        if(!((fileType == match[0]) || (fileType == match[1]) || (fileType == match[2]) || (fileType == match[3]) || (fileType == match[4]) || (fileType == match[5]))){
            validate = false;
            $("#prodImgError").html("Please Select a valid Image Format");
        }
    }
    if(validate){
        var fd = new FormData();

        var totalfiles = document.getElementById('uploadfile').files.length;
        for (var index = 0; index < totalfiles; index++) {
            fd.append("uploadfile[]", document.getElementById('uploadfile').files[index]);
        }

        fd.append('prodUpload','fetch_data');
        fd.append('prodBrand',prodBrand);
        fd.append('prodGender',prodGender);
        fd.append('mrp',mrp);
        fd.append('price',price);
        fd.append('prodCol',prodCol);
        fd.append('prodSize',prodSize);
        fd.append('prodCategory',prodCategory);
        fd.append('prodSubCategory',prodSubCategory);
        fd.append('stock',stock);
        fd.append('mainProdImage',mainProdImage[0]);

        $.ajax({
            url:"action.php",
            type: "post",
            data:fd,
            contentType: false,
            processData: false,
            success: function(data){
                if(data == 1){
                    location.replace("catUp.php");
                }
                if(data == 2){
                    location.replace("catDown.php");
                }
                if(data == 7){
                    location.replace("catSpec.php");
                }
            },
            error: function(data){
                $("#Error").html("There was some Error while uploading this data. Please Check your data.");
            }
        });
    }
});

</script>
</body>
</html>