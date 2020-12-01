<div class="col-md-4 px-4 pt-3 mt-3">
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
    <button class="btn btn-block my-2 shadow-none CheckOutStage1"  name="proceedTransaction" id="proceedTransaction" style="font-weight: 600; color: white; background-color: tomato;">PROCEED</button>
    <!-- <form action="" method="post"> -->
        <button class="btn btn-block my-2 shadow-none CheckOutStage2"  name="buy" id="buy" style="font-weight: 600; color: white; background-color: tomato;">BUY NOW</button>
    </form>
</div>