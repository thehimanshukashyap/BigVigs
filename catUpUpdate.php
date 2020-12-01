<?php
    include_once 'header.php';
    $item_id = $_GET['item_id'];
    $specInfo = array();
    $sql = "SELECT * FROM specdropu where item_id=".$item_id;
    $result = mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($result)){
        $specInfo[] = $row;
    }
    if($_SERVER['REQUEST_METHOD']=='POST'){

        $sleeveLength = $_POST['sleaveLengthVal'];
        $collar = $_POST['collarVal'];
        $fit = $_POST['fitVal'];
        $patterType = $_POST['patterTypeVal'];
        $occasion = $_POST['occasionVal'];
        $length = $_POST['lengthVal'];
        $hemline = $_POST['hemlineVal'];
        $placket = $_POST['placketVal'];
        $fabric = $_POST['fabricVal'];
        $weavetype = $_POST['weavetypeVal'];
        $sleeveStyling = $_POST['sleeveStylingVal'];
        $pattern = $_POST['patternVal'];
        $neck = $_POST['neckVal'];
        $surfaceStyling = $_POST['surfaceStylingVal'];
        $frontStyling = $_POST['frontStylingVal'];
        $pockets = $_POST['pocketsVal'];
        $hood = $_POST['hoodVal'];
        $closure = $_POST['closureVal'];
        $patternCoverage = $_POST['patternCoverageVal'];
        $type = $_POST['typeVal'];

        if(isset($_POST['submit'])){
            $sql = '';
            if(isset($specInfo) && !empty($specInfo)){
                $sql = "UPDATE `specdropu` SET `sleeveLength` = '$sleeveLength', `collar` = '$collar', `fit` = '$fit', `patternType` = '$patternType', `occasion` = '$occasion',
                        `length` = '$length', `hemline` = '$hemline', `placket` = '$placket', `fabric` = '$fabric', `weavetype` = '$weavetype', `sleeveStyling` = '$sleeveStyling',
                        `pattern` = '$pattern', `neck` = '$neck', `surfaceStyling` = '$surfaceStyling', `frontStyling` = '$frontStyling', `pockets` = '$pockets', `hood` = '$hood',
                        `closure` = '$closure', `patternCoverage` = '$patternCoverage', `type` = '$type' WHERE `specdropu`.`item_id` = $item_id";
            }
            else{
                $sql = "INSERT INTO `specdropu` (`item_id`, `sleeveLength`, `collar`, `fit`, `patternType`, `occasion`, `length`, `hemline`, `placket`, `fabric`
                        , `weavetype`, `sleeveStyling`, `pattern`, `neck`, `surfaceStyling`, `frontStyling`, `pockets`, `hood`, `closure`, `patternCoverage`, `type`)
                        VALUES ('$item_id', '$sleeveLength', '$collar', '$fit', '$patternType', '$occasion', '$length', '$hemline',
                        '$placket', '$fabric', '$weavetype', '$sleeveStyling', '$pattern', '$neck',
                        '$surfaceStyling', '$frontStyling', '$pockets', '$hood', '$closure', '$patternCoverage', '$type');";
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
                            <div class="col text-center">
                                    <h4>Upload Product</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                    <hr />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Sleave Length</label>
                                <input type="text" name="sleeveLengthVal" id="sleeveLengthVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('sleeveLength')" value="<?php if(isset($specInfo[0]['sleeveLength'])){ echo $specInfo[0]['sleeveLength']; } ?>" class="form-control">
                                <div class="sleeveLengthSuggest"></div>
                              </div>
                              <div class="col-md-6">
                                <label>Collar</label>
                                <input type="text" name="collarVal" id="collarVal" placeholder="ex: Collar less" onfocus="getSuggestData('collar')" value="<?php if(isset($specInfo[0]['collar'])){ echo $specInfo[0]['collar']; }?>" class="form-control">
                                <div class="collarSuggest"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Length</label>
                                <input type="text" name="lengthVal" id="lengthVal" onfocus="getSuggestData('length')" placeholder="ex: Below Knee" value="<?php if(isset($specInfo[0]['length'])){ echo $specInfo[0]['length']; }?>" class="form-control">
                                <div class="lengthSuggest"></div>
                            </div>
                            <div class="col-md-6">
                              <label>Occasion</label>
                              <input type="text" name="occasionVal" id="occasionVal" placeholder="ex: Formal " onfocus="getSuggestData('occasion')" value="<?php if(isset($specInfo[0]['occasion']) ){ echo $specInfo[0]['occasion']; } ?>" class="form-control">
                                <div class="occasionSuggest"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Fit</label>
                                <input type="text" name="fitVal" id="fitVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('fit')" value="<?php if(isset($specInfo[0]['fit'])){ echo $specInfo[0]['fit']; }?>" class="form-control">
                                <div class="fitSuggest"></div>
                            </div>
                            <div class="col-md-6">
                              <label>Pattern Type</label>
                              <input type="text" name="patternTypeVal" id="patternTypeVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('patternType')" value="<?php if(isset($specInfo[0]['patternType'])){ echo $specInfo[0]['patternType']; }?>" class="form-control">
                                <div class="patternTypeSuggest"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Hemline</label>
                                <input type="text" name="hemlineVal" id="hemlineVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('hemline')" value="<?php if(isset($specInfo[0]['hemline'])){ echo $specInfo[0]['hemline']; }?>" class="form-control">
                                <div class="hemlineSuggest"></div>
                            </div>
                            <div class="col-md-6">
                              <label>Placket</label>
                              <input type="text" name="placketVal" id="placketVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('placket')" value="<?php if(isset($specInfo[0]['placket'])){ echo $specInfo[0]['placket']; }?>" class="form-control">
                                <div class="placketSuggest"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Fabric</label>
                                <input type="text" name="fabricVal" id="fabricVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('fabric')" value="<?php if(isset($specInfo[0]['fabric'])){ echo $specInfo[0]['fabric']; }?>" class="form-control">
                                <div class="fabricSuggest"></div>
                            </div>
                            <div class="col-md-6">
                              <label>Weave Type</label>
                              <input type="text" name="weaveTypeVal" id="weaveTypeVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('weaveType')" value="<?php if(isset($specInfo[0]['weavetype'])){ echo $specInfo[0]['weavetype']; }?>" class="form-control">
                              <div class="weaveTypeSuggest"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Sleeve Styling</label>
                                <input type="text" name="sleeveStylingVal" id="sleeveStylingVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('sleeveStyling')" value="<?php if(isset($specInfo[0]['sleeveStyling'])){ echo $specInfo[0]['sleeveStyling']; }?>" class="form-control">
                                <div class="sleeveStylingSuggest"></div>
                            </div>
                            <div class="col-md-6">
                              <label>Pattern</label>
                              <input type="text" name="patternVal" id="patternVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('pattern')" value="<?php if(isset($specInfo[0]['pattern'])){ echo $specInfo[0]['pattern']; }?>" class="form-control">
                                <div class="patternSuggest"></div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-6 col-xl-6 col-sm-12">
                            <label>Neck</label>
                            <input type="text" name="neckVal" id="neckVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('neck')" value="<?php if(isset($specInfo[0]['neck'])){ echo $specInfo[0]['neck']; }?>" class="form-control">
                                <div class="neckSuggest"></div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-sm-12">
                                <label for="">Surface Styling : </label>
                                <input type="text" name="surfaceStylingVal" id="surfaceStylingVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('surfaceStyling')" value="<?php if(isset($specInfo[0]['surfaceStyling'])){ echo $specInfo[0]['surfaceStyling']; }?>" class="form-control">
                                <div class="surfaceStylingSuggest"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-xl-6 col-sm-12">
                                <label for="">Front Styling : </label><br>
                                <input type="text" name="frontStylingVal" id="frontStylingVal" placeholder="ex: Full sleeve" onfocus="SuggestData('length')" value="<?php if(isset($specInfo[0]['frontStyling'])){ echo $specInfo[0]['frontStyling']; }?>" class="form-control">
                                <div class="frontStylingSuggest"></div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-sm-12">
                                <label for="">Pockets : </label><br>
                                <input type="text" name="pocketsVal" id="pocketsVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('pockets')" value="<?php if(isset($specInfo[0]['pockets'])){ echo $specInfo[0]['pockets']; }?>" class="form-control">
                                <div class="pocketsSuggest"></div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-lg-6 col-xl-6 col-sm-12">
                                <label for="">Hood : </label><br>
                                <input type="text" name="hoodVal" id="hoodVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('hood')" value="<?php if(isset($specInfo[0]['hood'])){ echo $specInfo[0]['hood']; }?>" class="form-control">
                                <div class="hoodSuggest"></div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-sm-12">
                                <label for="">Closure : </label><br>
                                <input type="text" name="closureVal" id="closureVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('closure')" value="<?php if(isset($specInfo[0]['closure'])){ echo $specInfo[0]['closure']; }?>" class="form-control">
                                <div class="closureSuggest"></div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-lg-6 col-xl-6 col-sm-12">
                                <label for="">Type : </label><br>
                                <input type="text" name="typeVal" id="typeVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('type')" value="<?php if(isset($specInfo[0]['type'])){ echo $specInfo[0]['type']; }?>" class="form-control">
                                <div class="typeSuggest"></div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-sm-12">
                                <label for="">Pattern Coverage : </label><br>
                                <input type="text" name="patternCoverageVal" id="patternCoverageVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('patternCoverage')" value="<?php if(isset($specInfo[0]['patternCoverage'])){ echo $specInfo[0]['patternCoverage']; }?>" class="form-control">
                                <div class="patternCoverageSuggest"></div>
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
    
    let column = '';
    function getSuggestData(col){
        $("."+column+"Suggest").fadeOut();
        $("."+column+"Suggest").html("");
        input = "#"+col+"Val";
        column = col;
        $(input).keyup(function(){
            let val = $(this).val();
            let table = 'upperspecification';
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