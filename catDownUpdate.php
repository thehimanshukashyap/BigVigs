<?php
    include_once 'header.php';
    $item_id = $_GET['item_id'];
    $specInfo = array();
    $sql = "SELECT * from specdropb where item_id=".$item_id;
    $result = mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($result)){
        $specInfo[] = $row;
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
            $sql = '';
            if(isset($specInfo) && !empty($specInfo)){
                $sql = "UPDATE `specdropb` SET `distress` = '$distress', `waistRise` = '$waistRise', `fade` = '$fade', `shade` = '$shade', `fit` = '$fit', `length` = '$length', `waistband` = '$waistBand',
                `stretch` = '$stretch', `closure` = '$closure', `reversible` = '$reversible', `effects` = '$effects', `pockets` = '$pockets', `occasion` = '$occasion', `features` = '$features',
                `flyType` = '$flyType', `mainTrend` = '$mainTrend', `weaveType` = '$weaveType', `pleat` = '$pleat', `type` = '$type', `pattern` = '$pattern', `patternType` = '$patternType',
                `fabric` = '$fabric' WHERE `specdropb`.`item_id` = $item_id";
            }
            else{
                $sql = "INSERT INTO `specdropb` (`item_id`, `distress`, `waistRise`, `fade`, `shade`, `fit`, `length`, `waistband`, `stretch`, `closure`, `reversible`, `effects`, `pockets`,
                `occasion`, `features`, `flyType`, `mainTrend`, `weaveType`, `pleat`, `type`, `pattern`, `patternType`, `fabric`) VALUES (
                    '$item_id',
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
                    '$occasion',
                    '$features',
                    '$flyType',
                    '$mainTrend',
                    '$weaveType',
                    '$pleat',
                    '$type',
                    '$pattern',
                    '$patternType',
                    '$fabric'
                )";
            }


            mysqli_query($con,$sql);
            head("shopProfile.php");
        }

        if(isset($_POST['cancel'])){
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
                              <input type="text" name="distress" id="distressVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('distress')" value="<?php if(isset($specInfo[0]['distress'])){ echo $specInfo[0]['distress'];} ?>" class="form-control">
                              <div class="distressSuggest"></div>
                              </div>
                              <div class="col-md-6">
                                <label>WaistRise</label>
                                <input type="text" name="waistRise" id="waistRiseVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('waistRise')" value="<?php if(isset($specInfo[0]['waistRise'])){echo $specInfo[0]['waistRise'];} ?>" class="form-control">
                                <div class="waistRiseSuggest"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Fade</label>
                                <input type="text" name="fade" id="fadeVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('fade')" value="<?php if(isset($specInfo[0]['fade'])){echo $specInfo[0]['fade'];} ?>" class="form-control">
                                <div class="fadeSuggest"></div>
                            </div>
                            <div class="col-md-6">
                              <label>Shade</label>
                              <input type="text" name="shade" id="shadeVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('shade')" value="<?php if(isset($specInfo[0]['shade'])){echo $specInfo[0]['shade'];} ?>" class="form-control">
                              <div class="shadeSuggest"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Fit</label>
                                <input type="text" name="fit" id="fitVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('fit')" value="<?php if( isset($specInfo[0]['fit']) ){echo $specInfo[0]['fit'];} ?>" class="form-control">
                                <div class="fitSuggest"></div>
                            </div>
                            <div class="col-md-6">
                              <label>Length</label>
                              <input type="text" name="length" id="lengthVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('length')" value="<?php if(isset($specInfo[0]['length'])){echo $specInfo[0]['length'];} ?>" class="form-control">
                              <div class="lengthSuggest"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Waist Band</label>
                                <input type="text" name="waistBand" id="waistBandVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('waistBand')" value="<?php if(isset($specInfo[0]['waistBand'])){echo $specInfo[0]['waistBand'];} ?>" class="form-control">
                                <div class="waistBandSuggest"></div>
                            </div>
                            <div class="col-md-6">
                              <label>Stretch</label>
                              <input type="text" name="stretch" id="stretchVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('stretch')" value="<?php if(isset($specInfo[0]['stretch'])){echo $specInfo[0]['stretch'];} ?>" class="form-control">
                              <div class="stretchSuggest"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Closure</label>
                                <input type="text" name="closure" id="closureVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('closure')" value="<?php if(isset($specInfo[0]['closure'])){echo $specInfo[0]['closure'];} ?>" class="form-control">
                                <div class="closureSuggest"></div>
                            </div>
                            <div class="col-md-6">
                              <label>Reversible</label>
                              <input type="text" name="reversible" id="reversibleVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('reversible')" value="<?php if(isset($specInfo[0]['reversible'])){echo $specInfo[0]['reversible'];} ?>" class="form-control">
                              <div class="reversibleSuggest"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Effects</label>
                                <input type="text" name="effects" id="effectsVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('effects')" value="<?php if(isset($specInfo[0]['effects'])){echo $specInfo[0]['effects'];} ?>" class="form-control">
                                <div class="effectsSuggest"></div>
                            </div>
                            <div class="col-md-6">
                              <label>Pockets</label>
                              <input type="text" name="pocket_no" id="pocket_noVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('pocket_no')" value="<?php if(isset($specInfo[0]['pocket_no'])){echo $specInfo[0]['pocket_no'];} ?>" class="form-control">
                              <div class="pocket_noSuggest"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-xl-6 col-sm-12">
                            <label>Occasion</label>
                            <input type="text" name="occasion" id="occasionVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('occasion')" value="<?php if(isset($specInfo[0]['occasion'])){echo $specInfo[0]['occasion'];} ?>" class="form-control">
                            <div class="occasionSuggest"></div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-sm-12">
                                <label for="">Feature : </label>
                                <input type="text" name="feature" id="featuresVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('features')" value="<?php if(isset($specInfo[0]['feature'])){echo $specInfo[0]['feature'];} ?>" class="form-control">                    
                                <div class="featuresSuggest"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-xl-6 col-sm-12">
                                <label for="">Fly type : </label><br>
                                <input type="text" name="flyType" id="flyTypeVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('flyType')" value="<?php if(isset($specInfo[0]['flyType'])){echo $specInfo[0]['flyType'];} ?>" class="form-control">
                                <div class="flyTypeSuggest"></div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-sm-12">
                                <label for="">Main Trend : </label><br>
                                <input type="text" name="mainTrend" id="mainTrendVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('mainTrend')" value="<?php if(isset($specInfo[0]['mainTrend'])){echo $specInfo[0]['mainTrend'];} ?>" class="form-control">
                                <div class="mainTrendSuggest"></div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-lg-6 col-xl-6 col-sm-12">
                                <label for="">Weave type : </label><br>
                                <input type="text" name="weaveType" id="weavetypeVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('weavetype')" value="<?php if(isset($specInfo[0]['weaveType'])){echo $specInfo[0]['weaveType'];} ?>" class="form-control">
                                <div class="weavetypeSuggest"></div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-sm-12">
                                <label for="">Pleate : </label><br>
                                <input type="text" name="pleat" id="pleatVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('pleat')" value="<?php if(isset($specInfo[0]['pleat'])){echo $specInfo[0]['pleat'];} ?>" class="form-control">                              
                                <div class="pleatSuggest"></div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-lg-6 col-xl-6 col-sm-12">
                                <label for="">Type : </label><br>
                                <input type="text" name="type" id="typeVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('type')" value="<?php if(isset($specInfo[0]['type'])){echo $specInfo[0]['type'];} ?>" class="form-control">
                                <div class="typeSuggest"></div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-sm-12">
                                <label for="">Pattern : </label><br>
                                <input type="text" name="pattern" id="patternVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('pattern')" value="<?php if(isset($specInfo[0]['pattern'])){echo $specInfo[0]['pattern'];} ?>" class="form-control">
                                <div class="patternSuggest"></div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-lg-6 col-xl-6 col-sm-12">
                                <label for="">Pattern type : </label><br>
                                <input type="text" name="patternType" id="patternTypeVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('patternType')" value="<?php if(isset($specInfo[0]['patternType'])){echo $specInfo[0]['patternType'];} ?>" class="form-control">
                                <div class="patternTypeSuggest"></div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-sm-12">
                                <label for="">Fabric : </label><br>
                                <input type="text" name="fabric" id="fabricVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('fabric')" value="<?php if(isset($specInfo[0]['fabric'])){echo $specInfo[0]['fabric'];} ?>" class="form-control">
                                <div class="fabricSuggest"></div>
                            </div>
                        </div> 

                        <br />
                        <div class="row">
                            <div class="col">
                                <input type="submit" name="submit" value="Update" class="btn-block btn-lg btn btn-success"/>
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