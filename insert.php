<?php
    include_once 'database\DBController.php';

    $string = array(
        "name"=>"Himanshu","address"=>"C-525 Hariom nagar ghb pandesara surat","mobile"=>"9558662985"
);
    $arr= array($string);
    array_push($arr,$string);
    $string = array(
        "name"=>"Kashyap","address"=>"C-525 Gandhi nagar ahmedabad","mobile"=>"7856321456"
);
    array_push($arr,$string);
    $string = array(
        "name"=>"Raj","address"=>"C-525 Vadodra Gujarat","mobile"=>"7854123658"
    );
    array_push($arr,$string);
    print_r($arr);
    $string = serialize($arr);


    // $sql = "UPDATE `glassspecification` SET `frame_color` = '$string' WHERE `glassspecification`.`glassSpecificationId` = 1";
    // $sql = "INSERT INTO `glassspecification` (`style`) VALUES ('$string') where glassSpecificationId = 1";
    $sql = "UPDATE `user` SET `addArr` = '$string   ' WHERE `user`.`user_id` = 19";
    $result = mysqli_query($con,$sql);
    if($result){
        echo "Inserted";
    }
    else{
        echo "failed";
        echo"<br>Error Description: ".mysqli_error($con);
    }
?>

<!-- Avaitor
Wayfarer Style
Cat Eye
Oversized
Butterfly
Sport
Clubmaster
Shield
Browline Glasses
Wrap -->