<?php

// class DBController{
    $host = "localhost";
    $user = "root";
    $pass ="";
    $database = "bigvigs";

    $con = mysqli_connect($host,$user,$pass,$database);


//     public $con = null;

//     public function  _construct(){
//         $this->con = mysqli_connect($this->host,$this->user,$this->pass,$this->database);
//         if($this->con->connect_error){
//             echo "Fail".$this->con->connect_error;
//         }
//     }

//     public function _destruct(){
//         $this->closeConnection();
//     }

//     // for mysqli closing connection
//     protected function closeConnection(){
//         if($this->con!=null){
//             $this->con->close();
//             $this->con = null;
//         }
//     }
// }

// $db = new DBController();
