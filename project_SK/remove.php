<?php
session_start();

$username = $_SESSION['userid'];

// do NOT delete from table if user is not logged in
if ($_SESSION['userid'] == null) {
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

// delete item from favorites table
$fav_table = 'favorites';

mysqli_query($connect, "DELETE FROM $fav_table WHERE ITEM_ID='$ITEM_ID' AND USER_ID='$username'");

echo($ITEM_ID);

// Close connection to the database
mysqli_close($connect);
?>
