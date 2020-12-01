<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST["addStoreToBIGVIGS"])){
        //     $shopName = $_POST['shopName'];
        //     $shopEmail = $_POST['shopEmail'];
        //     $shopOwnerName = $_POST['shopOwnerName'];
        //     $shopAddress = $_POST['shopAddress'];
        //     $shopCloseDay = $_POST['closeDays'];
        //     $shopOpenTime = $_POST['shopOpenTime'];
        //     $shopCloseTime = $_POST['shopCloseTime'];
        //     $shopContact1 = $_POST['shopContact1'];
        //     $shopContact2 = $_POST['shopContact2'];
        //     $shopDesc = $_POST['storeDesc'];

        //     $file_name = $_FILES['shopImgUpload']['name'];
        //     $file_type = $_FILES['shopImgUpload']['type'];
        //     $file_size = $_FILES['shopImgUpload']['size'];
        //     $file_temp_loc = $_FILES['shopImgUpload']['tmp_name'];
        //     $file_store = "trialimage/".$file_name;
        //     move_uploaded_file($file_temp_loc,$file_store);

        //     $sqlShopSignUp = "INSERT INTO `shopinfo` (`shopName`, `shopOwnerName`, `shopAddress`, `shopImg`, `shopOpenDay`, `shopOpenTime`, `shopCloseTime`,
        //     `shopDesc`, `shopContact1`, `shopContact2`, `shopEmail`, `shopPass`, `rp`, `shop_status`)
        //     VALUES ('$shopName', '$shopOwnerName', '$shopAddress', '$file_store', 'HImanshu', '$shopOpenTime', '$shopCloseTime', '$shopDesc',
        //     '$shopContact1', '$shopContact2', '$shopEmail',
        //     'HImanshu', '0', '0');";
        //     mysqli_query($con,$sqlShopSignUp);
            // head("setPass.php");
        }
    }
?>
<form action="setPass.php" method="post" enctype="multipart/form-data">
<div class="container">
    <div class="row m-4"><h3 class="mx-auto">BIGVIGS STORE</h3><br/> </div>
    <div class="row">
        <div class="col-md-9 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <center>
                                    <!-- <img width="130px" src="Images/imgs/sign-up.png" /> -->
                                    <h4>Store SignUp</h4>
                                </center>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <center>
                                    <hr />
                                </center>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Shop Image</label>
                            <input type="file" name="shopImgUpload" id="shopImg" value="">
                            <p style="color: red; font-size: small;" id="shopImgError"></p>
                        </div>
                        <div class="col-md-6">
                            <label>Name of Store</label>
                            <input type="text" class="form-control" placeholder="Shop Name" name="shopName" id="shopName">
                            <p style="color: red; font-size: small;" id="nameError"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Name of Store Owner</label>
                            <input type="text" class="form-control" placeholder="Shop Owner Name" id="shopOwnerName" name="shopOwnerName">
                            <p style="color: red; font-size: small;" id="ownerError"></p>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email-ID</label>
                                <input type="email" placeholder="Email ID" class="form-control" id="shopEmail" name="shopEmail">
                                <p style="color: red; font-size: small;" id="emailError"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Contact No</label>
                            <input type="text" placeholder="Contact No." class="form-control" id="shopContact1" name="shopContact1">
                            <p style="color: red; font-size: small;" id="contact1Error"></p>
                        </div>
                        <div class="col-md-6">
                            <label>Alternate Contact No</label>
                            <input type="text" placeholder="Contact No." class="form-control" id="shopContact2" name="shopContact2">
                            <p style="color: red; font-size: small;" id="contact2Error"></p>
                        </div>
                    </div>
                    <div class="row py-1 my-2">
                        <div class="col-md-6">
                        <label>Opening time : </label>
                        <input type="time" name="shopOpenTime" id="shopOpenTime">
                        <p style="color: red; font-size: small;" id="shopOpenError"></p>
                        </div>
                        <div class="col-md-6">
                        <label>Closing time : </label>
                        <input type="time" name="shopCloseTime" id="shopCloseTime">
                        <p style="color: red; font-size: small;" id="shopCloseError"></p>
                        </div>
                    </div>
                    
                    <label for="">Closed on : </label>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6"><input name = "closeDays[]" id="closeDays" value = "Sunday" type = "checkbox" class="mx-1">Sunday</input></div>
                        <div class="col-lg-3 col-md-6 col-sm-6"><input name = "closeDays[]" id="closeDays" value = "Monday" type = "checkbox" class="mx-1">Monday</input></div>
                        <div class="col-lg-3 col-md-6 col-sm-6"><input name = "closeDays[]" id="closeDays" value = "Tuesday" type = "checkbox" class="mx-1">Tuesday</input></div>
                        <div class="col-lg-3 col-md-6 col-sm-6"><input name = "closeDays[]" id="closeDays" value = "Wednesday" type = "checkbox" class="mx-1">Wednesday</input></div>
                        <div class="col-lg-3 col-md-6 col-sm-6"><input name = "closeDays[]" id="closeDays" value = "Thursday" type = "checkbox" class="mx-1">Thursday</input></div>
                        <div class="col-lg-3 col-md-6 col-sm-6"><input name = "closeDays[]" id="closeDays" value = "Friday" type = "checkbox" class="mx-1">Friday</input></div>
                        <div class="col-lg-3 col-md-6 col-sm-6"><input name = "closeDays[]" id="closeDays" value = "Saturday" type = "checkbox" class="mx-1">Saturday</input></div>
                        <p style="color: red; font-size: small;" id="closedOnError"></p>
                    </div>

                    <label for="shopAddress">Shop Address : </label>
                    <textarea name="shopAddress" id="shopAddress" cols="0" rows="1" class="form-control"></textarea>
                    <p style="color: red; font-size: small;" id="shopAddError"></p>
                    
                    <label for="" class="py-2">Describe yourself</label>
                    <textarea name="storeDesc" id="storeDesc" cols="30" rows="3" class="form-control"></textarea>
                    <p style="color: red; font-size: small;" id="descError"></p>

                    <br />
                    <p style="color: red; font-size:medium;" id="Error"></p>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <center>
                            <div class="form-group">
                                <button type="submit" class="btn-block btn-lg btn btn-success" name="addStoreToBIGVIGS" id="addStoreToBIGVIGS">ADD STORE TO BIGVIGS</button>
                            </div></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
<script>
    function isEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }
    $("#shopName").focus(function(){
        $("#shopName").removeAttr("style");
        $("#nameError").html("");
    });
    $("#shopEmail").focus(function(){
        $("#shopEmail").removeAttr("style");
        $("#emailError").html("");
    });
    $("#shopOwnerName").focus(function(){
        $("#shopOwnerName").removeAttr("style");
        $("#ownerError").html("");
    });
    $("#shopAddress").focus(function(){
        $("#shopAddress").removeAttr("style");
        $("#shopAddError").html("");
    });
    $("#shopOpenTime").focus(function(){
        $("#shopOpenTime").removeAttr("style");
        $("#shopOpenError").html("");
    });
    $("#shopCloseTime").focus(function(){
        $("#shopCloseTime").removeAttr("style");
        $("#shopCloseError").html("");
    });
    $("#shopContact1").focus(function(){
        $("#shopContact1").removeAttr("style");
        $("#contact1Error").html("");
    });
    $("#shopContact2").focus(function(){
        $("#shopContact2").removeAttr("style");
    });
    $("#storeDesc").focus(function(){
        $("#storeDesc").removeAttr("style");
        $("#descError").html("");
    });
    $("#shopImg").focus(function(){
        $("#shopImg").removeAttr("style");
        $("#shopImgError").html("");
    });
    $("#closeDays").focus(function(){
        $("#closeDays").removeAttr("style");
    });

    $("#addStoreToBIGVIGS").click(function(event){
        event.preventDefault();
        var validate = true;
        $("#Error").html("");
        let shopName = $("#shopName").val();
        let shopEmail = $("#shopEmail").val();
        let shopOwnerName = $("#shopOwnerName").val();
        let shopAddress = $("#shopAddress").val();
        let shopOpenTime = $("#shopOpenTime").val();
        let shopCloseTime = $("#shopCloseTime").val();
        let shopContact1 = $("#shopContact1").val();
        let shopContact2 = $("#shopContact2").val();
        let shopDesc = $("#storeDesc").val();
        let shopImg = $("#shopImg").val();
        let closeDays = $("#closeDays").val();


        if (shopName ===null || shopEmail ===null || shopOwnerName ===null || shopAddress ===null || shopOpenTime ===null || shopCloseTime ===null || shopContact1 ===null || shopContact2 ===null || shopDesc ===null || shopImg ===null || shopName === '' || shopEmail === '' || shopOwnerName === '' || shopAddress === '' || shopOpenTime === '' || shopCloseTime === '' || shopContact1 === '' || shopContact2 === '' || shopDesc === '' || shopImg === '' || closeDays === null || closeDays === ''){
            if(shopName === null || shopName === ''){
                $("#shopName").css({"border":"1px solid red"});
                $("#nameError").html("Please enter shop Name");
            }
            if(shopEmail === null || shopEmail === ''){
                $("#shopEmail").css({"border":"1px solid red"});
                $("#emailError").html("Please enter Email-Id");
            }
            if(shopOwnerName === null || shopOwnerName === ''){
                $("#shopOwnerName").css({"border":"1px solid red"});
                $("#ownerError").html("Please enter Shop Owner's Name");
            }
            if(shopAddress === null || shopAddress === ''){
                $("#shopAddress").css({"border":"1px solid red"});
                $("#shopAddError").html("Please enter Shop Owner's Name");
            }
            if(shopOpenTime === null || shopOpenTime === ''){
                $("#shopOpenTime").css({"border":"1px solid red"});
                $("#shopOpenError").html("Please enter Shop's Opening Time");
            }
            if(shopCloseTime === null || shopCloseTime === ''){
                $("#shopCloseTime").css({"border":"1px solid red"});
                $("#shopCloseError").html("Please enter Shop's Closing Time");
            }
            if(shopContact1 === null || shopContact1 === ''){
                $("#shopContact1").css({"border":"1px solid red"});
                $("#contact1Error").html("Please enter Shop's Contact");
            }
            if(shopDesc === null || shopDesc === ''){
                $("#storeDesc").css({"border":"1px solid red"});
                $("#descError").html("Please enter Shop's Description");
            }
            if(closeDays === null || closeDays === ''){
                $("#closeDays").css({"border":"1px solid red"});
                $("#closedOnError").html("Please enter Shop's Closing Time");
            }
            if(shopImg === null || shopImg === ''){
                alert("hmm");
                $("#shopImg").css({"border":"1px solid red"});
                $("#shopImgError").html("Please upload Shop's Image");
            }
        }
        if(validate){
            
            var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;

            if (filter.test(shopContact1)) {
              if(shopContact1.length==10){
                   validate = true;
              } else {
                $("#shopContact1").css({"border": "1px solid red"});
                $("#contact1Error").html("Please put 10  digit mobile number");
                  validate = false;
              }
            }
            else {
                $("#shopContact1").css({"border": "1px solid red"});
                $("#contact1Error").html("Not a valid number");
                  validate = false;
            }

            if(!isEmail(shopEmail)){
                $("#shopEmail").css({"border": "1px solid red"});
                $("#emailError").html("Please enter a valid Email-Id");
            }
        }
        if(validate){
            var url = 'setPass.php';
            var form = $('<form action="' + url + '" method="post" enctype="multipart/form-data" >' +
            '<input type="text" name="shopName" value="'+shopName+'" />' + 
            '<input type="text" name="shopEmail" value="'+shopEmail+'" />' + 
            '<input type="text" name="shopOwnerName" value="'+shopOwnerName+'" />' + 
            '<input type="text" name="shopAddress" value="'+shopAddress+'" />' + 
            '<input type="text" name="shopOpenTime" value="'+shopOpenTime+'" />' + 
            '<input type="text" name="shopCloseTime" value="'+shopCloseTime+'" />' + 
            '<input type="text" name="shopContact1" value="'+shopContact1+'" />' + 
            '<input type="text" name="shopContact2" value="'+shopContact2+'" />' + 
            '<input type="text" name="storeDesc" value="'+shopDesc+'" />' + 
            // '<input type="text" name="shopImgUpload" value="'+shopImg+'" />' + 
            '<input type="file" name="shopImgUpload" id="shopImg" value="'+shopImg+'">'+
            '<input type="text" name="closeDays" value="'+closeDays+'" />'+
            '</form>');
            $('body').append(form);
            form.submit();

        }
    });
</script>