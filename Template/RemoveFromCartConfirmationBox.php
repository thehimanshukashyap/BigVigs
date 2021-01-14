<div class="" id="confirmationBox" style="width:100%;background: white;">
    <div class="row py-3 mx-auto cart-product-card p-0" style="position: relative; border-radius: 5px 5px 0 0; width:100%">
        <button style="position:absolute; top:0px; right:10px; font-size:2rem; outline:none; border:none; background-color: transparent; cursor:pointer;" id="closeConfirmation" class="close" data-dismiss="modal">&times;</button>
        <div class="col-xl-3 col-lg-2 col-md-4 col-sm-4 col-4 d-flex justify-content-center">
            <img src="" class="img-fluid cart-img" alt="" style="width: 66px;" class="ModalProductImgae" id="ModalProductImgae">
        </div>
        <div class="col-xl-6 col-lg-7 col-md-8 col-sm-8 col-8">
            <h5> Remove Item</h5>
            <p>Are you sure you want to this item from cart? </p>
        </div>
    </div>
    <form method="post">
        <div class="row mx-auto pt-1 cart-product-card" style=" border-radius: 0 0 5px 5px;  width:100%">
            <input type="hidden" name="item_id" id="ConfirmItemId" value="">
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
            <div class="col-4 text-center ml-2 mb-2 border-top p-0"><button type="submit" id="sureDeleteFromCart" name="sureDeleteFromCart" class=" btn px-3 border-right shadow-none" style="width: 100%; height:100%; font-size:1.05rem; font-weight: 600; color:#6e6e6e;">REMOVE</button></div>
            <div class="col text-center border-top mb-2 mr-2 p-0"><button type="submit" id="sureAddtobookmark" name="sureAddtobookmark" class="btn shadow-none" style="width: 100%; height:100%; font-size:1.05rem; font-weight: 600; color:#6e6e6e">MOVE TO WISHLIST</button></div>
        </div>
    </form>
</div>