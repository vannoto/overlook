<?php
$username = $_GET["username"];
$myfile = fopen("passwd.txt", "r") or die ("Unable to open file.");
while (!feof($myfile)){
    $line =  fgets($myfile);
    $line_contents = explode(":", $line);
    if ($username == $line_contents[0]){
        $response = "taken";
    }
}
fclose($myfile);
echo($response);
?>