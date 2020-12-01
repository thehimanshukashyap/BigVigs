<?php
include_once 'noice.php';
$dbSize = $size = $data = "";
        $sqldbSize = "SELECT item_size from product where item_id = 81";
        $resultdbSize = mysqli_query($con,$sqldbSize);
        while($row = mysqli_fetch_assoc($resultdbSize)){
            $dbSize = unserialize($row['item_size']);
        }
        $cat = 1;
        $sqlSize = "SELECT cat_size from category where cat_id=".$cat;
        $sizeResult = mysqli_query($con,$sqlSize);
        while($row = mysqli_fetch_assoc($sizeResult)){
            $size = unserialize($row['cat_size']);
        }
        // print_r($dbSize);
        // print_r($size);

        // foreach($dbSize as $dbSize){
        //     echo " ".$dbSize;
        // }
        
        // foreach($size as $size){
        //     echo " ".$size;
        // }
        for($i =0; $i<count($dbSize);$i++){
            for($j=0;$j=count($size);$j++){
                if($dbSize[$i] == $size[$j]){
                    echo "<br>Insideif";
                }else{
                    echo "<br>InsideElse";
                }
            }
        }
        
//         // foreach($dbSize as $dbSize){

//         //     foreach($size as $size){
//         //         if($size == $dbSize){
//         //             echo $size." = ".$dbSize;
//         //             echo "<br>insided if condition";

//         //     //         $data .= "<li><input type='checkbox' id='prodSize' name='prodSize[]' value=".$size." class='my-1' selected />&nbsp;&nbsp;".$size."</li>";
//         //         }
//         //         else{
//         //             echo "<br>inside else condition";
//         //             // $data .= "<li><input type='checkbox' id='prodSize' name='prodSize[]' value=".$dbSize." class='my-1'/>&nbsp;&nbsp;".$dbSize."</li>";
//         //             // $data .= "<li><input type='checkbox' id='prodSize' name='prodSize[]' value=".$size." class='my-1'/>&nbsp;&nbsp;".$size."</li>";
//         //         }
//         //     }
//         // }
echo "hi";
?>