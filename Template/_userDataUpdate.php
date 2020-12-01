<?php

    $sql = "SELECT * FROM user where user_id =".$_SESSION['user_id'];
    $result = mysqli_query($con,$sql);
    $userInfo = array();
    while($row = mysqli_fetch_assoc($result)){
        $userInfo[] = $row;
    }

?>

<form action="setPass.php" method="post">

<div class="container mt-5">
            <div class="row">
                <div class="col-md-12  text-center">
                       <h3>UPDATE</h3><br/>
                    </div>
                <div class="col-md-9 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                        <h6>User Update</h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <hr />
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col-md-6">
                                    <label for="file">Update Image</label>
                                    <input type="file" name="file" id="file">
                                    <p style="color: red; font-size:small;" id="shopImgError"></p>
                                </div>
                                <div class="col-md-6">
                                    <label for="updateGender">Gender</label><br>
                                    <input type="radio" name="updateGender" id="updateGender" class="updateGender" value="1" <?php if($userInfo[0]['user_gender'] == 1){echo "checked";}?>> Male
                                    <input type="radio" name="updateGender" id="updateGender" class="updateGender" value="2" <?php if($userInfo[0]['user_gender'] == 2){echo "checked";}?> > Female
                                    <p style="color: red; font-size:small;" id="GenderError"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Full Name</label>
                                    <input type="text" class="form-control" placeholder="Full Name" name="full_name" id="full_name" value="<?php echo $userInfo[0]['user_name'];?>">
                                    <p style="color: red; font-size:small;" id="NameError"></p>
                                </div>
                                <div class="col-md-6">
                                        <label>Date of Birth</label>
                                        <input type="date" placeholder="DOB" class="form-control" name="user_dob" id="user_dob" value="<?php echo $userInfo[0]['user_dob'];?>">
                                        <p style="color: red; font-size:small;" id="DobError"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                        <label>Contact No</label>
                                        <input type="text" placeholder="Contact No." class="form-control" name="user_contact" id="user_contact" value="<?php echo $userInfo[0]['user_contact1'];?>">
                                        <p style="color: red; font-size:small;" id="ContactError"></p>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email-ID</label>
                                        <input type="email" placeholder="Email Id" class="form-control" name="user_email" id="user_email" value="<?php echo $userInfo[0]['user_email'];?>">
                                        <p style="color: red; font-size:small;" id="EmailError"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="userAddressUpdate">Address: </label>
                                    <textarea name="userAddressUpdate" class="form-control" id="user_address" cols="30" rows="3" value=""><?php echo $userInfo[0]['user_address'];?></textarea>
                                    <p style="color: red; font-size:small;" id="AddError"></p>
                                </div>
                            </div>
                            <p style="color: red; font-size:medium;" id="Error"></p>
                            <br />
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <button class="btn-block btn btn-success btn-lg" name="btn_userUpdate" id="btn_userUpdate">Update Info</button>
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
    $("#full_name").focus(function(){
        $("#full_name").removeAttr("style");
        $("#NameError").html("");
    });
    $("#user_dob").focus(function(){
        $("#user_dob").removeAttr("style");
        $("#DobError").html("");
    });
    $("#user_contact").focus(function(){
        $("#user_contact").removeAttr("style");
        $("#ContactError").html("");
    });
    $("#user_email").focus(function(){
        $("#user_email").removeAttr("style");
        $("#EmailError").html("");
    });
    $("#user_address").focus(function(){
        $("#user_address").removeAttr("style");
        $("#AddError").html("");
    });
    $("#user_gender").focus(function(){
        $("#user_gender").removeAttr("style");
        $("#GenderError").html("");
    });

    $("#btn_userUpdate").click(function(evt){
        evt.preventDefault();
        // alert("himm");
        var validate = true;
        $("#Error").html("");
        let userImg = $("#file")[0].files;
        let full_name = $("#full_name").val();
        let user_gender = $("#updateGender:checked").val();
        let user_dob = $("#user_dob").val();
        let user_contact = $("#user_contact").val();
        let user_email = $("#user_email").val();
        let user_address = $("#user_address").val();
        let btn_userUpdate = "fetch_data";
        if(full_name === null || full_name === '' || user_dob === null || user_dob === '' || user_contact === null || user_contact === '' || user_email === null || user_email === '' || user_address=== null || user_address === '' || user_gender == null || user_gender == ''){
            validate = false;
            if(full_name === null || full_name === '' ){
                $("#full_name").css({"border": "1px solid red"});
                $("#NameError").html("Please enter Name");
            }
            if(user_dob === null || user_dob === ''){
                $("#user_dob").css({"border": "1px solid red"});
                $("#DobError").html("Please enter DOB");
            }
            if(user_contact === null || user_contact === ''){
                $("#user_contact").css({"border": "1px solid red"});
                $("#ContactError").html("Please enter Contact Number");
            }
            if(user_email === null || user_email === ''){
                $("#user_email").css({"border": "1px solid red"});
                $("#EmailError").html("Please enter Email-Id");
            }
            if(user_address === null || user_address === ''){
                $("#user_address").css({"border": "1px solid red"});
                $("#AddError").html("Please enter Address");
            }
            if(user_gender === null || user_gender === ''){
                // $("#user_gender").css({"border": "1px solid red"});
                $("#GenderError").html("Please select Gender");
            }
        }
        if(validate){
            
            var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;

            if (filter.test(user_contact)) {
              if(user_contact.length==10){
                   validate = true;
              } else {
                $("#user_contact").css({"border": "1px solid red"});
                $("#ContactError").html("Please put 10  digit mobile number");
                  validate = false;
              }
            }
            else {
                $("#user_contact").css({"border": "1px solid red"});
                $("#ContactError").html("Not a valid number");
                  validate = false;
            }

            if(!isEmail(user_email)){
                $("#user_email").css({"border": "1px solid red"});
                $("#EmailError").html("Please enter a valid Email-Id");
            }
            if(userImg.length>0){
                var file = userImg[0];
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
            fd.append('userImgUpload',userImg[0]);
            fd.append('full_name',full_name);
            fd.append('user_gender',user_gender);
            fd.append('user_dob',user_dob);
            fd.append('user_contact',user_contact);
            fd.append('user_email',user_email);
            fd.append('user_address',user_address);
            fd.append('btn_userUpdate',btn_userUpdate);
            
            $.ajax({
                url:"action.php",
                type: "post",
                data:fd,
                contentType: false,
                processData: false,
                success: function(data){
                    if(data == 1){
                        location.replace("userProfile.php");
                    }
                },
                error: function(data){
                    $("#Error").html("There was some Error while uploading this data. Please Check your data.");
                }
            });
        }
    });
    </script>
