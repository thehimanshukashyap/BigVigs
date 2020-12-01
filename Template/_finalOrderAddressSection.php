<div class="border-right col-md-8 CheckOutStage2">
    <form action="" method="post">

<?php
        $sql = "SELECT addArr from user where user_id = ".$_SESSION['user_id'];
        $result = mysqli_query($con,$sql);
        $addArr= "";
        while($row = mysqli_fetch_assoc($result)){
            $addArr = $row;
        }
        $addArr = unserialize($addArr['addArr']);
        if(is_array($addArr) && !empty($addArr)){
        ?>

    <h5>Select delivery Address</h5>
    <span style="font-size: small; font-weight: bold;">DEFAULT ADDRESS</span>

    <!-- <form action="" method="POST" style="width:100%;"> -->
        <?php for($i=0;$i<count($addArr);$i++){
            ?>
            <div class="border px-4 py-2 mt-2 address">
                <label class="div d-block">
                    <input type="radio" style="color: tomato;" id="<?php echo $i;?>" class="orderAddress" name = "address" value="<?php echo $i?>" <?php if($i==0){echo "checked";}?>>
                    <span style="font-weight: 600; margin: 0;" ><?php echo $addArr[$i]['name'];?></span>
                    <p style="margin: 0.5rem 0;"> <?php echo $addArr[$i]['address'];?><br><?php echo $addArr[$i]['city']." - ".$addArr[$i]['pin']?></p>
                    <span style="font-weight: small;margin-bottom: 10rem;">Mobile: <?php echo $addArr[$i]['mobile'];?></span>
                    <p class="my-2">Pay on delivery available</p>
                    <div class="d-flex row">
                            <button class="btn border-dark px-5 mx-1 col-md-4 col-sm-12 col-12 shadow-none mt-2" name="addrRemoveBtn" value="<?php echo $i?>">REMOVE</button>
                            <button class="btn border-dark px-5 mx-1 col-md-4 col-sm-12 col-12 shadow-none mt-2" name="addrEditBtn" value="<?php echo $i?>">EDIT</button>
                    </div>
                </label>
            </div>
            <?php
        }
        ?>
    <!-- </form> -->


    <a href="" style="color: black; text-decoration: none; display:block;" data-toggle="modal" data-target="#exampleModal"><div class="cart-product-card border w-100 mx-auto my-3 py-3 px-3" style="display: flex; justify-content:center;align-items:center;">&nbsp;&nbsp;<span style="font-weight: 500;">Add New Address</span><div class="ml-auto"><span style="font-size:larger; font-weight: bold;">+</span></div></div></a>

    <!-- MODAL -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">ADD NEW ADDRESS</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php include_once 'addNewData.php';?>
            </div>
            <div class="modal-footer">
                <button type="button" id="addAddress" name="addAddress" class="btn btn-lg btn-block shadow-none" style="font-weight: 500; font-size:0.9rem; color: white; background-color: tomato;">ADD ADDRESS</button>
                <p style="color: red; font-size:small;" id="Error"></p>
            </div>
            </div>
        </div>
    </div>
    <?php 
    }
    else{
        include_once 'addNewData.php';
    }
    ?>
</div>