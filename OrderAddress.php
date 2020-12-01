<?php include_once 'header.php';?>
<div style="display:none;">
<?php include_once 'Template/_finalProductSection.php';?>
</div>
    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST['addrRemoveBtn'])){
                $sql = "SELECT addArr from user where user_id = 19";
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
    ?>
    <style>
        body{
            background-color: white!important;
        }
    </style>
    <div style="display: flex; justify-content:center;align-items:center;">
        <!-- <div> -->
            <h6 style="font-size: larger;">STEP 1</h6> <h6>-------</h6><h6 style="font-size: larger; color:tomato"><u> STEP 2</u></h6>
        <!-- </div> -->
    </div>
    <div class="container p-4" style="margin-top: 2rem;">
        <div class="row">
            <div class="border-right col-md-8">

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
                                        <form action="" method="POST" style="width:100%;">
                                            <button class="btn border-dark px-5 mx-1 col-md-4 col-sm-12 col-12 shadow-none mt-2" name="addrRemoveBtn" value="<?php echo $i?>">REMOVE</button>
                                            <button class="btn border-dark px-5 mx-1 col-md-4 col-sm-12 col-12 shadow-none mt-2" name="addrEditBtn" value="<?php echo $i?>">EDIT</button>
                                        </form>
                                    </div>
                                </label>
                            </div>
                            <?php
                        }
                ?>
            
                <a href="" style="color: black; text-decoration: none;" data-toggle="modal" data-target="#exampleModal"><div class="cart-product-card border mx-auto my-3 py-3 px-3" style="display: flex; justify-content:center;align-items:center;">&nbsp;&nbsp;<span style="font-weight: 500;">Add New Address</span><div class="ml-auto"><span style="font-size:larger; font-weight: bold;">+</span></div></div></a>

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

            <!-- ?php include_once 'Template/_priceSection.php';?> -->

            <div class="col-md-4 px-4">
                <h6 class="">PRICE DETAILS (3 items)</h6>
                <div style="display: flex; justify-content: space-between;">
                    <span>Total MRP: </span>
                    <span>Rs. 2,563 </span>
                </div>
                <div style="display: flex; justify-content: space-between;">
                    <span>Discount on MRP: </span>
                    <span>-Rs. 2,563 </span>
                </div>
                <hr>
                <div style="display: flex; justify-content: space-between;">
                    <h6>Total Amount </h6>
                    <span>Rs. 2,563 </span>
                </div>
                <p style="font-size: small; color:gray; margin-top:0.5rem;">Due to some security reasons Online Payment is not available on this site now.<br>Payment on delivery is available.</p>
                <button class="btn btn-block my-2 shadow-none" style="font-weight: 600; color: white; background-color: tomato;">BUY NOW</button>
            </div>
        </div>
    </div>
</div>

<script>
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
                    alert(data);
                    if(data == 1){
                        location.replace("OrderAddress.php");
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

<?php include_once 'footer.php';?>