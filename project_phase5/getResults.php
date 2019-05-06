<?php

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

$searchterm = $_POST["search"];
$searchterm = explode(" ", $searchterm);

$table = "inventory_test";

$result = "none";

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

$script = $_SERVER['PHP_SELF'];
print <<<TOP
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Overlook</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./results.css">
    <script src="./func.js"></script>
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
                <form>
                    <p>Sort by vendor:</p>
                    <input type="checkbox" name="Depop" id="option1">
                    <label for="option1">Depop</label><br>
		    <input type="checkbox" name="Poshmark" id="option2">
                    <label for="option2">Poshmark</label><br>
		    <input type="checkbox" name="Mercari" id="option3">
                    <label for="option3">Mercari</label><br>
                    <input type="checkbox" name="ThredUp" id="option4">
                    <label for="option4">ThredUp</label><br>
                </form>
            </div>
        </div>
        
        <div class="searchbar">
           <form method = "post" action = "$script">
               <input type = "text" id = "search" name = "search" maxlength = "60" placeholder = "Begin your search..."/>
           </form>
        </div>

        <div id="results">
        <table>
TOP;

// store results into response variable
if (count($result) == 0)
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

   $container = '<div id="container"><a href="' . $row[3] . '" target="_blank"> <img id="result_img" src="' . $row[4] . '" width="180" height= "180" alt="result"><p>' . $row[0] . '</p></a><p><b>' . $row[1] . '</b> | $' . $row[2] . '</p><button type=button id="fav">Add to Favorites</button><br></div>';

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

// Close connection to the database
mysqli_close($connect);
?>
