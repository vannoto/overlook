<?php
session_start();

$username = $_SESSION['userid'];

// do NOT add to table if user is not logged in
if ($_SESSION['userid'] == null) {
  echo("not logged in");	
  exit;
}

// get ID and append to table
$ITEM_ID = $_GET['item_id'];

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

// get item from inventory
$table = 'inventory';
$result = mysqli_query ($connect, "SELECT * FROM $table WHERE ITEM_ID = '$ITEM_ID'"); 

// insert item into favorites table
$fav_table = 'favorites';

// first, check if favorite already exists
//$check_item = mysqli_query ($connect, "SELECT * FROM $fav_table WHERE ITEM_ID = '$ITEM_ID' AND USER_ID = '$username'");
//if (!empty($result)){
//  echo ("taken");
//  exit;
//}

// if not, insert into favorites
$stmt = mysqli_prepare ($connect, "INSERT INTO $fav_table VALUES (?, ?, ?, ?, ?, ?, ?)");
while ($row = $result->fetch_row()){
  mysqli_stmt_bind_param ($stmt, 'sssssss', $row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $username);
}
mysqli_stmt_execute ($stmt);
mysqli_stmt_close ($stmt);

echo($ITEM_ID);

// Close connection to the database
mysqli_close($connect);

?>
