<form action="Validation.php" method="POST">
    <div class="container">        
        <div class="row">
            <div class="col-md-12">
                    <!-- <h3 class="text-center mt-5">E-LIBRARY</h3><br/>  -->
                </div>
            <div class="col-md-6 mx-auto mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col text-center">
                                    <h4>User Login</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                    <hr />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Email ID</label>
                                    <input type="text" placeholder="Email Id" class="form-control" name="user_email_signin" id="user_email_signin">
                                    <p style="color: red; font-size:small;" id="EmailError"></p>
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" class="form-control" placeholder="Password" name="user_pass_signin" id="user_pass_signin">
                                    <p style="color: red; font-size:small;" id="PassError" ></p>
                                </div>
                                <p style="color: red; font-size:medium;" id="Error" ></p>
                                <div class="form-group">
                                    <button type="submit" class="btn-block btn btn-success btn-lg" name="btn_userlogin" id="btn_userlogin">LOG IN</button>
                                    <a href="userSignUp.php" class="btn-block btn btn-primary btn-lg" name="btn_usersignup">SIGN UP</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<br/>
<script>
    $("#user_email_signin").focus(function(){
        $("#user_email_signin").removeAttr("style");
        $("#EmailError").html("");
    });
    $("#user_pass_signin").focus(function(){
        $("#user_pass_signin").removeAttr("style");
        $("#PassError").html("");
    });
    $("#btn_userlogin").click(function(event){
        event.preventDefault();
        $("#Error").html("");
        let user_email_signin = $("#user_email_signin").val();
        let user_pass_signin = $("#user_pass_signin").val();
        let btn_userlogin = "fetch_data";
        if(user_email_signin === null || user_email_signin === '' || user_pass_signin === null || user_pass_signin === ''){
            if(user_email_signin === null || user_email_signin === '' ){
                $("#user_email_signin").css({"border": "1px solid red"});
                $("#EmailError").html("Please enter Email-Id");
            }
            if(user_pass_signin === null || user_pass_signin === ''){
                $("#user_pass_signin").css({"border": "1px solid red"});
                $("#PassError").html("Please enter Password");
            }
        }
        else{
            $.ajax({
                url: "action.php",
                method: "post",
                data: {btn_userlogin:btn_userlogin,user_email_signin:user_email_signin,user_pass_signin:user_pass_signin},
                success: function(data){
                    if(data == 1){
                        location.replace("index.php");
                    }
                    else{
                        $("#Error").html("Email-Id or Password was incorrect");
                    }
                }
            });
        }
    });
</script>