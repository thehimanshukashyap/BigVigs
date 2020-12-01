<?php
    ob_start();
    session_start();
    function head($x){
        echo "<script> location.replace('".$x."'); </script>";
    }

    include_once 'database/DBController.php';


    if($_SERVER['REQUEST_METHOD']=="GET"){
        if(isset($_GET['searchIcon'])){
            $_SESSION["searchItem"] = $_GET['searchInput'];
            if($_SESSION["searchItem"]!=''){
                head('search.php');
            }
        }
    }
    
    $resultcheck = 0;
    $result = 1;
    if(isset($_POST['cart'])){
        if($_SESSION['user_id']){
            $user = $_SESSION['user_id'];
            $sql = "SELECT * FROM product WHERE item_id IN (SELECT item_id FROM cart WHERE user_id = $user)";
            $result = mysqli_query($con,$sql);
            $resultcheck = mysqli_num_rows($result);
        }
    }