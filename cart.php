<?php include_once 'header.php';?>
<script>
    $('.CheckOutStage2').hide();
    $("#confirmationBox").hide();
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
        if(isset($_POST['sureDeleteFromCart'])){
            $item_id = $_POST['item_id'];
            $sql = "DELETE FROM `cart` WHERE `cart`.`item_id` = $item_id and `cart`.`user_id` = $user; ";
            mysqli_query($con,$sql);
        }
        if( isset($_POST['addtobookmark']) || isset($_POST['sureAddtobookmark']) ){
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
                $sql = "UPDATE `cart` SET `qty` = '$qty', `price` = '$price',`order_status` = '1',`order_date` = '$date' WHERE CONCAT(`cart`.`cart_id`) =".$row['cart_id'];
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

            }
            
            $sql = "SELECT addArr from user where user_id = ".$_SESSION['user_id'];
            $result = mysqli_query($con,$sql);
            $addArr= "";
            while($row = mysqli_fetch_assoc($result)){
                $addArr = $row;
            }
            $addArr = unserialize($addArr['addArr']);

            $sql = "SELECT user_image from user where user_id = ".$user;
            $result = mysqli_query($con,$sql);
            $userImage = "";
            while($row = mysqli_fetch_assoc($result)){
                $userImage = $row['user_image'];
            }

            $orderAddress = $addArr[$_POST['address']]['address']." ".$addArr[$_POST['address']]['city']."-".$addArr[$_POST['address']]['pin'];

            $orderAdd = array("name"=>$addArr[$_POST['address']]['name'],"address"=>$orderAddress,"mobile"=>$addArr[$_POST['address']]['mobile'],"userImage"=>$userImage);

            $orderAdd = serialize($orderAdd);

            $sql = "UPDATE `user` SET `orderAdd` = '$orderAdd' WHERE `user`.`user_id` = ".$_SESSION['user_id'];
            mysqli_query($con,$sql);

            setcookie($p, time() - 3600);
            setcookie($q, time() - 3600);

            head("index.php");
        }

        if(isset($_POST['addrRemoveBtn'])){
            $sql = "SELECT addArr from user where user_id = ".$_SESSION['user_id'];
            $result = mysqli_query($con,$sql);
            $addArr= "";
            while($row = mysqli_fetch_assoc($result)){
                $addArr = $row;
            }
            $addArr = unserialize($addArr['addArr']);
            unset($addArr[$_POST['addrRemoveBtn']]);
            $addArr = array_values($addArr);
            $addArr = serialize($addArr);
            $sql = "UPDATE `user` SET `addArr` = '$addArr' WHERE `user`.`user_id` = ".$_SESSION['user_id'];
            $result = mysqli_query($con,$sql);
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
    .CheckOutStage2{
        display: none;
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
    <div class="container-fluid mt-5 main-container">   
        <div class="row p-0">
            <?php
            include_once 'Template/_finalProductSection.php';
            include_once 'Template/_finalOrderAddressSection.php';
            include_once 'Template/_priceSection.php';
            ?>
        </div>    
    </div>
    <?php
    }
    else
    {
    echo "Nothing found.";
    }    
}
?>

<script>

    

    $(".deletefromcart").click(function(e){
        e.preventDefault();
    });


    $("#proceedTransaction").click(function(event){
        event.preventDefault();
        $('.CheckOutStage2').show();
        $('.CheckOutStage1').hide();
        $("html, body").animate({ scrollTop: 0 }, 700);
    });

    function isEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }
    $("#addNewName").focus(function(){
        $("#addNewName").removeAttr("style");
        $("#addNewNameError").html("");
    });
    $("#addNewMobile").focus(function(){
        $("#addNewMobile").removeAttr("style");
        $("#addNewMobileError").html("");
    });
    $("#addNewPin").focus(function(){
        $("#addNewPin").removeAttr("style");
        $("#addNewPinError").html("");
    });
    $("#addNewAdderss").focus(function(){
        $("#addNewAdderss").removeAttr("style");
        $("#addNewAdderssError").html("");
    });
    $("#addNewCity").focus(function(){
        $("#addNewCity").removeAttr("style");
        $("#addNewCityError").html("");
    });
    $("#addAddress").click(function(event){
        event.preventDefault();
        var validate = true;
        $("#Error").html("");

        let addNewName = $("#addNewName").val();
        let addNewMobile = $("#addNewMobile").val();
        let addNewPin = $("#addNewPin").val();
        let addNewAdderss = $("#addNewAdderss").val();
        let addNewCity = $("#addNewCity").val();
        let addAdd = "fetch_data";

        if( addNewName === null || addNewName === '' ||addNewMobile === null || addNewMobile === '' ||addNewPin === null || addNewPin === '' ||addNewAdderss === null || addNewAdderss === '' ||addNewCity === null || addNewCity === ''){
            if(addNewName === null || addNewName === '' ){
                $("#addNewName").css({"border": "1px solid red"});
                $("#addNewNameError").html("Please enter Name");
            }
            if(addNewPin === null || addNewPin === ''){
                $("#addNewPin").css({"border": "1px solid red"});
                $("#addNewPinError").html("Please enter Pincode");
            }
            if(addNewMobile === null || addNewMobile === ''){
                $("#addNewMobile").css({"border": "1px solid red"});
                $("#addNewMobileError").html("Please enter Contact Number");
            }
            if(user_email === null || user_email === ''){
                $("#user_email").css({"border": "1px solid red"});
                $("#EmailError").html("Please enter Email-Id");
            }
            if(addNewAdderss === null || addNewAdderss === ''){
                $("#addNewAdderss").css({"border": "1px solid red"});
                $("#addNewAdderssError").html("Please enter Address");
            }
            if(addNewCity === null || addNewCity === ''){
                $("#addNewCity").css({"border": "1px solid red"});
                $("#addNewCityError").html("Please enter City");
            }
        }
        if(validate){
            
            var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;

            if (filter.test(addNewMobile)) {
              if(addNewMobile.length==10){
                   validate = true;
              } else {
                $("#addNewMobile").css({"border": "1px solid red"});
                $("#addNewMobileError").html("Please put 10  digit mobile number");
                  validate = false;
              }
            }
            else {
                $("#addNewMobile").css({"border": "1px solid red"});
                $("#addNewMobileError").html("Not a valid number");
                  validate = false;
            }

            if(addNewPin.length != 6){
                validate = false;
                $("#addNewPin").css({"border":"1px solid red"});
                $("#addNewPinError").html("Please Enter a valid Pincode");
            }

        }
        if(validate){
            $.ajax({
                url: "action.php",
                type:"post",
                data:{addAdd:addAdd,addNewName:addNewName,addNewAdderss:addNewAdderss,addNewMobile:addNewMobile,addNewCity:addNewCity,addNewPin:addNewPin},
                success: function(data){
                    if(data == 1){
                        location.replace("cart.php");
                        $('.CheckOutStage1').hide();
                        $('.CheckOutStage2').show();
                    }
                    else if(data ==2){
                        $("#Error").html("There was some unkown error");
                    }
                    else{
                        $("#Error").html("There was some unkown error");
                    }
                }
            });
        }
    });
</script>


<?php
include_once 'footer.php';
?>