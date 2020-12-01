<?php
    include_once 'header.php';
    $shop = $_SESSION['shop_id'];
        $sql = "SELECT item_id from product where rp in (SELECT rp from shopinfo where shopId = $shop) and shopId = $shop;";
    $result = mysqli_query($con,$sql);
    $item_id = '';

    while($row = mysqli_fetch_assoc($result)){
        $item_id = $row['item_id'];
    }
    if($_SERVER['REQUEST_METHOD']=='POST'){
        
        $type = $_POST['typeVal'];
        $lens_color = $_POST['lens_colorVal'];
        $feature = $_POST['featureVal'];
        $style = $_POST['styleVal'];
        $frame_color = $_POST['frame_colorVal'];
        $face_shape = $_POST['face_shapeVal'];
        $glass_case = $_POST['glass_caseVal'];
        $warranty = $_POST['warrantyVal'];

        if(isset($_POST['submit'])){

            $sql = "INSERT INTO `specglasses` (`item_id`, `type`, `lens_color`, `feature`, `style`, `frame_color`, `face_shape`, `glass_case`, `warranty`) VALUES
            ('$item_id', '$type', '$lens_color', '$feature', '$style', '$frame_color', '$face_shape', '$glass_case', '$warranty')";

            mysqli_query($con,$sql);
            ?>
            <input type="text" value="<?php echo $sql;?>">
            <?php
            echo $sql;
            head("shopProfile.php");
        }

        if(isset($_POST['cancel'])){
            $sql = "DELETE FROM `specglasses` WHERE `specglasses`.`item_id` =".$item_id;
            mysqli_query($con,$sql);
            head("shopProfile.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Upload</title>
    <!-- Custom css -->
    <link rel="stylesheet" href="../CSS/index.css">
    <!-- Tailwind css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.7.3/tailwind.min.css" integrity="sha512-jJ4q433srLv86rVtrIu5Tco3NLLZ81Y4kkgr7jqm19oZG7cutkYOSSVLqQJ0I4niSm/5X5B4BeEbnBRvFfhWLg==" crossorigin="anonymous" />
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- GOOGLE ROBOTO FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Owl carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />
    <!-- font awesome kit -->
    <script src="https://kit.fontawesome.com/f2fae123e6.js" crossorigin="anonymous"></script>
    <!-- Jquery link -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3 .5.1/jquery.min.js"></script>

</head>
<body>

<form action="" method="post">

    <div class="container">
        <div class="row m-4"><h3 class="mx-auto">BIGVIGS STORE</h3><br/> </div>
        <div class="row">
            <div class="col-md-9 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <center>
                                        <h4>Upload Product</h4>
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
                                <label>Type</label>
                                <input type="hidden" name="" class="typeVal" value="type">
                                <input type="text" name="typeVal" id="typeVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('type')" class="form-control">
                                <div class="typeSuggest"></div>
                              </div>
                              <div class="col-md-6">
                                <label>Lens Colour</label>
                                <input type="hidden" name="" class="lens_colorVal" value="lens_color">
                                <input type="text" name="lens_colorVal" id="lens_colorVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('lens_color')" class="form-control">
                                <div class="lens_colorSuggest"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Feature</label>
                                <input type="hidden" name="" class="featureVal" value="feature">
                                <input type="text" name="featureVal" id="featureVal" onfocus="getSuggestData('feature')" placeholder="ex: Full sleeve" class="form-control">
                                <div class="featureSuggest"></div>
                            </div>
                            <div class="col-md-6">
                              <label>Style</label>
                                <input type="hidden" name="" class="styleVal" value="style">
                              <input type="text" name="styleVal" id="styleVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('style')" class="form-control">
                                <div class="occasionSuggest"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Frame Colour</label>
                                <input type="hidden" name="" class="frame_colorVal" value="frame_color">
                                <input type="text" name="frame_colorVal" id="frame_colorVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('frame_color')" class="form-control">
                                <div class="fitSuggest"></div>
                            </div>
                            <div class="col-md-6">
                              <label>Face Shape</label>
                                <input type="hidden" name="" class="face_shapeVal" value="face_shape">
                              <input type="text" name="face_shapeVal" id="face_shapeVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('face_shape')" class="form-control">
                                <div class="face_shapeSuggest"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Glass Case</label>
                                <input type="hidden" name="" class="glass_caseVal" value="glass_case">
                                <input type="text" name="glass_caseVal" id="glass_caseVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('glass_case')" class="form-control">
                                <div class="glass_caseSuggest"></div>
                            </div>
                            <div class="col-md-6">
                              <label>Warranty</label>
                                <input type="hidden" name="" class="warrantyVal" value="warranty">
                                <select name="warrantyVal" id="warrantyVal" class="form-control">
                                    <option value="1 Months">N/A</option>
                                    <option value="1 Months">1 Months</option>
                                    <option value="2 Months">2 Months</option>
                                    <option value="3 Months">3 Months</option>
                                    <option value="4 Months">4 Months</option>
                                    <option value="5 Months">5 Months</option>
                                    <option value="6 Months">6 Months</option>
                                    <option value="7 Months">7 Months</option>
                                    <option value="8 Months">8 Months</option>
                                    <option value="9 Months">9 Months</option>
                                    <option value="10 Months">10 Months</option>
                                    <option value="11 Months">11 Months</option>
                                    <option value="12 Months">12 Months</option>
                                    <option value="13 Months">13 Months</option>
                                    <option value="14 Months">14 Months</option>
                                    <option value="15 Months">15 Months</option>
                                    <option value="16 Months">16 Months</option>
                                    <option value="17 Months">17 Months</option>
                                    <option value="18 Months">18 Months</option>
                                    <option value="19 Months">19 Months</option>
                                    <option value="20 Months">20 Months</option>
                                    <option value="21 Months">21 Months</option>
                                    <option value="22 Months">22 Months</option>
                                    <option value="23 Months">23 Months</option>
                                    <option value="24 Months">24 Months</option>
                                </select>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col">
                                    <input type="submit" name="submit" value="Move next >" class="btn-block btn-lg btn btn-success"/>
                                    <input type="submit" name="cancel" value="Cancel" class="btn-block btn-lg btn"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
  <!--  -->
        </div>
    </div>
</form>

<!-- --------------------------JS FILES---------------------------- -->

<script>
    
    var column = "";
    function getSuggestData(col){
        $("."+column+"Suggest").fadeOut();
        $("."+column+"Suggest").html("");
        input = "#"+col+"Val";
        column = col;
        $(input).keyup(function(){
            // alert("hmm");
            let val = $(this).val();
            // alert(val);
            let table = 'glassspecification';
            let getSuggest = 'fetch_data';
            if( $(this).val() != ''){
                $.ajax({
                    url: "action.php",
                    method: "post",
                    data: {getSuggest:getSuggest, column:column, table:table},
                    success: function(data){
                        data = JSON.parse(data);
                        let html = '<ul class="list-unstyled border p-0"  style="background: whitesmoke;">';
                        for(i = 0; i<data.length; i++){
                            if( data[i].toLowerCase().includes(val.toLowerCase())){
                                html += "<li class=' p-2'  style='cursor: pointer; border-bottom: 1px solid lightgray;' value = '"+data[i]+"'>"+data[i]+"</li>";
                            }
                        }
                        html += '</ul>';
                        $("."+col+"Suggest").fadeIn();
                        $("."+col+"Suggest").html(html);
                    }
                });
            }
            else{
                $("."+col+"Suggest").fadeOut();
                $("."+col+"Suggest").html("");
            }
            $(document).on('click','li',function(){
                $(input).val($(this).text());
                $("."+col+"Suggest").fadeOut();
                input = col = null;
            });
        });
    }
</script>

<!-- ------------------------------CUSTOM JS--- -->
</body>
</html>