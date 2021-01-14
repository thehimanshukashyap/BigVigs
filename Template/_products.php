<style>
    body{
        background-color: white!important;
    }
    a{
        text-decoration: none!important;
    }
    .similarProduct::-webkit-scrollbar {
        width: 20px!important;
    }


    .radio-tile-group .input-container {
        position: relative;
        height:  3.4rem;
        width:  3.4rem;
        margin: 0 0.35rem;
   }   

    .radio-tile-group .input-container .radio-button {
      opacity: 0;
      position: absolute;
      top: 0;
      left: 0;
      height: 100%;
      width: 100%;
      margin: 0;
      cursor: pointer;
    }

    .radio-tile-group .radio-tile {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      width: 100%;
      height: 100%;
      border: 2px solid lightgray;
      border-radius: 50%;
      padding: 1rem;
      transition: transform 300ms ease;
    }

    .radio-tile-group .icon svg {
      fill: blue;
      width: 3rem;
      height: 3rem;
    }

    .radio-tile-group .radio-tile-label {
      text-align: center;
      font-size: 1rem;
      font-weight: 600; 
      text-transform: uppercase;
      /* letter-spacing: 1px; */
      color: black;
    }

    .radio-tile-group .radio-button:checked + .radio-tile {
      /* background-color: blue; */
      border: 2px solid orangered;
      color: white;
      transform: scale(1.1, 1.1);
    }

    .radio-tile-group {
        display: flex;
        flex-wrap: wrap;
    }

    .shake{
        display: flex;
        animation: shake 0.3s;
        animation-iteration-count: 2;
    }

    .redthis{
        border: 1px solid red;
    }

    .productViewCarousel{
        height: 350px;
    }

    @keyframes shake {
        0% { transform: translate(1px, 0px) rotate(0deg); }
        10% { transform: translate(-1px, 0px) rotate(0deg); }
        20% { transform: translate(-3px, 0px) rotate(0deg); }
        30% { transform: translate(3px,0px) rotate(0deg); }
        40% { transform: translate(1px, 0px) rotate(0deg); }
        50% { transform: translate(-1px, 0px) rotate(0deg); }
        60% { transform: translate(-3px, 0px) rotate(0deg); }
        70% { transform: translate(3px, 0px) rotate(0deg); }
        80% { transform: translate(-1px, 0px) rotate(0deg); }
        90% { transform: translate(1px, 0px) rotate(0deg); }
        100% { transform: translate(1px, 0px) rotate(0deg); }
    }

</style>
<script>
    function shake(){
        event.stopPropagation();
        // red();
        var u = document.getElementById("radioShake");
        if(u.classList.contains("shake")){
            u.classList.remove("shake");
        }
        u.classList.add('shake');
        setTimeout(function(){
        	u.classList.remove('shake');
        }, 500);
    }
</script>
<?php

function getSpecHeading( $val ){
    $word1 = "";
    $underScore = 0;
    $count = 0;
    for($i=0;$i<strlen($val);$i++){
        if(preg_match('~^\p{Lu}~u', $val[$i])){
            $count = $i;
        }
        if($val[$i] === "_"){
            $underScore = 1;
            
        }
    }
    if($underScore == 1){
        $word1 = explode("_",$val);
        if($word1[0] === 'glass')
        {
            return ucwords($word1[1]);
        }
        else{
            return ucwords($word1[0])." ".ucwords($word1[1]);
        }
            
    }
    else{
        if($count == 0){
            return ucwords($val);
        }
        else{
            $k = '';
            $word = str_split($val,$count);
            if(isset($word[2])){
                $k = $word[2];
            }
            return  ucwords($word[0])." ".ucwords($word[1]).$k;
        }
    }
}

if($_SERVER['REQUEST_METHOD']=="POST"){
    
    if(isset($_POST['addtoWishlist']))
    {
        if(isset($_SESSION['user_id'])){
            $user = $_SESSION['user_id'];
            $item = $_POST['item_id'];

            $sql = "INSERT INTO `wishlist` (`item_id`, `user_id`) VALUES ('$item', '$user');";
            mysqli_query($con,$sql);
        }
        else{
            head("userLogIn.php");
        }
    }
}

 $item_id = $_GET['item_id'];

 $similarColor = $similarSubcat = "";

 $sql = "SELECT * FROM product where item_id = $item_id";
 $result = mysqli_query($con,$sql);
 $resultcheck = mysqli_num_rows($result);


 if($resultcheck > 0){
   while($row = mysqli_fetch_assoc($result)){
       
    $similarColor = $row['item_col'];
    $similarSubcat = $row['item_subcat'];

?>

<form action="" method="post">

<section id="product" class="py-3">
        <div class="container-fluid" style="width: 97%;">
            <div class="row">
                <div class="col-sm-7 p-0">
                    <div class="owl-carousel owl-theme top-banner-div smallImage m-0">
                        <img src="<?php echo $row['item_img']?>" alt="" class="productViewCarousel">
                        <?php
                            $imageArray = unserialize($row['item_images']);
                            foreach($imageArray as $img){
                                ?>
                                <img src="<?php echo $img?>" alt="" class="productViewCarousel">
                                <?php
                            }
                        ?>
                    </div>
                    <div class="row mx-0 bigImage">
                        <div class="col-6 p-1">
                            <img src="<?php echo $row['item_img']?>" class="img-fluid" alt="" style="width: 100%; height: 70vh;">
                        </div>
                        <?php
                            $imageArray = array();
                            $sqlImages = "SELECT item_images from product where item_id = ".$item_id;
                            $resultSqlImgaes = mysqli_query($con,$sqlImages);
                            while($rowImgaes = mysqli_fetch_assoc($resultSqlImgaes)){
                                $imageArray = unserialize($rowImgaes['item_images']);
                            }
                            foreach($imageArray as $image){
                                ?>
                                 <div class="col-6 p-1">
                                     <img src="<?php echo $image;?>" class="img-fluid" alt="" style="width: 100%; height: 70vh;">
                                 </div>
                                 <?php
                            }
                            
                        ?>
                    </div>
                </div>
                <div class="col-sm-5 my-2 px-4">
                <?php   
                    $table = $row['item_catagory'];
                    $subCat = '';
                    $sql3 = "SELECT * from subcategory where subcat_id = ".$row['item_subcat'];
                    $result3  = mysqli_query($con,$sql3);
                    while($row3 = mysqli_fetch_assoc($result3)){
                      $subCat = $row3['subcat_name'];
                    }            
                ?>
                <h3 class="my-0"><?php echo $row['item_brand']?></h3>
                <div class="mt-0" style="color: gray; font-size:1.4rem;font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">
                <?php
                    $specificationArr = array();
                    if($table==1){
                        $sql1 = "SELECT * FROM specdropu where item_id = $item_id";
                        $specification = mysqli_query($con,$sql1);
                        while($spec = mysqli_fetch_assoc($specification)){
                            $specificationArr[] = $spec;
                        }
                        echo $specificationArr[0]['fit']." ".$specificationArr[0]['occasion']." ".$subCat;
                    }
                    if($table == 2){
                        $sql2 = "SELECT * FROM specdropb where item_id = $item_id";
                        $specification = mysqli_query($con,$sql2);
                        while($spec = mysqli_fetch_assoc($specification)){
                            $specificationArr[] = $spec;
                        }
                        echo $specificationArr[0]['fit']." ".$specificationArr[0]['occasion']." ".$subCat;
                    }
                    if($table==7){
                        $shape = $type = "";
                        $sqlGlassSpec = "SELECT * FROM specglasses where item_id =".$item_id;
                        $resultGlassSpec = mysqli_query($con,$sqlGlassSpec);
                        while($rowGlassSpec = mysqli_fetch_assoc($resultGlassSpec)){
                            $specificationArr[] = $rowGlassSpec;
                            $shape = $rowGlassSpec['face_shape'];
                            $type = $rowGlassSpec["glass_type"];
                        }
                        echo $shape." ".$type." "."Sunglasses";
                    }
                ?>
                </div>
                    <!-- <div class="d-flex">
                        <div class="rating text-warning">
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="far fa-star"></i></span>
                        </div>
                        <a href="#" class="px-2">20,534 ratings | 10000+ answered</a>
                    </div>
                    <hr> -->

                 <!-- Product Price starts -->
                    <div style="display: flex; align-items: center; margin-top:1rem;">
                        <div style="font-size: x-large; font-weight: 600;">Rs.&nbsp;<span><?php echo $row['item_price']?></span></div>&nbsp;&nbsp;&nbsp;&nbsp;
                        <s style="font-size: large; font-weight:400; color:gray;">Rs.&nbsp;<?php echo $row['item_mrp']?></s>&nbsp;&nbsp;
                        <span style="font-weight: 600; font-size: larger; color: orange;">(<?php echo $row['discount']?>%&nbsp;off)</span>&nbsp;&nbsp;
                        
                    </div>
                    <small style="color: gray; font-weight: bold; font-size: medium;">inclusive all taxes</small>

                    <div class="size my-3 p-0">
                        <h5 class="my-auto">Select Size: </h5><br>

                        <div class="radio-tile-group" id="radioShake">

                          <form action="" method="post">
                            <?php
                            $sqlProductSize = unserialize($row['item_size']);
                            foreach($sqlProductSize as $ProductSize){
                              ?>

                              <div class="input-container">
                                    <input class="radio-button" type="radio" name="productSize" value="<?php echo $ProductSize;?>"/>
                                    <div class="radio-tile" id="radioBorder">
                                        <label for="walk" class="radio-tile-label m-auto"><?php echo $ProductSize;?></label>
                                    </div>
                              </div>

                              <?php
                            }
                            ?>
                            </form>

                        </div>
                            
                    </div>

                    <div class="form-row pt-3 smallPageCTA">
                        <div class="col">
                            <button class="btn btn-block shadow-none" name="addtoWishlist" style="border: 1px solid gray; padding: 0.7rem 0;">WISHLIST</button>
                        </div>
                        <div class="col">
                            <input type="hidden" name="item_id" id="item_id" value="<?php echo $item_id; ?>">
                            <input type="hidden" name="shop_id" id="shop_id" value="<?php echo $row['shopId']; ?>">

                            <?php
                                $sqlCartCheck = "SELECT * from cart where order_status = 0 and item_id = ".$item_id;
                                $CartCheckResult = mysqli_query($con,$sqlCartCheck);
                                if(mysqli_num_rows($CartCheckResult) == 0){
                                    ?>
                                    <button class="btn btn-danger btn-block shadow-none" name="addtocart" id="addtocartSmallPageCTA" style="padding: 0.7rem 0;">Add to Cart</button>
                                    <?php
                                }
                                else{
                                    ?>
                                    <a href="cart.php" class="btn btn-danger btn-block shadow-none" name="gotocart" id="gotocart" style="padding: 0.7rem 0;">Go to Cart</a>
                                    <?php
                                }
                            ?>

                            
                        </div>                        <!-- </div> -->
                    </div>
                    <div class="form-row pt-3 largePageCTA"> 
                        <div class="col">
                            <input type="hidden" name="item_id" id="item_id" value="<?php echo $item_id; ?>">
                            <input type="hidden" name="shop_id" id="shop_id" value="<?php echo $row['shopId']; ?>">
                            <!-- <button class="btn btn-danger btn-block shadow-none" name="addtocart" id="addtocart" style="padding: 0.7rem 0;">Add to Cart</button> -->

                            <?php
                                $sqlCartCheck = "SELECT * from cart where order_status = 0 and item_id = ".$item_id;
                                $CartCheckResult = mysqli_query($con,$sqlCartCheck);
                                if(mysqli_num_rows($CartCheckResult) == 0){
                                    ?>
                                    <button class="btn btn-danger btn-block shadow-none" name="addtocart" id="addtocartLargePageCTA" style="padding: 0.7rem 0;">Add to Cart</button>
                                    <?php
                                }
                                else{
                                    ?>
                                    <a href="cart.php" class="btn btn-danger btn-block shadow-none" name="gotocart" id="gotocart" style="padding: 0.7rem 0;">Go to Cart</a>
                                    <?php
                                }
                            ?>


                        </div>
                        <div class="col">
                        <button class="btn btn-block shadow-none" name="addtoWishlist" style="border: 1px solid gray; padding: 0.7rem 0;">WISHLIST</button>
                        </div>
                    </div>


                <!-- Product Price ends -->
                <!-- policy starts -->
                    <div id="policy">
                        <div class="d-flex my-3 justify-content-center">
                            <div class="return text-center mr-5">
                                <div class="my-2">
                                    <span class="fas fa-retweet p-3 rounded-pill border"></span>
                                </div>
                                <a href="#">10 Days <br>Replacement</a>
                            </div>
                            <div class="return text-center mr-5">
                                <div class="my-2">
                                    <span class="fas fa-truck p-3 rounded-pill border"></span>
                                </div>
                                <a href="#">Fast <br>Delivery</a>
                            </div>
                            <div class="return text-center mr-5">
                                <div class="my-2">
                                    <span class="fas fa-check-double p-3 rounded-pill border"></span>
                                </div>
                                <a href="#">Great <br>Quality</a>
                            </div>
                        </div>
                    </div>
                    <!-- policy ends -->
                    <hr>
                    <!-- order details starts -->
                    <div class="d-flex flex-column text-dark" id="order-details">
                        <small>Sold by&nbsp;&nbsp;<a href="#"><?php echo $row['item_brand']?></a>&nbsp;<!--(4.5 out of 5 | 18,198 ratings) --></small>
                        <small><i class="fas fa-map-marker-alt color-primary">&nbsp;&nbsp;Deliver to - <?php echo $_SESSION['full_name']??'You'; ?></i></small>
                    </div>
                    <!-- order details ends -->
                    <h6 class="my-3">Specifications</h6>
                    <div class="row p-1 my-1">
                        <?php
                                foreach($specificationArr[0] as $spec=>$val){
                                    if(!empty($val && $spec != 'item_id')){
                                        ?>
                                        <div class="col-6">
                                            <p style="font-size: 0.85rem; color:gray; margin:0; line-height: 1rem;"><?php echo getSpecHeading($spec);?></p>
                                            <!-- <p style="font-size: medium; margin:0;line-height: 2rem; color:lightblack">Slim Fit</p> -->
                                            <?php echo $val; ?>
                                            <hr class="mt-1" style="width: 90%;">
                                        </div>
                                        <?php
                                    }
                                }
                            ?>
                    </div>
                    
                </div>
                <div class="col-12">
                    <h6>Product Description</h6>
                    <hr>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Natus sint facilis dolore pariatur velit voluptatibus itaque vel repudiandae facere culpa ipsam ipsa vitae dolor consequuntur dolorum, quo, ipsum atque similique unde id adipisci! Molestiae nemo ipsum quos rem illo, ullam, recusandae, facilis libero voluptate quaerat in iusto! Optio soluta sunt incidunt quas atque cumque cupiditate autem? Adipisci neque iusto quo iure autem similique aliquid sint quaerat impedit. Praesentium, vero, fugit soluta, mollitia sit consequatur earum error veritatis molestiae harum molestias?</p>
                </div>
            </div>
        </div>
    </form>
    </section>
    <!-- Product display ends -->


     <?php
   }
 }  
 else
 {
   echo "Nothing found.";
 }
 ?>

<?php $itemhai = $item_id;?>


    
<?php 
$sql = "SELECT * FROM product where item_col = $similarColor  and item_subcat = $similarSubcat";
$result = mysqli_query($con,$sql); 
if(mysqli_num_rows($result)>1){
    ?>
    <div>
    <h3 id="seasonal-sale-heading" style="color: #2e2d2d">SIMILAR PRODUCTS</h3>
    <div class="similarProduct border" style="display: flex; overflow-x:scroll;">
    <?php
while($row = mysqli_fetch_assoc($result)){

      if($row['item_id'] != $itemhai){
        //   for($i =0;$i<10;$i++){

?>
      <div class="card1 my-2 mx-2" style="flex-shrink: 0;">
                <a href='<?php printf('%s?item_id=%s','product.php',$row['item_id'])?>'>
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
                    //   $table =1;
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
                      if($table==2){
                        $sql2 = "SELECT * FROM specdropb where item_id = $item_id";
                        $specification = mysqli_query($con,$sql2);
                        while($spec = mysqli_fetch_assoc($specification)){
                          $occ = $spec['occasion'];
                          $fit = $spec['fit'];
                        }
                        echo $fit." ".$occ." ".$subCat;
                      }
                      if($table==7){
                        $shape = $type = "";
                        $sql = "SELECT face_shape FROM specglasses where item_id =".$item_id;
                        $result = mysqli_query($con,$sql);
                        while($row = mysqli_fetch_assoc($result)){
                            $shape = $row['face_shape'];
                            $type = $row["type"];
                        }
                        echo $type." ".$shape." "."Sunglasses";
                      }
                    ?>
                    </p></div>
                    <div class="priceSection"><span class="price">Rs <?php echo $row['item_price']?></span>&nbsp;&nbsp;<span class="strikedPrice"><small><s>Rs <?php echo $row['item_mrp']?></s></small></span>
                    <span class="discount"><small>(<?php echo $row['discount']?>% off)</small></span></div>
                </div>
                </a>
                <form method='post'>
                  <input type="text" value="<?php echo $row['item_id'];?>" name="item_id" hidden>
                  <button class="btn1" name="bookmark"><span class="plus">+</span></button>
                </form>
      
            </div>
                    <?php 
                    }
                // }
}
?>
    </div>
    </div>
<?php
                  }?>

<!-- Product display starts -->
<script>
    $("#addtocartSmallPageCTA,#addtocartLargePageCTA").click(function(event){
        event.preventDefault();
        addtocart = "fetch_data";
        item_id = $("#item_id").val()
        shop_id = $("#shop_id").val()
        productSize = $("input[name='productSize']:checked").val();
        if(productSize != null){
            $.ajax({
                url: "action.php",
                method: "post",
                data: {addtocart:addtocart,item_id:item_id,shop_id:shop_id,productSize:productSize},
                success: function(data){
                    if(data == 1){
                        location.replace("cart.php");
                    }
                    else if(data == 2){
                        location.replace("userLogIn.php");
                    }
                    else{
                        data;
                    }
                }
            });
        }
        else{
            shake();
        }
    });
</script>