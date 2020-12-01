<script>
function showNoti(){
    // alert("Ok i was called");
    let ele = document.getElementById("noti");
    // alert("hmm");
    // document.writeln("hmm");
    if(ele.classList.contains("show")){
        ele.classList.remove("show");
    }
    ele.classList.add("show");
    setTimeout(() => {
        ele.classList.remove("show");
    }, 3000);
    
}
</script>
<?php
$user = $_SESSION['user_id'];
if($user==0){
    head('userLogIn.php');
}
else
{
    if($_SERVER['REQUEST_METHOD']=="POST"){
        if(isset($_POST['deletefromcart'])){
            $item_id = $_POST['item_id'];
            $sql = "DELETE FROM `cart` WHERE `cart`.`item_id` = $item_id and `cart`.`user_id` = $user; ";
            mysqli_query($con,$sql);
        }
        if(isset($_POST['addtobookmark'])){
            $item_id = $_POST['item_id'];
            $sql = "INSERT INTO `wishlist` (`item_id`, `user_id`) VALUES ('$item_id', '$user')";
            mysqli_query($con,$sql);
            $sql = "DELETE FROM `cart` WHERE `cart`.`item_id` = $item_id and `cart`.`user_id` = $user";
            mysqli_query($con,$sql);
        }
        if(isset($_POST['buy'])){
            echo "<script>showNoti();</script>";
            $sql = "SELECT * FROM cart where user_id=$user and order_status = 0;";
            $result = mysqli_query($con,$sql);
            $num= mysqli_num_rows($result);

            while($row = mysqli_fetch_assoc($result)){
                $q = "qty".$row['item_id'];
                $qty = $price = "";
                
                if(isset($_COOKIE["$q"])){
                    $qty = $_COOKIE["$q"];
                }
                $p = "price".$row['item_id'];
                if(isset($_COOKIE["$p"])){
                    $price = $_COOKIE["$p"];
                }
                if(!isset($price) || $price == ""){
                    $sql = "SELECT item_price from product where item_id=".$row['item_id'];
                    $result = mysqli_query($con,$sql);
                    $p = mysqli_fetch_assoc($result);
                    $price = $p['item_price'];
                }
                if(!isset($qty) || $qty==""){
                    $qty = 1;
                }
                $date = date("Y-m-d");
                $sql = "UPDATE `cart` SET `qty` = '$qty', `price` = '$price',`order_date` = '$date' WHERE CONCAT(`cart`.`cart_id`) =".$row['cart_id'];
                mysqli_query($con,$sql);

                $sqlStock = "SELECT item_stock from product where item_id =".$row['item_id'];
                $resultStock = mysqli_query($con,$sqlStock);
                $stock = "";
                while($row3 = mysqli_fetch_assoc($resultStock)){
                    $stock = $row3['item_stock'];
                }
                $stock = $stock - $qty;

                $sql = "UPDATE `product` SET `item_stock` = '$stock' WHERE `product`.`item_id` = ".$row['item_id'];
                mysqli_query($con,$sql);

                setcookie($p, time() - 3600);
                setcookie($q, time() - 3600);
                }

        }
    }

    $sql = "SELECT * FROM product WHERE item_id IN (SELECT item_id FROM cart WHERE user_id = $user and order_status = 0) ";
    $result = mysqli_query($con,$sql);
    $resultcheck = mysqli_num_rows($result);


    if($resultcheck > 0){
        $subtotal =0 ;
        $itemMRP = 0;
        $itemDiscount = 0;
        $itemnum =0;
    ?>
    <script>

        function incSubtotal(add){
            val = parseInt(document.getElementById("deal-price").textContent);         //Increase price of the product
            var dealMrp = parseInt(document.getElementById("MRP").value);
            val = val+parseInt(add);
            document.getElementById("deal-price").textContent = val;
            document.getElementById("deal-Discount").textContent = dealMrp - val;
        }

        function decSubtotal(sub){
            val = parseInt(document.getElementById("deal-price").textContent);         //Increase price of the product
            var dealMrp = parseInt(document.getElementById("MRP").value);
            val = val-parseInt(sub);
            document.getElementById("deal-price").textContent = val;
            document.getElementById("deal-Discount").textContent = dealMrp - val;
        }

        function inc(param){
            var par = param;
            let span = "span"+par;
            let mrpSpan = "mrpSpan"+par;
            let txt = "txt"+par;
            let mrpPrice = "mrpPrice"+par;
            var item_price = document.getElementById(txt).value;
            var item_mrp = document.getElementById(mrpPrice).value;
            var dealMrp = document.getElementById("MRP").value;
            var itemPriceCookie = "price"+par;
            var itemQtyCookie = "qty"+par;
            let val = document.getElementById(par).value;                       //Accessing product counter's value
            var mrp = item_mrp*val;

            if(val<=9){
                val++;                                                          //Increasing product counter's value
                document.getElementById("MRP").value = parseInt(dealMrp) + parseInt(item_mrp);
                document.getElementById("deal-MRP").textContent = parseInt(dealMrp) + parseInt(item_mrp);
                incSubtotal(item_price);
            }
            
            document.getElementById(par).value = val;                           //Change quantity section value
            document.getElementById(span).textContent = item_price*val;         //Increase price of the product
            document.getElementById(mrpSpan).textContent = item_mrp*val;         //Increase mrp of the product

            document.cookie = itemPriceCookie +"="+ item_price*val;              // Setting cookie
            document.cookie = itemQtyCookie +"="+ val;              // Setting cookie

        }
        function dec(param){
            var par = param;
            let span = "span"+par;
            let mrpSpan = "mrpSpan"+par;
            let txt = "txt"+par;
            let mrpPrice = "mrpPrice"+par;
            var dealMrp = document.getElementById("MRP").value;
            var item_price = document.getElementById(txt).value;
            var item_mrp = document.getElementById(mrpPrice).value;
            var itemPriceCookie = "price"+par;
            var itemQtyCookie = "qty"+par;
            let val = document.getElementById(par).value;                       //Accessing product counter's value
            let mrp = item_mrp*val;

            if(val>1){
                val--;
                document.getElementById("MRP").value = parseInt(dealMrp) - parseInt(item_mrp);
                document.getElementById("deal-MRP").textContent = parseInt(dealMrp) - parseInt(item_mrp);
                decSubtotal(item_price);
            }
            document.getElementById(par).value = val;
            document.getElementById(span).textContent = item_price*val;           //Decreasing Price
            document.getElementById(mrpSpan).textContent = item_mrp*val;         //Decrease mrp of the product

            document.cookie = itemPriceCookie +"="+ item_price*val;              // Setting cookie
            document.cookie = itemQtyCookie +"="+ val;              // Setting cookie
        }
 
    </script>
<style>
    body{
        background-color: white!important;
    }
    .main-container{
        width: 75%;
    }
    .cart-img{
        max-height: 150px;
    }
    .cart-product-card{
        width: 80%;
    }
    .noti{
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: gray;
        color: white;
        font-size: large;
        border-radius: 5px;
        border: 2px solid green;
        height: 2.5rem;
        padding: 0.5rem;
        /* width: 0rem; */
        /* display: none; */
        position: absolute;
        right: 10%;
        top: -15%;
        transition: ease-in-out 3s;
    }
    .show{
        /* display: flex; */
        top: 5%;
    }
    .cta{
        border-top: 1px solid lightgray;
    }
    @media screen and (max-width: 1080px){
        .main-container{
            width: 100%;
        }
        .cart-img{
            max-height: 130px;
        }
        .cart-product-card{
            width: 100%;
        }
        .cart-price-section{
            display: flex;
        }
        .cta{
            border: none;
            margin-top: 2rem;
        }
    }
</style>
<!-- <form method="post"> -->
        <!-- cart section starts -->
        <!-- <seciton class="py-3 px-0" id="cart"> -->
            <div class="container-fluid mt-5 main-container">
                <div class="row p-0">
                    <div class="col-sm-8 border-right border-top">
    <?php 
    $itemnum=0;    
    while($row = mysqli_fetch_assoc($result)){
        $subtotal += $row['item_price'];
        $itemMRP += $row['item_mrp'];
        $itemDiscount += $row['discount'];
        $itemnum++;
        $item_id = $row['item_id'];
        $table = $row['item_catagory'];
        $shopId = $row['shopId'];
        ?>
            
    <!-- Product display starts -->

                    <!-- <div class="container" style="background-color: white;"> -->
                        <!-- card items -->
                        <!-- <div> -->
                            <div class="row py-3 mt-3 mx-auto cart-product-card p-0" style="border-left:1px solid lightgray; border-right:1px solid lightgray; border-top:1px solid lightgray; border-radius: 5px 5px 0 0;">
                                <div class="col-xl-3 col-lg-2 col-md-4 col-sm-4 col-4">
                                    <img src="<?php echo $row['item_img']?>" class="img-fluid cart-img" alt="">
                                </div>
                                <div class="col-xl-6 col-lg-7 col-md-8 col-sm-8 col-8 p-1">
                                    <h5> <?php echo $row['item_brand']?>  </h5>
                                    <?php

                                    $subCat = '';
                                    $sql3 = "SELECT * from subcategory where subcat_id = ".$row['item_subcat'];
                                    $result3  = mysqli_query($con,$sql3);
                                    while($row3 = mysqli_fetch_assoc($result3)){
                                    $subCat = $row3['subcat_name'];
                                    }
                        

                                    $item_id = $row['item_id'];
                                        $occ = $fit = '';
                                    if($table==1){
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
                                    <br>
                                    <?php
                                        $sqlShopInfo = "SELECT shopName  FROM shopinfo where shopId = ".$shopId;
                                        $resultShopInfo = mysqli_query($con,$sqlShopInfo);
                                        $shopName = mysqli_fetch_assoc($resultShopInfo);
                                    ?>
                                    <small><span style="color: grey;">Sold by: <?php echo $shopName['shopName'];?></span></small>
                                    <!-- product rating -->
                                    <!-- <div class="d-flex">
                                        <div class="rating text-warning">
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="far fa-star"></i></span>
                                        </div>
                                    </div> -->
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12"  style="display: flex; align-items: center;">
                                            <?php
                                                $sqlProductSize = "SELECT size from cart where item_id = $item_id and user_id =$user";
                                                $resultProductSize = mysqli_query($con,$sqlProductSize);
                                                $productSize = mysqli_fetch_assoc($resultProductSize);
                                            ?>
                                            <p class="my-auto" style="padding: 3px;"> <span style="font-weight: 600;">size: <?php echo $productSize['size'];?></span> </p>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                            <div class="qty d-flex pt-2 text-center"  style="display: flex; align-items: center; padding: 3px;">
                                                <h6>Qty: </h6>&nbsp;&nbsp;&nbsp;
                                                <div class="d-flex text-center">
                                                    <button class="qty_up" style="border: 1px solid black; padding: 5px; height: 1.2rem; display:flex; align-items:center;" onclick="inc('<?php echo $item_id;?>')"><i class="fas fa-angle-up"></i></button>
                                                    <input type="text" id="<?php echo $item_id;?>" name="qty<?php echo $item_id;?>" style="border: 1px solid black; height: 1.2rem; text-align: center; width: 30px;" class="qty_input mx-1" value="1" readonly>
                                                    <button class="qty_down" style="border: 1px solid black; padding: 5px; height: 1.2rem; display:flex; align-items:center;" onclick="dec('<?php echo $item_id;?>')"><i class="fas fa-angle-down"></i></button>                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 text-right" style="display: flex; justify-content:center; align-items:center;">
                                    <div class="">
                                        <input type="hidden" id="<?php echo "txt".$item_id;?>" value="<?php echo $row['item_price']; ?>">
                                        <input type="hidden" id="<?php echo "mrpPrice".$item_id;?>" value="<?php echo $row['item_mrp']; ?>">
                                        <?php
                                            $itemPriceCookie = "price".$row["item_id"];
                                            $itemQtyCookie = "qty".$row["item_id"];
                                        ?>
                                        <script>
                                            document.cookie = "<?php echo $itemPriceCookie;?> = <?php echo $row["item_price"];?>" ;
                                            document.cookie = "<?php echo $itemQtyCookie;?> = 1";
                                        </script>

                                        <div class="cart-price-section">
                                            <span class="mx-1" style="font-weight: 700;">Rs.</span><span id="<?php echo "span".$item_id;?>" value="<?php echo $row['item_price']; ?>" style="font-weight: 700; font-size:medium"><?php echo $row['item_price']?></span><br>&nbsp;&nbsp;
                                            <s style="color: grey;">Rs.<span class="strikedPrice" style="font-size: small;" id="<?php echo "mrpSpan".$item_id;?>" value="<?php echo $row['item_mrp']; ?>"><?php echo $row['item_mrp']?></span></s>&nbsp;&nbsp;<span style="color: orange;"><?php echo $row['discount']?>%off</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form method="post">
                                <div class="row mx-auto pt-1 cart-product-card" style="border-left:1px solid lightgray; border-right:1px solid lightgray; border-bottom:1px solid lightgray; border-radius: 0 0 5px 5px;">
                                    <input type="hidden" name="item_id" value="<?php echo $item_id; ?>">
                                    <input type="hidden" name="user_id" value="<?php echo $user; ?>">
                                    <div class="col-4 text-center ml-2 mb-2 border-top p-0"><button type="submit"name="deletefromcart" class=" btn px-3 border-right shadow-none" style="width: 100%; height:100%; font-size:1.05rem; font-weight: 600; color:#6e6e6e;">REMOVE</button></div>
                                    <div class="col text-center border-top mb-2 mr-2 p-0"><button type="submit" name="addtobookmark" class="btn shadow-none" style="width: 100%; height:100%; font-size:1.05rem; font-weight: 600; color:#6e6e6e">MOVE TO WISHLIST</button></div>
                                </div>
                            </form>
                        <!-- </div> -->
                                
                    <!-- </div> -->
    <!-- cart section ends -->


    <!-- Product display ends -->

        <?php
        }  
    ?>
                <a href="bookmark.php" style="color: black;"><div class="cart-product-card border mx-auto mt-3 py-3 px-3" style="display: flex;"><i class="far fa-bookmark my-auto" style="font-size: larger;"></i>&nbsp;&nbsp;<span style="font-weight: 500;">Add More From Wishlist</span><div class="ml-auto"><i class="fas fa-chevron-right" style="font-size: large;"></i></div></div></a>

            </div>
            <!-- ?php include_once 'Template/_priceSection.php';?> -->
            <div class="col-md-4 cta px-4 pt-3" style="">
                <input type="hidden" id="MRP" value="<?php echo $itemMRP;?>">
                <input type="hidden" id="DISCOUNT" value="<?php echo $itemMRP - $subtotal;?>">
                <h6 class="">PRICE DETAILS (<?php echo $itemnum; if($itemnum>1){echo " items";}else{echo " item";}?>)</h6>
                <div style="display: flex; justify-content: space-between;">
                    <span>Total MRP: </span>
                    <span>Rs. <span id="deal-MRP" value="<?php echo $itemMRP;?>"> <?php echo $itemMRP;?></span> </span>
                </div>
                <div style="display: flex; justify-content: space-between;">
                    <span>Discount on MRP: </span>
                    <span>-Rs. <span id="deal-Discount" value = "<?php echo $itemMRP - $subtotal;?>"><?php echo $itemMRP - $subtotal;?></span></span>
                </div>
                <hr>
                <div style="display: flex; justify-content: space-between;">
                    <h6>Total Amount </h6>
                    <span>Rs. <span id="deal-price"><?php echo $subtotal?></span></span>
                </div>
                <p style="font-size: small; color:gray; margin-top:0.5rem;">Due to some security reasons Online Payment is not available on this site now.<br>Payment on delivery is available.</p>
                <form action="" method="post">
                    <button class="btn btn-block my-2 shadow-none"  name="buy" id="buy" style="font-weight: 600; color: white; background-color: tomato;">BUY NOW</button>
                </form>
            </div>
            <!-- subtotal section ends -->


            </div>
            
                </div>
                </div>
                <div id="noti" class="noti">
                    <p>Order placed successfully</p>
                </div>
        <!-- </seciton> -->
        <!-- </form> -->
    <?php
    }
    else
    {
    echo "Nothing found.";
    }    
}
?>