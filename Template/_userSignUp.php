<form action="setPass.php" method="post">

<div class="container mt-5">
            <div class="row">
                <div class="col-md-12  text-center">
                       <h3>SIGN UP</h3><br/>
                    </div>
                <div class="col-md-9 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                        <h6>User SignUp</h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <hr />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Full Name</label>
                                    <input type="text" class="form-control" placeholder="Full Name" name="full_name" id="full_name">
                                    <p style="color: red; font-size:small;" id="NameError"></p>
                                </div>
                                <div class="col-md-6">
                                        <label>Date of Birth</label>
                                        <input type="date" placeholder="DOB" class="form-control" name="user_dob" id="user_dob">
                                        <p style="color: red; font-size:small;" id="DobError"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                        <label>Contact No</label>
                                        <input type="text" placeholder="Contact No." class="form-control" name="user_contact" id="user_contact">
                                        <p style="color: red; font-size:small;" id="ContactError"></p>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email-ID</label>
                                        <input type="email" placeholder="Email Id" class="form-control" name="user_email" id="user_email">
                                        <p style="color: red; font-size:small;" id="EmailError"></p>
                                    </div>
                                </div>
                            </div>
                            <p style="color: red; font-size:medium;" id="Error"></p>
                            <br />
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <button class="btn-block btn btn-success btn-lg" name="btn_userSignUp" id="btn_userSignUp">Easy Sign Up</button>
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
    $("#btn_userSignUp").click(function(event){
        event.preventDefault();
        var validate = true;
        $("#Error").html("");
        let full_name = $("#full_name").val();
        let user_dob = $("#user_dob").val();
        let user_contact = $("#user_contact").val();
        let user_email = $("#user_email").val();
        let btn_userlogin = "fetch_data";
        if(full_name === null || full_name === '' || user_dob === null || user_dob === '' || user_contact === null || user_contact === '' || user_email === null || user_email === ''){
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
        }
        if(validate){
            var url = 'setPass.php';
            var form = $('<form action="' + url + '" method="post">' +
            '<input type="text" name="full_name" value="'+full_name+'" />' + 
            '<input type="text" name="user_dob" value="'+user_dob+'" />' +
            '<input type="text" name="user_contact" value="'+user_contact+'" />' +
            '<input type="text" name="user_email" value="'+user_email+'" />' +
            '</form>');
            $('body').append(form);
            form.submit();
        }
    });
    </script>