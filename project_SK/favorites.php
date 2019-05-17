<?php 
// view all on user table
session_start();
$username = $_SESSION['userid'];
if ($_SESSION['userid'] == null) {
    header('Location: ./login.html');
    exit;
}
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
// query all of saved favorites
$table = 'favorites';
$result = mysqli_query ($connect, "SELECT * FROM $table WHERE USER_ID = '$username'"); 
print <<<TOP
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Overlook</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./results.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="./favorites.js"></script>
    <script src="./remove.js"></script>
</head>
    <div class="header">
        <div class="register">
            <a href="./redirect.php">Login/Logout</a>
            <a href="./signup.html">Sign Up</a>
        </div>
    </div>
    Welcome to your favorites page, $username. Anything that you add to your favorites will be saved here. Press the Go Back button to return to the results section.
   <body>
        <div id="nav">
            <a href="./overlook.html"><img src="overlook_logo.png" alt="logo" class="logo" height="40px"></a>
            <div class="options">
                <a href = "./getResults.php">Go back</a><br><br>
            </div> 
        </div>
	<div id="results">
	<table>
TOP;
// store favorites into response variable and print it
if ($result == "")
{
  print ("<tr><td>Nothing added yet!</td></tr>");
}
else
{
  $count = 0;
  while ($row = $result->fetch_row()){
   if ($count % 4 == 0){
      $numElem = 0;
      print ("<tr>");
   }
   $container = '<div id="container"><a href="' . $row[4] . '" target="_blank"> <img id="result_img" src="' . $row[5] . '" width="180" height= "180" alt="result"><p>' . $row[1] . '</p></a><p><b>' . $row[2] . '</b> | $' . $row[3] . '</p><form id = "fav_button" method = "post"><button type=submit onClick = "removeFave(this)" id="remove" class="' . $row[0] . '" name="' . $row[0] . '" value="' . $row[0] . '">Remove</button></form></div>';
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
    </body>
</html>
BOTTOM;
// Close connection to the database
mysqli_close($connect);
?>