<form method="POST">
<div class="container">        
    <div class="row">
        <div class="col-md-12">
                <h3 class="text-center mt-5">BIGIVIGS</h3><br/> 
            </div>
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col text-center">
                                <h4>Shop Login</h4>
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
                                <input type="text" placeholder="Email Id" class="form-control" name="shop_email_signin" id="shop_email_signin">
                                <p style="color: red; font-size:small;" id="EmailError"></p>
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control" placeholder="Password" name="shop_pass_signin" id="shop_pass_signin">
                                <p style="color: red; font-size:small;" id="PassError" ></p>
                            </div>
                            <p style="color: red; font-size:medium;" id="Error" ></p>
                            <div class="form-group">
                                <button type="submit" class="btn-block btn btn-success btn-lg" name="btn_shoplogin" id="btn_shoplogin">LOG IN</button>
                                <a href="storeSignUp.php" class="btn-block btn btn-primary btn-lg" name="btn_usersignup">SIGN UP</a>
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
    $("#shop_email_signin").focus(function(){
        $("#shop_email_signin").removeAttr("style");
        $("#EmailError").html("");
    });
    $("#shop_pass_signin").focus(function(){
        $("#shop_pass_signin").removeAttr("style");
        $("#PassError").html("");
    });
    $("#btn_shoplogin").click(function(event){
        event.preventDefault();
        $("#Error").html("");
        let shop_email_signin = $("#shop_email_signin").val();
        let shop_pass_signin = $("#shop_pass_signin").val();
        let btn_shoplogin = "fetch_data";
        if(shop_email_signin === null || shop_email_signin === '' || shop_pass_signin === null || shop_pass_signin === ''){
            if(shop_email_signin === null || shop_email_signin === '' ){
                $("#shop_email_signin").css({"border": "1px solid red"});
                $("#EmailError").html("Please enter Email-Id");
            }
            if(shop_pass_signin === null || shop_pass_signin === ''){
                $("#shop_pass_signin").css({"border": "1px solid red"});
                $("#PassError").html("Please enter Password");
            }
        }
        else{
            $.ajax({
                url: "action.php",
                method: "post",
                data: {btn_shoplogin:btn_shoplogin,shop_email_signin:shop_email_signin,shop_pass_signin:shop_pass_signin},
                success: function(data){
                    if(data == 1){
                        location.replace("shopProfile.php");
                    }
                    else{
                        $("#Error").html("Email-Id or Password was incorrect");
                    }
                }
            });
        }
    });
</script>