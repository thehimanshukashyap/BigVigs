<?php
    include_once 'noice.php';
    include_once 'database/DBController.php';

    $shop = $_SESSION['shop_id']??1;
    $sql = "SELECT item_id from product where rp in (SELECT rp from shopinfo where shopId = $shop) and shopId = $shop;";

    $result = mysqli_query($con,$sql);
    $item_id = '';

    while($row = mysqli_fetch_assoc($result)){
        $item_id = $row['item_id'];
    }
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $distress = $_POST['distress'];
        $waistRise = $_POST['waistRise'];
        $fade = $_POST['fade'];
        $shade = $_POST['shade'];
        $fit = $_POST['fit'];
        $length = $_POST['prodLength'];
        $waistBand = $_POST['waistBand'];
        $stretch = $_POST['stretch'];
        $closure = $_POST['closure'];
        $reversible = $_POST['reversible'];
        $effects = $_POST['effects'];
        $pockets = $_POST['pockets'];
        $occasion = $_POST['occasion'];
        $features = $_POST['features'];
        $flyType = $_POST['flyType'];
        $mainTrend = $_POST['mainTrend'];
        $weaveType = $_POST['weaveType'];
        $pleat = $_POST['pleat'];
        $type = $_POST['type'];
        $pattern = $_POST['pattern'];
        $patternType = $_POST['patternType'];
        $fabric = $_POST['fabric'];

        if(isset($_POST['submit'])){
            $sql = "INSERT INTO `specdropb` (`item_id`, `distress`, `waistRise`, `fade`, `shade`, `fit`, `length`, `waistband`, `stretch`, `closure`, `reversible`,
            `effects`,`pockets`, `occasion`, `features`, `flyType`, `mainTrend`, `weaveType`, `pleat`, `type`, `pattern`, `patternType`, `fabric`)
            VALUES ('$item_id',
                    '$distress',
                    '$waistRise',
                    '$fade',
                    '$shade',
                    '$fit',
                    '$length',
                    '$waistBand',
                    '$stretch',
                    '$closure',
                    '$reversible',
                    '$effects',
                    '$pockets',
                    '$occasio',
                    '$features',
                    '$flyType',
                    '$mainTrend',
                    '$weaveType',
                    '$pleat',
                    '$type',
                    '$pattern',
                    '$patternType',
                    '$fabric');";
                    echo "This is on line 64 of catDown.php ".$sql;
            mysqli_query($con,$sql);
            head("shopProfile.php");
        }

        if(isset($_POST['cancel'])){
            $sql = "DELETE FROM `product` WHERE `product`.`item_id` = $item_id";
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
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

<form method="post">

    <div class="container">
        <div class="row m-4"><h3 class="mx-auto">BIGVIGS STORE</h3><br/> </div>
        <div class="row">
            <div class="col-md-9 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col text-center">
                                    <h4>Upload Product</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center">
                                    <hr />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Distress</label>
                              <input type="text" name="distress" id="distressVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('distress')" class="form-control">
                              <div class="distressSuggest"></div>
                              </div>
                              <div class="col-md-6">
                                <label>WaistRise</label>
                                <input type="text" name="waistRise" id="waistRiseVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('waistRise')" class="form-control">
                                <div class="waistRiseSuggest"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Fade</label>
                                <input type="text" name="fade" id="fadeVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('fade')" class="form-control">
                                <div class="fadeSuggest"></div>
                            </div>
                            <div class="col-md-6">
                              <label>Shade</label>
                              <input type="text" name="shade" id="shadeVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('shade')" class="form-control">
                              <div class="shadeSuggest"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Fit</label>
                                <input type="text" name="fit" id="fitVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('fit')" class="form-control">
                                <div class="fitSuggest"></div>
                            </div>
                            <div class="col-md-6">
                              <label>Length</label>
                              <input type="text" name="length" id="lengthVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('length')" class="form-control">
                              <div class="lengthSuggest"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Waist Band</label>
                                <input type="text" name="waistBand" id="waistBandVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('waistBand')" class="form-control">
                                <div class="waistBandSuggest"></div>
                            </div>
                            <div class="col-md-6">
                              <label>Stretch</label>
                              <input type="text" name="stretch" id="stretchVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('stretch')" class="form-control">
                              <div class="stretchSuggest"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Closure</label>
                                <input type="text" name="closure" id="closureVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('closure')" class="form-control">
                                <div class="closureSuggest"></div>
                            </div>
                            <div class="col-md-6">
                              <label>Reversible</label>
                              <input type="text" name="reversible" id="reversibleVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('reversible')" class="form-control">
                              <div class="reversibleSuggest"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Effects</label>
                                <input type="text" name="effects" id="effectsVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('effects')" class="form-control">
                                <div class="effectsSuggest"></div>
                            </div>
                            <div class="col-md-6">
                              <label>Pockets</label>
                              <input type="text" name="pocket_no" id="pocket_noVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('pocket_no')" class="form-control">
                              <div class="pocket_noSuggest"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-xl-6 col-sm-12">
                            <label>Occasion</label>
                            <input type="text" name="occasion" id="occasionVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('occasion')" class="form-control">
                            <div class="occasionSuggest"></div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-sm-12">
                                <label for="">Feature : </label>
                                <input type="text" name="feature" id="featuresVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('features')" class="form-control">                    
                                <div class="featuresSuggest"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-xl-6 col-sm-12">
                                <label for="">Fly type : </label><br>
                                <input type="text" name="flyType" id="flyTypeVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('flyType')" class="form-control">
                                <div class="flyTypeSuggest"></div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-sm-12">
                                <label for="">Main Trend : </label><br>
                                <input type="text" name="mainTrend" id="mainTrendVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('mainTrend')" class="form-control">
                                <div class="mainTrendSuggest"></div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-lg-6 col-xl-6 col-sm-12">
                                <label for="">Weave type : </label><br>
                                <input type="text" name="weaveType" id="weavetypeVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('weavetype')" class="form-control">
                                <div class="weavetypeSuggest"></div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-sm-12">
                                <label for="">Pleate : </label><br>
                                <input type="text" name="pleat" id="pleatVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('pleat')" class="form-control">                              
                                <div class="pleatSuggest"></div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-lg-6 col-xl-6 col-sm-12">
                                <label for="">Type : </label><br>
                                <input type="text" name="type" id="typeVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('type')" class="form-control">
                                <div class="typeSuggest"></div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-sm-12">
                                <label for="">Pattern : </label><br>
                                <input type="text" name="pattern" id="patternVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('pattern')" class="form-control">
                                <div class="patternSuggest"></div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-lg-6 col-xl-6 col-sm-12">
                                <label for="">Pattern type : </label><br>
                                <input type="text" name="patternType" id="patternTypeVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('patternType')" class="form-control">
                                <div class="patternTypeSuggest"></div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-sm-12">
                                <label for="">Fabric : </label><br>
                                <input type="text" name="fabric" id="fabricVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('fabric')" class="form-control">
                                <div class="fabricSuggest"></div>
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
            let val = $(this).val();
            let table = 'bottomspecification';
            let getSuggest = 'fetch_data';
            // let getSuggesfadfaft = 'fetch_data';
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


</body>
</html>