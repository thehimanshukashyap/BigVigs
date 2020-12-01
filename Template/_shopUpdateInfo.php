<?php
     $sql = "SELECT * FROM shopinfo where shopId = ".$_SESSION['shop_id'];
     $result = mysqli_query($con,$sql);
     $shopInfo = array();
     while($row = mysqli_fetch_assoc($result)){
        $shopInfo[] =  $row;
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
                        <div class="col text-center">
                                <h4>Store SignUp</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                                <hr />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Shop Image</label>
                            <input type="file" name="shopImgUpload" id="file" value="<?php echo $shopInfo[0]['shopImg']?>">
                            <p style="color: red; font-size: small;" id="shopImgError"></p>
                        </div>
                        <div class="col-md-6">
                            <label>Name of Store</label>
                            <input type="text" class="form-control" placeholder="Shop Name" name="shopName" id="shopName" value="<?php echo $shopInfo[0]['shopName']?>">
                            <p style="color: red; font-size: small;" id="nameError"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Name of Store Owner</label>
                            <input type="text" class="form-control" placeholder="Shop Owner Name" id="shopOwnerName" name="shopOwnerName" value="<?php echo $shopInfo[0]['shopOwnerName']?>">
                            <p style="color: red; font-size: small;" id="ownerError"></p>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email-ID</label>
                                <input type="email" placeholder="Email ID" class="form-control" id="shopEmail" name="shopEmail" value="<?php echo $shopInfo[0]['shopEmail']?>">
                                <p style="color: red; font-size: small;" id="emailError"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Contact No</label>
                            <input type="text" placeholder="Contact No." class="form-control" id="shopContact1" name="shopContact1" value="<?php echo $shopInfo[0]['shopContact1']?>">
                            <p style="color: red; font-size: small;" id="contact1Error"></p>
                        </div>
                        <div class="col-md-6">
                            <label>Alternate Contact No</label>
                            <input type="text" placeholder="Contact No." class="form-control" id="shopContact2" name="shopContact2" value="<?php echo $shopInfo[0]['shopContact2']?>">
                            <p style="color: red; font-size: small;" id="contact2Error"></p>
                        </div>
                    </div>
                    <div class="row py-1 my-2">
                        <div class="col-md-6">
                        <label>Opening time : </label>
                        <input type="time" name="shopOpenTime" id="shopOpenTime" value="<?php echo $shopInfo[0]['shopOpenTime']?>">
                        <p style="color: red; font-size: small;" id="shopOpenError"></p>
                        </div>
                        <div class="col-md-6">
                        <label>Closing time : </label>
                        <input type="time" name="shopCloseTime" id="shopCloseTime" value="<?php echo $shopInfo[0]['shopCloseTime']?>">
                        <p style="color: red; font-size: small;" id="shopCloseError"></p>
                        </div>
                    </div>
                    
                    <label for="">Closed on : </label>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6"><input name = "closeDays[]" id="closeDays" value = "1" type = "checkbox" class="mx-1">Sunday</input></div>
                        <div class="col-lg-3 col-md-6 col-sm-6"><input name = "closeDays[]" id="closeDays" value = "2" type = "checkbox" class="mx-1">Monday</input></div>
                        <div class="col-lg-3 col-md-6 col-sm-6"><input name = "closeDays[]" id="closeDays" value = "3" type = "checkbox" class="mx-1">Tuesday</input></div>
                        <div class="col-lg-3 col-md-6 col-sm-6"><input name = "closeDays[]" id="closeDays" value = "4" type = "checkbox" class="mx-1">Wednesday</input></div>
                        <div class="col-lg-3 col-md-6 col-sm-6"><input name = "closeDays[]" id="closeDays" value = "5" type = "checkbox" class="mx-1">Thursday</input></div>
                        <div class="col-lg-3 col-md-6 col-sm-6"><input name = "closeDays[]" id="closeDays" value = "6" type = "checkbox" class="mx-1">Friday</input></div>
                        <div class="col-lg-3 col-md-6 col-sm-6"><input name = "closeDays[]" id="closeDays" value = "7" type = "checkbox" class="mx-1">Saturday</input></div>
                        <p style="color: red; font-size: small;" id="closedOnError"></p>
                    </div>

                    <label for="shopAddress">Shop Address : </label>
                    <textarea name="shopAddress" id="shopAddress" cols="0" rows="1" class="form-control" ><?php echo $shopInfo[0]['shopAddress']?></textarea>
                    <p style="color: red; font-size: small;" id="shopAddError"></p>
                    
                    <label for="" class="py-2">Describe yourself</label>
                    <textarea name="storeDesc" id="storeDesc" cols="30" rows="3" class="form-control"><?php echo $shopInfo[0]['shopDesc']?></textarea>
                    <p style="color: red; font-size: small;" id="descError"></p>

                    <br />
                    <p style="color: red; font-size:medium;" id="Error"></p>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                            <div class="form-group">
                                <button type="submit" class="btn-block btn-lg btn btn-success" name="updateStoreData" id="updateStoreData">UPDATE STORE INFO</button>
                            </div>
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
    $("#file").focus(function(){
        $("#file").removeAttr("style");
        $("#shopImgError").html("");
    });
    $("#closeDays").focus(function(){
        $("#closeDays").removeAttr("style");
    });

    $("#updateStoreData").click(function(event){
        event.preventDefault();
        var validate = true;
        $("#Error").html("");
        let updateStoreData = "fetch_data";
        let shopName = $("#shopName").val();
        let shopEmail = $("#shopEmail").val();
        let shopOwnerName = $("#shopOwnerName").val();
        let shopAddress = $("#shopAddress").val();
        let shopOpenTime = $("#shopOpenTime").val();
        let shopCloseTime = $("#shopCloseTime").val();
        let shopContact1 = $("#shopContact1").val();
        let shopContact2 = $("#shopContact2").val();
        let shopDesc = $("#storeDesc").val();
        let shopImg = $("#file")[0].files;
        let closeDays = $("#closeDays").val();

        if (shopName ===null || shopEmail ===null || shopOwnerName ===null || shopAddress ===null || shopOpenTime ===null || shopCloseTime ===null || shopContact1 ===null || shopContact2 ===null || shopDesc ===null ||  shopName === '' || shopEmail === '' || shopOwnerName === '' || shopAddress === '' || shopOpenTime === '' || shopCloseTime === '' || shopContact1 === '' || shopContact2 === '' || shopDesc === '' || closeDays === null || closeDays === ''){
            validate = false;
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
            // if(shopImg === null || shopImg === ''){
            //     alert("hmm");
            //     $("#shopImg").css({"border":"1px solid red"});
            //     $("#shopImgError").html("Please upload Shop's Image");
            // }
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
                validate = false;
                $("#shopEmail").css({"border": "1px solid red"});
                $("#emailError").html("Please enter a valid Email-Id");
            }
            if(shopImg.length>0){
                var file = shopImg[0];
                var fileType = file.type;
                var match = ['application/pdf', 'application/msword', 'application/vnd.ms-office', 'image/jpeg', 'image/png', 'image/jpg'];
                if(!((fileType == match[0]) || (fileType == match[1]) || (fileType == match[2]) || (fileType == match[3]) || (fileType == match[4]) || (fileType == match[5]))){
                    validate = false;
                    $("#shopImgError").html("Please Select a valid Image Format");
                }
            }
        }
        if(validate){
            var fd = new FormData();
            fd.append('shopImgUpload',shopImg[0]);
            fd.append('updateStoreData', 'fetch_dataa');
            fd.append('shopName',shopName);
            fd.append('shopEmail',shopEmail);
            fd.append('shopOwnerName',shopOwnerName );
            fd.append('shopAddress', shopAddress);
            fd.append('shopOpenTime',shopOpenTime);
            fd.append('shopCloseTime',shopCloseTime);
            fd.append('shopContact1',shopContact1 );
            fd.append('shopContact2',shopContact2 );
            fd.append('shopDesc',shopDesc );
            fd.append('shopImg',shopImg );
            fd.append('closeDays',closeDays );
            $.ajax({
                url:"action.php",
                type: "post",
                data:fd,
                contentType: false,
                processData: false,
                success: function(data){
                    if(data == 1){
                        location.replace("shopProfile.php");
                    }
                },
                error: function(data){
                    $("#Error").html("There was some Error while uploading this data. Please Check your data.");
                }
            });
        }
    });
</script>