<?php
  include_once 'database/DBController.php'; 
  include_once 'database/fetchproduct.php'; 
  $db = new DBController();

  $product = new Product($db);

//   print_r($product->getData());
