<?php

$user=$_SESSION['user_id'];
if($_SERVER["REQUEST_METHOD"]=="POST"){
  echo "<script>alert('Hmm')</script>";

  if(isset($_POST['removeWishlist'])){
    $item_id = $_POST['item_id'];
    $sql = "DELETE FROM `wishlist` WHERE `wishlist`.`item_id` = $item_id and `wishlist`.`user_id` = $user; ";
    mysqli_query($con,$sql);
  }
}

?>

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

    <!-- Product display section starts -->
    <h4 class="bookmark-title">Your Bookmarks</h4>
<div class="container-fluid">
  <div class="row">
    <?php
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM product where item_id IN (SELECT item_id from wishlist where user_id=$user_id)";
    $result = mysqli_query($con,$sql);
    $resultcheck = mysqli_num_rows($result);


    if($resultcheck > 0){
      while($row = mysqli_fetch_assoc($result)){
          ?>

          <div class=" col-xl-2 col-lg-3 col-md-3 col-sm-6 my-1" style="display:flex; justify-content: center; align-items:center;">
              <div class="card1 border">
                  <a href="<?php printf('%s?item_id=%s','product.php',$row['item_id'])?>">
                  <div class="imgBox1">
                      <img src="<?php echo $row['item_img']?>" alt="" class="img-fluid">
                  </div>
                  <div class="cardBody1">
                      <div class="top1"><span class="title"><?php $name = $row['item_brand']; echo $row['item_brand'];?></span><br>
                      <?php
                          $subCat = '';
                          $sql3 = "SELECT * from subcategory where subcat_id = ".$row['item_subcat'];
                          $result3  = mysqli_query($con,$sql3);
                          while($row3 = mysqli_fetch_assoc($result3)){
                            $subCat = $row3['subcat_name'];
                          }
                        ?>
                      <p>
                      <?php               
                            $item_id = $row['item_id'];
                          if($row['item_catagory']==1){
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
                      <div class="priceSection"><span class="price">Rs <?php echo $row['item_price']?></span>&nbsp;&nbsp;<span class="strikedPrice"><small><s>Rs <?php echo $row['item_price']?></s></small></span>
                      <span class="discount"><small>(60% off)</small></span></div>
                  </div>
                  </a>
                    <input type="text" id="item_id" value="<?php echo $row['item_id'];?>" name="item_id" hidden>
                    <input type="text" id="shop_id" value="<?php echo $row['shopId'];?>" name="shop_id" hidden>
                    <div class="text-center mb-3" style="background-color: #f8f8ff;">
                      <button name="moveToCart" id="moveToCart" style="border: 0.01rem solid black; width: 80%; font-weight:600;"  data-toggle="modal" data-target="#exampleModal" class="mt-2 mb-3 mx-auto text-center prodEditBtn">MOVE TO BAG</button>
                    </div>
                    <button class="btn2" name="removeWishlist"><span class="plus">-</span></button>
              </div>
          </div>        


          <!-- Modal -->

          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">SELECT SIZE</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <div class="size my-3 p-0">
                    <div class="radio-tile-group" id="radioShake">
                      <!-- <form action="" method="post"  style="display: flex;"> -->
                        <?php
                        $sqlProductSize = unserialize($row['item_size']);
                        // echo $row['item_id'];
                        foreach($sqlProductSize as $ProductSize){
                          ?>
                          <div class="input-container">
                                <input class="radio-button" id="productSize" type="radio" name="productSize" value="<?php echo $ProductSize;?>"/>
                                <div class="radio-tile" id="radioBorder">
                                    <label for="walk" class="radio-tile-label m-auto"><?php echo $ProductSize;?></label>
                                </div>
                          </div>
                          <?php
                        }
                        ?>
                        <!-- </form> -->
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="moveToBag" name="moveToBag" class="btn btn-lg btn-block shadow-none" style="font-weight: 500; font-size:0.9rem; color: white; background-color: tomato;">MOVE TO BAG</button>
                    <p style="color: red; font-size:small;" id="Error"></p>
                </div>
              </div>
            </div>
          </div>



          <?php
      }
    }
    else{
      ?>
        <div class="not-found-img">
          <img src="Images/not-found.png" alt="Product not found">
        </div>
        <div class="not-found-section">It's quite empty here&nbsp; <a href="search.php" class="not-found-item-word" style="text-decoration: none;">lets search something.</a></div><br>
        <p class="not-found-suggest">We have various local products which are very amazing. Lets explore your local store on this site.</p>
      <?php
    } 
    ?>
  </div>
</div>
<!-- Product display section ends -->   


<script>
  $("#moveToBag").click(function(event){
    // event.preventDefault();
    let moveToBag = 'moveToBag';
    let item_id = $("#item_id").val();
    let shop_id = $("#shop_id").val();
    let productSize = $("#productSize:checked").val();
    let spec_id = $("#spec_id").val();
    $.ajax({
      url: "action.php",
      type: "post",
      data: {moveToBag:moveToBag,item_id:item_id,productSize:productSize,shop_id:shop_id},
      success: function(data){
        if(data == 1){
          location.replace("cart.php");
        }
      }
    });
  });
</script>