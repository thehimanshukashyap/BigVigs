<?php 
$arr1 = array(1, 2); 
$arr2 = array(3, 4); 
  
// arr2 elements are being pushed in the arr1. 
array_push($arr1 ,$arr2);  
  
echo "arr1 = "; 
  
// Use for each loop to print all the array elements. 
foreach ($arr1 as $value) { 
echo $value . ' '; 
} 
?>