<?php
$userName = $_GET['username']; 
$uNames = array(); 
$myfile = fopen('passwd.txt', 'r') or die('Unable to open file'); 
while(!feof($myfile)) {
    $line = fgets($myfile); 
    $str = explode(":", $line); 
    array_push($uNames, trim($str[0])); 
}
fclose($myfile); 

if (in_array(trim($userName), $uNames)) {
    $username_used = "true"; 
}
echo $username_used; 
?>