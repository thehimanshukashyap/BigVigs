<?php
    include_once '../database/DBController.php';
    if(isset($_POST['itemid'])){
        $itemId = $_POST['itemid'];
        $sql = "SELECT * FROM product where item_id=$itemId";
        $result = mysqli_query($con,$sql);
        // while($row =  mysqli_fetch_assoc($result)){
        //     echo $row['item_price'];
        // }
        // print_r($result);
        echo json_encode($result);
    }
?>