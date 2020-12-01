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
            $sql = "INSERT INTO `specdropu` (`item_id`, `sleeveLength`, `collar`, `fit`, `patternType`, `occasion`, `length`, `hemline`, `placket`, `fabric`
                    , `weavetype`, `sleeveStyling`, `pattern`, `neck`, `surfaceStyling`, `frontStyling`, `pockets`, `hood`, `closure`, `patternCoverage`, `type`)
                    VALUES ('$item_id', '$sleeveLength', '$collar', '$fit', '$patternType', '$occasion', '$length', '$hemline',
                    '$placket', '$fabric', '$weavetype', '$sleeveStyling', '$pattern', '$neck',
                    '$surfaceStyling', '$frontStyling', '$pockets', '$hood', '$closure', '$patternCoverage', '$type');";

            mysqli_query($con,$sql);
            ?>
            <input type="text" value="<?php echo $sql;?>">
            <?php
            echo $sql;
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
                                <label>Sleave Length</label>
                                <input type="hidden" name="" class="sleeveLengthVal" value="sleeveLength">
                                <input type="text" name="sleeveLengthVal" id="sleeveLengthVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('sleeveLength')" class="form-control">
                                <div class="sleeveLengthSuggest"></div>
                              </div>
                              <div class="col-md-6">
                                <label>Collar</label>
                                <input type="hidden" name="" class="collarVal" value="collar">
                                <input type="text" name="collarVal" id="collarVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('collar')" class="form-control">
                                <div class="collarSuggest"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Length</label>
                                <input type="hidden" name="" class="lengthVal" value="length">
                                <input type="text" name="lengthVal" id="lengthVal" onfocus="getSuggestData('length')" placeholder="ex: Full sleeve" class="form-control">
                                <div class="lengthSuggest"></div>
                            </div>
                            <div class="col-md-6">
                              <label>Occasion</label>
                                <input type="hidden" name="" class="occasionVal" value="occasion">
                              <input type="text" name="occasionVal" id="occasionVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('occasion')" class="form-control">
                                <div class="occasionSuggest"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Fit</label>
                                <input type="hidden" name="" class="fitVal" value="fit">
                                <input type="text" name="fitVal" id="fitVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('fit')" class="form-control">
                                <div class="fitSuggest"></div>
                            </div>
                            <div class="col-md-6">
                              <label>Pattern Type</label>
                                <input type="hidden" name="" class="patternTypeVal" value="patternType">
                              <input type="text" name="patternTypeVal" id="patternTypeVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('patternType')" class="form-control">
                                <div class="patternTypeSuggest"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Hemline</label>
                                <input type="hidden" name="" class="hemlineVal" value="hemline">
                                <input type="text" name="hemlineVal" id="hemlineVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('hemline')" class="form-control">
                                <div class="hemlineSuggest"></div>
                            </div>
                            <div class="col-md-6">
                              <label>Placket</label>
                                <input type="hidden" name="" class="placketVal" value="placket">
                              <input type="text" name="placketVal" id="placketVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('placket')" class="form-control">
                                <div class="placketSuggest"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Fabric</label>
                                <input type="hidden" name="" class="fabricVal" value="fabric">
                                <input type="text" name="fabricVal" id="fabricVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('fabric')" class="form-control">
                                <div class="fabricSuggest"></div>
                            </div>
                            <div class="col-md-6">
                              <label>Weave Type</label>
                                <input type="hidden" name="" class="weaveTypeVal" value="weaveType">
                              <input type="text" name="weaveTypeVal" id="weaveTypeVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('weaveType')" class="form-control">
                              <div class="weaveTypeSuggest"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Sleeve Styling</label>
                                <input type="hidden" name="" class="sleeveStylingVal" value="sleeveStyling">
                                <input type="text" name="sleeveStylingVal" id="sleeveStylingVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('sleeveStyling')" class="form-control">
                                <div class="sleeveStylingSuggest"></div>
                            </div>
                            <div class="col-md-6">
                              <label>Pattern</label>
                                <input type="hidden" name="" class="patternVal" value="pattern">
                              <input type="text" name="patternVal" id="patternVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('pattern')" class="form-control">
                                <div class="patternSuggest"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-xl-6 col-sm-12">
                            <label>Neck</label>
                                <input type="hidden" name="" class="neckVal" value="neck">
                            <input type="text" name="neckVal" id="neckVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('neck')" class="form-control">
                                <div class="neckSuggest"></div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-sm-12">
                                <label for="">Surface Styling : </label>
                                <input type="hidden" name="" class="surfaceStylingVal" value="surfaceStyling">
                                <input type="text" name="surfaceStylingVal" id="surfaceStylingVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('surfaceStyling')" class="form-control">
                                <div class="surfaceStylingSuggest"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-xl-6 col-sm-12">
                                <label for="">Front Styling : </label><br>
                                <input type="hidden" name="" class="frontStylingVal" value="frontStyling">
                                <input type="text" name="frontStylingVal" id="frontStylingVal" placeholder="ex: Full sleeve" onfocus="SuggestData('length')" class="form-control">
                                <div class="frontStylingSuggest"></div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-sm-12">
                                <label for="">Pockets : </label><br>
                                <input type="hidden" name="" class="pocketsVal" value="pockets">
                                <input type="text" name="pocketsVal" id="pocketsVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('pockets')" class="form-control">
                                <div class="pocketsSuggest"></div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-lg-6 col-xl-6 col-sm-12">
                                <label for="">Hood : </label><br>
                                <input type="hidden" name="" class="hoodVal" value="hood">
                                <input type="text" name="hoodVal" id="hoodVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('hood')" class="form-control">
                                <div class="hoodSuggest"></div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-sm-12">
                                <label for="">Closure : </label><br>
                                <input type="hidden" name="" class="closureVal" value="closure">
                                <input type="text" name="closureVal" id="closureVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('closure')" class="form-control">
                                <div class="closureSuggest"></div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-lg-6 col-xl-6 col-sm-12">
                                <label for="">Type : </label><br>
                                <input type="hidden" name="" class="typeVal" value="type">
                                <input type="text" name="typeVal" id="typeVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('type')" class="form-control">
                                <div class="typeSuggest"></div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-sm-12">
                                <label for="">Pattern Coverage : </label><br>
                                <input type="hidden" name="" class="patternCoverageVal" value="patternCoverage">
                                <input type="text" name="patternCoverageVal" id="patternCoverageVal" placeholder="ex: Full sleeve" onfocus="getSuggestData('patternCoverage')" class="form-control">
                                <div class="patternCoverageSuggest"></div>
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