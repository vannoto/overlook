<?php
session_start();
$username = $_SESSION['userid'];
// echo "<script>console.log( 'Debug Objects: " . $_SESSION['userid'] . "' );</script>";
// Connect to the MySQL database
$host = "localhost";
$user = "cs329e_mitra_vaa546";
$pwd = "Gender=smile3gauge";
$dbs = "cs329e_mitra_vaa546";
$port = "3306";
$connect = mysqli_connect ($host, $user, $pwd, $dbs, $port);
if(empty($connect))
{
  die("mysqli_connect failed: " . mysqli_connect_error());
}
$searchterm = mysqli_real_escape_string ($connect, $_POST["search"]);
$searchterm = explode(" ", $searchterm);
$depop = mysqli_real_escape_string ($connect, $_POST["Depop"]);
$poshmark = mysqli_real_escape_string ($connect, $_POST["Poshmark"]);
$mercari = mysqli_real_escape_string ($connect, $_POST["Mercari"]);
$thredup = mysqli_real_escape_string ($connect, $_POST["ThredUp"]);
$filters = array();
if ($depop != ""){
  array_push($filters, "Depop");
}
if ($poshmark != ""){
  array_push($filters, "Poshmark");
}
if ($mercari != ""){
  array_push($filters, "Mercari");
}
if ($thredup != ""){
  array_push($filters, "ThredUp");
}
$table = "inventory";
// if no filters or all filters are selected, show all results
if (count($filters) == 0 OR count($filters) == 4){
  // max number of words in search is 5, rest is cut off
  if (count($searchterm) == 1){
      $result = mysqli_query ($connect, "SELECT * FROM $table WHERE NAME LIKE '%$searchterm[0]%'"); 
  }
  else if (count($searchterm) == 2){
      $result = mysqli_query ($connect, "SELECT * FROM $table WHERE NAME LIKE '%$searchterm[0]%$searchterm[1]%'"); 
  }
  else if (count($searchterm) == 3){
      $result = mysqli_query ($connect, "SELECT * FROM $table WHERE NAME LIKE '%$searchterm[0]%$searchterm[1]%$searchterm[2]%'");
  }
  else if (count($searchterm) == 4){
      $result = mysqli_query ($connect, "SELECT * FROM $table WHERE NAME LIKE '%$searchterm[0]%$searchterm[1]%$searchterm[2]%$searchterm[3]%'");
  }
  else if (count($searchterm) == 5){
      $result = mysqli_query ($connect, "SELECT * FROM $table WHERE NAME LIKE '%$searchterm[0]%$searchterm[1]%$searchterm[2]%$searchterm[3]%$searchterm[4]%'");
  }
}
// if one filter is selected
if (count($filters) == 1){
  // max number of words in search is 5, rest is cut off
  if (count($searchterm) == 1){
      $result = mysqli_query ($connect, "SELECT * FROM $table WHERE NAME LIKE '%$searchterm[0]%' AND LOCATION='$filters[0]'");
  }
  else if (count($searchterm) == 2){
      $result = mysqli_query ($connect, "SELECT * FROM $table WHERE NAME LIKE '%$searchterm[0]%$searchterm[1]%' AND LOCATION='$filters[0]'");
  }
  else if (count($searchterm) == 3){
      $result = mysqli_query ($connect, "SELECT * FROM $table WHERE NAME LIKE '%$searchterm[0]%$searchterm[1]%$searchterm[2]%' AND LOCATION='$filters[0]'");
  }
  else if (count($searchterm) == 4){
      $result = mysqli_query ($connect, "SELECT * FROM $table WHERE NAME LIKE '%$searchterm[0]%$searchterm[1]%$searchterm[2]%$searchterm[3]%' AND LOCATION='$filters[0]'");
  }
  else if (count($searchterm) == 5){
      $result = mysqli_query ($connect, "SELECT * FROM $table WHERE NAME LIKE '%$searchterm[0]%$searchterm[1]%$searchterm[2]%$searchterm[3]%$searchterm[4]%' AND LOCATION='$filters[0]'");
  }
} 
// if two filters are selected
if (count($filters) == 2){
  // max number of words in search is 5, rest is cut off
  if (count($searchterm) == 1){
      $result = mysqli_query ($connect, "SELECT * FROM $table WHERE NAME LIKE '%$searchterm[0]%' AND (LOCATION='$filters[0]' OR LOCATION='$filters[1]')");
  }
  else if (count($searchterm) == 2){
      $result = mysqli_query ($connect, "SELECT * FROM $table WHERE NAME LIKE '%$searchterm[0]%$searchterm[1]%' AND (LOCATION='$filters[0]' OR LOCATION='$filters[1]')");
  }
  else if (count($searchterm) == 3){
      $result = mysqli_query ($connect, "SELECT * FROM $table WHERE NAME LIKE '%$searchterm[0]%$searchterm[1]%$searchterm[2]%' AND (LOCATION='$filters[0]' OR LOCATION='$filters[1]')");
  }
  else if (count($searchterm) == 4){
      $result = mysqli_query ($connect, "SELECT * FROM $table WHERE NAME LIKE '%$searchterm[0]%$searchterm[1]%$searchterm[2]%$searchterm[3]%' AND (LOCATION='$filters[0]' OR LOCATION='$filters[1]')");
  }
  else if (count($searchterm) == 5){
      $result = mysqli_query ($connect, "SELECT * FROM $table WHERE NAME LIKE '%$searchterm[0]%$searchterm[1]%$searchterm[2]%$searchterm[3]%$searchterm[4]%' AND (LOCATION='$filters[0]' OR LOCATION='$filters[1]')");
  }
}
// if three filters are selected
if (count($filters) == 3){
  // max number of words in search is 5, rest is cut off
  if (count($searchterm) == 1){
      $result = mysqli_query ($connect, "SELECT * FROM $table WHERE NAME LIKE '%$searchterm[0]%' AND (LOCATION='$filters[0]' OR LOCATION='$filters[1]' OR LOCATION='$filters[2]')");
  }
  else if (count($searchterm) == 2){
      $result = mysqli_query ($connect, "SELECT * FROM $table WHERE NAME LIKE '%$searchterm[0]%$searchterm[1]%' AND (LOCATION='$filters[0]' OR LOCATION='$filters[1]' OR LOCATION='$filters[2]')");
  }
  else if (count($searchterm) == 3){
      $result = mysqli_query ($connect, "SELECT * FROM $table WHERE NAME LIKE '%$searchterm[0]%$searchterm[1]%$searchterm[2]%' AND (LOCATION='$filters[0]' OR LOCATION='$filters[1]' OR LOCATION='$filters[2]')");
  }
  else if (count($searchterm) == 4){
      $result = mysqli_query ($connect, "SELECT * FROM $table WHERE NAME LIKE '%$searchterm[0]%$searchterm[1]%$searchterm[2]%$searchterm[3]%' AND (LOCATION='$filters[0]' OR LOCATION='$filters[1]' OR LOCATION='$filters[2]')");
  }
  else if (count($searchterm) == 5){
      $result = mysqli_query ($connect, "SELECT * FROM $table WHERE NAME LIKE '%$searchterm[0]%$searchterm[1]%$searchterm[2]%$searchterm[3]%$searchterm[4]%' AND (LOCATION='$filters[0]' OR LOCATION='$filters[1]' OR LOCATION='$filters[2]')");
  }
}
$script = $_SERVER['PHP_SELF'];
print <<<TOP
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Overlook</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <link rel="stylesheet" href="./results.css">
    <script src="./func.js"></script>
    <script src="./favorites.js"></script>
    <script src="./remove.js"></script>
    </head>  
    <div class="header"> 
        <div class="register">
            <a href="./redirect.php">Login/Logout</a>
            <a href="./signup.html">Sign Up</a>  
        </div>
    </div>
  
   <body>
        <div id="nav">
            <a href="./overlook.html"><img src="overlook_logo.png" alt="logo" class="logo" height="40px"></a>
            <div class="options">
                <a href = "./favorites.php">View favorites</a><br><br>
                <form method = "post" action = "$script">
                    <p>Sort by vendor:</p>
                    <input type="checkbox" name="Depop" id="option1">
                    <label for="option1">Depop</label><br>
		    <input type="checkbox" name="Poshmark" id="option2">
                    <label for="option2">Poshmark</label><br>
		    <input type="checkbox" name="Mercari" id="option3">
                    <label for="option3">Mercari</label><br>
                    <input type="checkbox" name="ThredUp" id="option4">
		    <label for="option4">ThredUp</label><br>
		    <input type="submit" id = "applyFilter" value = "Search">
            </div>
        </div>
        
        <div class="searchbar">
               <input type = "text" id = "search" name = "search" maxlength = "60" placeholder = "Begin your search..."/>
           </form>
        </div>
        <div id="results">
        <table>
TOP;
// store results into response variable
if (empty($result))
{
  echo ("No results found.");
}
else
{
  $count = 0;
  while ($row = $result->fetch_row()){
   if ($count % 4 == 0){
      $numElem = 0;
      print ("<tr>");
   }
   if (!checkExists($row[0], $username)){
     $container = '<div id="container"><a href="' . $row[4] . '" target="_blank"> <img id="result_img" src="' . $row[5] . '" width="180" height= "180" alt="result"><p>' . $row[1] . '</p></a><p><b>' . $row[2] . '</b> | $' . $row[3] . '</p><form id = "fav_button" method = "post"><button type=button onClick = "callServer(this)" id="fav" class="' . $row[0] . '" name="' . $row[0] . '" value="' . $row[0] . '">Add to Favorites</button></form></div>';
   }
   else {
     $container = '<div id="container"><a href="' . $row[4] . '" target="_blank"> <img id="result_img" src="' . $row[5] . '" width="180" height= "180" alt="result"><p>' . $row[1] . '</p></a><p><b>' . $row[2] . '</b> | $' . $row[3] . '</p><form id = "fav_button" method = "post"><button type=button onClick = "removeFave(this)" id="remove" class="' . $row[0] . '" name="' . $row[0] . '" value="' . $row[0] . '">Remove</button></form></div>';
   }
   print ("<td width='180'>" . $container . "</td>");
   if ($numElem == 3){
     print ("</tr>");
   }
   $numElem++;
   $count++;
  }
}
print <<<BOTTOM
        </table>
	</div>
	<button onclick="topFunction()" id="top" title="Go to top">Back to Top <img width='20' src ="https://cdn3.iconfinder.com/data/icons/faticons/32/arrow-up-01-512.png"></button>
    </body>
</html>
BOTTOM;
function checkExists($ITEM_ID, $username){
  // Connect to the MySQL database
  $host = "localhost";
  $user = "cs329e_mitra_vaa546";
  $pwd = "Gender=smile3gauge";
  $dbs = "cs329e_mitra_vaa546";
  $port = "3306";
  $connect = mysqli_connect ($host, $user, $pwd, $dbs, $port);
  $table = 'favorites';
  $check_item = mysqli_query ($connect, "SELECT * FROM $table WHERE ITEM_ID='$ITEM_ID' AND USER_ID='$username'");
  
  if (mysqli_num_rows($check_item) != 0){
    return (true);
  }
  else {
    return (false);
  }
}
// Close connection to the database
mysqli_close($connect);
?>