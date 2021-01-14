<?php

$array = array(

    "Acid Wash",
    "Highly Distress",
    "Levis Distress",
    "Diesel Distress",
    "Dark Distress",
    "Boyfriend Distress",
    "Girlfriend Distress",
    "Knee Distress",
    "Cropped Distress",
    "Patches Distress",
    "Low-Rise Distress",
    "Khaki Distress",
    "Baggy Distress",
    "Monkey Wash Distress",
    "Patchy Distress",
    "Painting Spot Distress",
    "Ripped",
    "Loose Jeans",
    "One Side Distress",
    "Blade Cut Shrink",
    "High Waist Distress",
    "Side Distress",
    "Medium Distress"

);

$array = serialize($array);

include_once 'noice.php';
// $sql = "UPDATE `upperspecification` SET `distress` = '$array' WHERE `upperspecification`.`upperSpecId` = 1";

$sql = "UPDATE `bottomspecification` SET `distress` = '$array' WHERE `bottomspecification`.`bottomSpecificationId` = 1";
$result = mysqli_query($con,$sql);
if($result){
    echo "inserted";
}
else{
    echo "<br><br>".$array."<br><br>";
    echo mysqli_error($con);
    echo "not Inserted";
}

?>