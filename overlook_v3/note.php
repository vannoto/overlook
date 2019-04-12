
<?php

if(isset($_POST['signup'])) {

$myfile = fopen ("signup.txt", "a");
  if ($myfile){
    foreach($names as $key => $value){
      $hour = $key;
      
      if (isset($_POST[$key]) && trim($_POST[$key]) !== ""){
        fwrite ($myfile, "$hour, $value \n");
      }
    }
  }
  fclose ($myfile);
    
}
  

$arr = array(); 


if(isset($_POST['login'])) {

 $myfile = fopen("signup.txt", "r");
  while (!feof($myfile)){
    $line =  fgets($myfile);
    $line_char = explode(",", $line);
    $arr[$line_char[0]] = $line_char[1];
  }
  fclose($myfile);

    //need to check if username is set in file 
    
}
  

?>