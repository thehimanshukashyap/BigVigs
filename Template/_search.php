<?php
include_once 'Product.php';
$product = new Product();	

$q ='';
if(isset($_SESSION['searchItem'])){
  $q=$_SESSION['searchItem'];
}
if(isset($_GET['linkValue'])){
  $q = $_GET['linkValue'];
}
$user_id = $_SESSION['user_id']??0;

if($_SERVER["REQUEST_METHOD"]=="POST"){
  if(isset($_POST['bookmark'])){
    if($user_id==0){
      head('userLogIn.php');
    }
    else{
      $item_id = $_POST['item_id'];
      $sql = "INSERT INTO `wishlist` (`user_id`, `item_id`) VALUES ('$user_id', '$item_id')";
      mysqli_query($con,$sql);
    }
  }
}

include_once '_searchQuery.php';

$filt_gender = $filt_brand = $filt_subcat = $filt_col = $filt_discount = '';

if(isset($_POST['filter_submit'])){

  if(isset($_POST['filt_gender'])){
    $filt_gender =$_POST['filt_gender'];
    if($whereinq == 0){
      $query = $query." where item_gender = '$filt_gender'";
      $whereinq = 1;
    }
    else{
      $query = $query." and item_gender = '$filt_gender'";
    }
  }
  
  if(isset($_POST['filt_brand'])){
    $filt_brand =$_POST['filt_brand'];
    $f_brand = '"' . implode('", "', $filt_brand) . '"';
    if($whereinq == 0){
      $query = $query." where item_brand in ($f_brand)";
      $whereinq = 1;
    }
    else{
      $query = $query." and item_brand in ($f_brand)";
    }
  }

  if(isset($_POST['filt_subcat'])){
    $filt_subcat =$_POST['filt_subcat'];
    $f_subcat = '"' . implode('", "', $filt_subcat) . '"';
    if($whereinq == 0){
      $query = $query." where item_subcat in ($f_subcat)";
      $whereinq = 1;
    }
    else{
      $query = $query." and item_subcat in ($f_subcat)";
    }
  }

  if(isset($_POST['filt_col'])){
    $filt_col =$_POST['filt_col'];
    $f_col = '"' . implode('", "', $filt_col) . '"';
    if($whereinq == 0){
      $query = $query." where item_col in ($f_col)";
    }
    else{
      $query = $query." and item_col in ($f_col)";
    }
  }

  if(isset($_POST['filt_discount'])){
    $filt_discount =$_POST['filt_discount'];
    if($whereinq == 0){
      $query = $query." where discount >= '$filt_discount'";
    }
    else{
      $query = $query." and discount >= '$filt_discount'";
    }
  }

}

?>

<style>
  body{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
  }
  .filter-section{
    display: none;
  }
  #mobileProductFilter{
    display: none;
  }
  #mobileProductSort{
    display: none;
  }
  @media screen and (max-width: 1080px){
    .burger,.logo,#icon-link{
      display: none;
    }
    .searchHomeRedirect{
          display: flex!important;
      }
    .icon-links{
      margin: auto;
      /* border: 2px solid green; */
    }
    /* .icon-links::before{
      content: '<';
      margin: 0 1rem;
    } */
    .search{
      /* margin: 0 auto; */
      width: 86vw;
      display: flex;
    }
    .searchIcon{
      margin: 0rem;
    }
    .cart-counter{
      display: none;
    }
    #searchFilter{
      display: none;
    }
    .imgBox1{
      height: 270px;
    }
    .filter-section{
      position: fixed;
      bottom: 0;
      display: flex;
      width: 100%;
      /* display: none; */
    }
    
    .filterCards{
      background-color: #f8f8ff;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 3.5rem!important;
      width: 100%;
    }
    .mobileProductFilter{
      display: none!important;
      bottom: 30rem!important;
    }
    
    /* .mobileProductSort{
      display: none;
      bottom: 30rem!important;
      display: block!important;
      bottom: 0rem!important;
    } */
    
    .mobileProductFilter .visible{
      display: block;
    }
    
    .hi{
      display: block!important;
      bottom: 0rem!important;
      /* transition: 10s ease-in-out!important; */
    }
    .hello{
      display: block!important;
      top: 29rem!important;
      /* transition: 10s ease-in-out!important; */
    }

  }
</style>
    <!-- Product display section starts -->
    <?php
    if($q!==''){
    $result = mysqli_query($con,$query);
    $resultcheck = mysqli_num_rows($result);

    if($resultcheck > 0){
  ?>

<div class="container pt-3" id="mobileProductSort" class="mobileSort" style="border:2px solid green; border-radius:25px 25px 0 0; bottom:3.5rem!important; background-color: white;  z-index:3; position:fixed;">
    <div style="display:flex; justify-content:center;align-items:center; padding: 3px 0;" id="sortShowDown"><i class="fas fa-chevron-down"></i></div>
      <div class="mt-3 mb-2 text-center" style="background-color: white; z-index:3; height: 10vh;">
        <div id="searchsort-for-small-screen" style="margin-bottom: 2rem;">    
          <div><input type="radio" class="sortProduct" name="sortPrice" id="sortPrice" value="1"> Price: Low to High</div>
          <div><input type="radio" class="sortProduct" name="sortPrice" id="sortPrice" value="2"> Price: High to Low</div>
        </div>
      </div>
  </div>

  <div class="container pt-3" id="mobileProductFilter" class="mobileProductFilter hi" style="border:2px solid green; border-radius:25px 25px 0 0; bottom:3.5rem!important; background-color: white;  z-index:3; position:fixed;">
    <div style="display:flex; justify-content:center;align-items:center; padding: 3px 0;" id="filterShowDown"><i class="fas fa-chevron-down"></i></div>
      <div class="filter-container mt-3 mb-2 text-center" style="background-color: white; z-index:3; height:inherit; overflow:scroll; height: 60vh;">
        <div id="searchfilter-for-small-screen" style="margin-bottom: 2rem;">    
        <form action="" method="post">                
            <!-- <div class="list-group">
              <h3>Price</h3>	
              <div class="list-group-item">
                <input id="priceSlider" data-slider-id='ex1Slider' type="text" data-slider-min="1000" data-slider-max="65000" data-slider-step="1" data-slider-value="14"/>
                <div class="priceRange">1000 - 65000</div>
                <input type="hidden" id="minPrice" value="0" />
                <input type="hidden" id="maxPrice" value="65000" />                  
              </div>			
            </div>  -->
          
            <?php
            if(!isset($gender)){
              ?>

            <div class="list-group">
              <h3></h3>
              <div class="brandSection">
                <div class="list-group-item checkbox">
                <input type="radio" name="filt_gender" class="productDetail gender" id="filt_gender" value="1" <?php if($filt_gender == '1'){echo 'checked';}?> >&nbsp;&nbsp;Male<br>
                <input type="radio" name="filt_gender" class="productDetail gender" id="filt_gender" value="2" <?php if($filt_gender == '2'){echo 'checked';}?>>&nbsp;&nbsp;Female
                </div>
              </div>
            </div>

              <?php
            }
            ?>
            
            <?php
              if(!isset($brand)){
                ?>
                <div class="list-group">
                  <h3>Brand</h3>
                  <div class="brandSection">
                    <?php
                    $brand = $product->getBrand();
                    foreach($brand as $brandDetails){	
                    ?>
                    <div class="list-group-item checkbox">
                    <label><input name="filt_brand[]" type="checkbox" class="productDetail brand" value="<?php echo $brandDetails["item_brand"]; ?>" <?php if( !empty($filt_brand) ){ foreach($filt_brand as $f){ if( $f == $brandDetails["item_brand"] ){ echo 'checked'; } } }  ?> > <?php echo $brandDetails["item_brand"]; ?></label>
                    </div>
                    <?php }	?>
                  </div>
                </div>
                <?php
              }
            ?>
            
            <?php
            if(!isset($subcat)){
              ?>
              <div class="list-group">
                <h3>Categorie</h3>
                <?php			
                $ram = $product->getRam();
                foreach($ram as $ramDetails){	
                ?>
                <div class="list-group-item checkbox">
                <label><input type="checkbox" name="filt_subcat[]" class="productDetail subcat" value="<?php echo $ramDetails['subcat_id']; ?>" <?php if( !empty($filt_subcat) ){ foreach($filt_subcat as $s){ if( $s == $ramDetails['subcat_id'] ){ echo 'checked';} } }  ?> > <?php echo $ramDetails['subcat_name']; ?></label>
                </div>
                <?php    
                }
                ?>
              </div>
              <?php
            }
            ?>
            
            <?php
              if(!isset($colour)){
                ?>
                <div class="list-group">
                <h3>Colours</h3>
                <?php
                $storage = $product->getStorage();
                foreach($storage as $storageDetails){	
                ?>
                <div class="list-group-item checkbox">
                <label><input type="checkbox" name="filt_col[]" class="productDetail colour" value="<?php echo $storageDetails['colId']; ?>" <?php if( !empty($filt_col) ){ foreach($filt_col as $c){ if( $c == $storageDetails['colId'] ){ echo 'checked';} } }  ?> > <?php echo $storageDetails['colName']; ?></label>
                </div>
                <?php
                }
                ?> 
              </div>
                <?php
              }
            ?>   	
            
            <div class="list-group">
              <h3>Discount Range</h3>
              <div class="list-group-item checkbox">
              <input type="radio" name="filt_discount" class="productDetail discount"  value="10" <?php if($filt_discount == 10){echo 'checked';}?> >&nbsp;&nbsp;&nbsp; 10% and above<br>
              <input type="radio" name="filt_discount" class="productDetail discount"  value="20" <?php if($filt_discount == 20){echo 'checked';}?> >&nbsp;&nbsp;&nbsp; 20% and above<br>
              <input type="radio" name="filt_discount" class="productDetail discount"  value="30" <?php if($filt_discount == 30){echo 'checked';}?> >&nbsp;&nbsp;&nbsp; 30% and above<br>
              <input type="radio" name="filt_discount" class="productDetail discount"  value="40" <?php if($filt_discount == 40){echo 'checked';}?> >&nbsp;&nbsp;&nbsp; 40% and above<br>
              <input type="radio" name="filt_discount" class="productDetail discount"  value="50" <?php if($filt_discount == 50){echo 'checked';}?> >&nbsp;&nbsp;&nbsp; 50% and above<br>
              <input type="radio" name="filt_discount" class="productDetail discount"  value="60" <?php if($filt_discount == 60){echo 'checked';}?> >&nbsp;&nbsp;&nbsp; 60% and above<br>
              <input type="radio" name="filt_discount" class="productDetail discount"  value="70" <?php if($filt_discount == 70){echo 'checked';}?> >&nbsp;&nbsp;&nbsp; 70% and above<br>
              <input type="radio" name="filt_discount" class="productDetail discount"  value="80" <?php if($filt_discount == 80){echo 'checked';}?> >&nbsp;&nbsp;&nbsp; 80% and above<br>
              </div>
            </div>
            
          </form>
        </div>
      </div>
  </div>

  

<div class="container-fluid">
  <div class="row">


    <div class="col-2 mt-3 bg-light" id="searchFilter">    
      <form action="" method="post">                
        <!-- <div class="list-group">
          <h3>Price</h3>	
          <div class="list-group-item">
            <input id="priceSlider2" data-slider-id='ex1Slider' type="text" data-slider-min="1000" data-slider-max="65000" data-slider-step="1" data-slider-value="14"/>
            <div class="priceRange">1000 - 65000</div>
            <input type="hidden" id="minPrice2" value="0" />
            <input type="hidden" id="maxPrice2" value="65000" />                  
          </div>			
        </div>     -->
      
        <?php
        if(!isset($gender)){
          ?>

        <div class="list-group">
          <h3></h3>
          <div class="brandSection">
            <div class="list-group-item checkbox">
            <input type="radio" name="filt_gender" class="productDetail gender" id="filt_gender" value="1" <?php if($filt_gender == '1'){echo 'checked';}?> >&nbsp;&nbsp;Male<br>
            <input type="radio" name="filt_gender" class="productDetail gender" id="filt_gender" value="2" <?php if($filt_gender == '2'){echo 'checked';}?>>&nbsp;&nbsp;Female
            </div>
          </div>
        </div>

          <?php
        }
        ?>
        
        <?php
          if(!isset($brand)){
            ?>
            <div class="list-group">
              <h3>Brand</h3>
              <div class="brandSection">
                <?php
                $brand = $product->getBrand();
                foreach($brand as $brandDetails){	
                ?>
                <div class="list-group-item checkbox">
                <label><input name="filt_brand[]" type="checkbox" class="productDetail brand" value="<?php echo $brandDetails["item_brand"]; ?>" <?php if( !empty($filt_brand) ){ foreach($filt_brand as $f){ if( $f == $brandDetails["item_brand"] ){ echo 'checked'; } } }  ?> > <?php echo $brandDetails["item_brand"]; ?></label>
                </div>
                <?php }	?>
              </div>
            </div>
            <?php
          }
        ?>
        
        <?php
        if(!isset($subcat)){
          ?>
          <div class="list-group">
            <h3>Categories</h3>
            <?php			
            $ram = $product->getRam();
            foreach($ram as $ramDetails){	
            ?>
            <div class="list-group-item checkbox">
            <label><input type="checkbox" name="filt_subcat[]" class="productDetail subcat" value="<?php echo $ramDetails['subcat_id']; ?>" <?php if( !empty($filt_subcat) ){ foreach($filt_subcat as $s){ if( $s == $ramDetails['subcat_id'] ){ echo 'checked';} } }  ?> > <?php echo $ramDetails['subcat_name']; ?></label>
            </div>
            <?php    
            }
            ?>
          </div>
          <?php
        }
        ?>
        
        <?php
          if(!isset($colour)){
            ?>
            <div class="list-group">
            <h3>Colours</h3>
            <?php
            $storage = $product->getStorage();
            foreach($storage as $storageDetails){	
            ?>
            <div class="list-group-item checkbox">
            <label><input type="checkbox" name="filt_col[]" class="productDetail colour" value="<?php echo $storageDetails['colId']; ?>" <?php if( !empty($filt_col) ){ foreach($filt_col as $c){ if( $c == $storageDetails['colId'] ){ echo 'checked';} } }  ?> > <?php echo $storageDetails['colName']; ?></label>
            </div>
            <?php
            }
            ?> 
          </div>
            <?php
          }
        ?>   	
        
        <div class="list-group">
          <h3>Discount Range</h3>
          <div class="list-group-item checkbox">
          <input type="radio" name="filt_discount" class="productDetail discount"  value="10" <?php if($filt_discount == 10){echo 'checked';}?> >&nbsp;&nbsp;&nbsp; 10% and above<br>
          <input type="radio" name="filt_discount" class="productDetail discount"  value="20" <?php if($filt_discount == 20){echo 'checked';}?> >&nbsp;&nbsp;&nbsp; 20% and above<br>
          <input type="radio" name="filt_discount" class="productDetail discount"  value="30" <?php if($filt_discount == 30){echo 'checked';}?> >&nbsp;&nbsp;&nbsp; 30% and above<br>
          <input type="radio" name="filt_discount" class="productDetail discount"  value="40" <?php if($filt_discount == 40){echo 'checked';}?> >&nbsp;&nbsp;&nbsp; 40% and above<br>
          <input type="radio" name="filt_discount" class="productDetail discount"  value="50" <?php if($filt_discount == 50){echo 'checked';}?> >&nbsp;&nbsp;&nbsp; 50% and above<br>
          <input type="radio" name="filt_discount" class="productDetail discount"  value="60" <?php if($filt_discount == 60){echo 'checked';}?> >&nbsp;&nbsp;&nbsp; 60% and above<br>
          <input type="radio" name="filt_discount" class="productDetail discount"  value="70" <?php if($filt_discount == 70){echo 'checked';}?> >&nbsp;&nbsp;&nbsp; 70% and above<br>
          <input type="radio" name="filt_discount" class="productDetail discount"  value="80" <?php if($filt_discount == 80){echo 'checked';}?> >&nbsp;&nbsp;&nbsp; 80% and above<br>
          </div>
        </div>
        
        <!-- <input class="btn btn-success" type="submit" name="filter_submit" value="Apply"> -->
      </form>
    </div>
          <!-- <input type="text" name=""> -->
    <div class="col-lg-12 col-xl-10 col-md-12 col-12">
      <div class="row dhumm" id="dhumm">
        <?php
        while($row = mysqli_fetch_assoc($result)){
          $table = $row['item_catagory'];
            if($row['item_stock']>0){
            ?>

            <div class="col-xl-2 col-lg-3 col-md-4 col-6" style="display: flex; justify-content: center; padding:1px!important;">
                <div class="card1 my-2">
                    <a href='<?php printf('%s?item_id=%s','product.php',$row['item_id'])?>'>
                    <div class="imgBox1">
                        <img src="<?php echo $row['item_img']?>" alt="" class="img-fluid">
                    </div>
                    <div class="cardBody1">
                        <div class="top1"><span class="title"><?php $name = $row['item_brand']; echo $row['item_brand'];?></span><br>
                        <p style="white-space:nowrap;word-wrap:break-word;overflow:hidden;text-overflow:ellipsis; width:160px;">
                        <?php
                          $subCat = '';
                          $sql3 = "SELECT * from subcategory where subcat_id = ".$row['item_subcat'];
                          $result3  = mysqli_query($con,$sql3);
                          while($row3 = mysqli_fetch_assoc($result3)){
                            $subCat = $row3['subcat_name'];
                          }
              
                          $item_id = $row['item_id'];
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
                          if($table == 2){
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
            </div>

            <?php
            } 
        }
        ?>
      </div>
      <div class="row text-center filter-section">
        <div class="col-6 p-0">
          <div class="card filterCards">
            <button id="searchPageFilterBtn" class="searchPageFilterBtn" onclick="mobileFilterShow('mobileProductFilter')" style="height: 100%; width: 100%;">FILTER</button>
          </div>
        </div>
        <div class="col-6 p-0">
          <div class="card filterCards">
            <button style="height: 100%; width: 100%;" onclick="mobileFilterShow('mobileProductSort')">SORT BY</button>
          </div>
        </div>
      </div>
    </div>
      <?php
    }
    else{
      ?>
        <div class="not-found-img">
          <img src="Images/not-found.png" alt="Product not found">
        </div>
        <div class="not-found-section">You searched for&nbsp; <span class="not-found-item-word"><?php echo $q?></span></div><br>
        <p class="not-found-suggest">Searched item could not be found. May be you could have mis-spelled, try searching something else.</p>
      <?php
    } 
} 
else
{
  //Main Banner Starts
  // include 'Template/_similarproducts.php';
?>
  
  <div style="display: flex; overflow-x:scroll;">


    
    <?php 
    
    $result = mysqli_query($con,$query); 
    $i=0;
    while($row = mysqli_fetch_assoc($result)){
      $i++;
      if($i<=10){ 
  ?>
          <div class="card1 my-2 mx-2" style="flex-shrink: 0;">
                    <a href='<?php printf('%s?item_id=%s','product.php',$row['item_id'])?>'>
                    <div class="imgBox1">
                        <img src="<?php echo $row['item_img']?>" alt="" class="img-fluid">
                    </div>
                    <div class="cardBody1">
                        <div class="top1"><span class="title"><?php $name = $row['item_brand']; echo $row['item_brand'];?></span><br>
                        <span style="text-overflow: ellipsis;">
                        <?php
                          $subCat = '';
                          $sql3 = "SELECT * from subcategory where subcat_id = ".$row['item_subcat'];
                          $result3  = mysqli_query($con,$sql3);
                          while($row3 = mysqli_fetch_assoc($result3)){
                            $subCat = $row3['subcat_name'];
                          }
              
                          $item_id = $row['item_id'];
                          $table =1;
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
                        </span></div>
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
                        else{
                          break;
                        }
                      }?>

  </div>





<?php
  //Main Banner Ends
  // seasonal sale starts
  include 'Template/_seasonalSale.php';
  // seasonal sale ends
}
  ?>
  </div>
   
</div>
<script>

</script>
<!-- Product display section ends -->   