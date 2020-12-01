<?php 

class Product{
    public $db = null;

    public function _construct(DBController $db){
        if(!isset($db->con))
        {
            return null;
        }     
        $this->db = $db;
    }

    // fetch product data using getData method
    public function getData($table = 'product'){
        $result = $this->db->con->query("SELECT * FROM {$table}");
        $resultArray = array();

        // fetch product data one by one
        while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }

        return $resultArray;
    }
}