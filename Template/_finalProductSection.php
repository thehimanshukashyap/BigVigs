<div class="col-sm-8 border-right border-top CheckOutStage1">
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
        // include 'HTML/ConfirmationBox.php';
        ?>
            
        <!-- Product display starts -->

            <div class="row py-3 mt-3 mx-auto cart-product-card p-0" style="border-left:1px solid lightgray; border-right:1px solid lightgray; border-top:1px solid lightgray; border-radius: 5px 5px 0 0;">
                <div class="col-xl-3 col-lg-2 col-md-4 col-sm-4 col-4">
                    <img src="<?php echo $row['item_img']?>" class="img-fluid cart-img" alt="" id="<?php echo $row['item_id']."Image";?>">
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
            <form method="post" id="actionForm">
                <div class="row mx-auto pt-1 cart-product-card" style="border-left:1px solid lightgray; border-right:1px solid lightgray; border-bottom:1px solid lightgray; border-radius: 0 0 5px 5px;">
                    <input type="hidden" name="item_id" class="item_id" value="<?php echo $item_id; ?>">
                    <input type="hidden" name="user_id" class="user_id" value="<?php echo $user_id; ?>">
                    <div class="col-4 text-center ml-2 mb-2 border-top p-0"><button type="submit" name="dfromcart" id="" class="btn px-3 border-right shadow-none deletefromcart" style="width: 100%; height:100%; font-size:1.05rem; font-weight: 600; color:#6e6e6e;" data-toggle="modal" data-target="#myCartModal" data-id="<?php echo $item_id; ?>" onclick="confirmRemoveFromCart(this);" >REMOVE</button></div>
                    <div class="col text-center border-top mb-2 mr-2 p-0"><button type="submit" name="addtobookmark" class="btn shadow-none" style="width: 100%; height:100%; font-size:1.05rem; font-weight: 600; color:#6e6e6e">MOVE TO WISHLIST</button></div>
                </div>
            </form>

        <!-- cart section ends -->


        <!-- Product display ends -->

        <!-- Modal Starts -->
        <div id="myCartModal" class="modal">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body card p-0 m-0">
                <?php include_once 'RemoveFromCartConfirmationBox.php';?>
                </div>
            </div>
            </div>
        </div>
        <!-- Modal Ends -->


    <?php
    }  
    ?>
        <a href="bookmark.php" style="color: black;"><div class="cart-product-card border mx-auto mt-3 py-3 px-3" style="display: flex;"><i class="far fa-bookmark my-auto" style="font-size: larger;"></i>&nbsp;&nbsp;<span style="font-weight: 500;">Add More From Wishlist</span><div class="ml-auto"><i class="fas fa-chevron-right" style="font-size: large;"></i></div></div></a>

</div>

<script>
    function confirmRemoveFromCart(self) {
		var id = self.getAttribute("data-id");
        document.getElementById("ConfirmItemId").value = id;
        src = "#"+id+"Image";
        ModalImgae = $(src).attr('src');
        $("#ModalProductImgae").attr('src',ModalImgae);
        $("#myModal").modal("show");
    }
</script>