<?php 
session_start(); 

// echo ($_SESSION['userid']); 

if ($_SESSION['userid'] != null) {
    //echo ('souja boyyy aint NULL'); 
    header('Location: logout.html'); 
    session_unset();
    session_destroy(); 
    exit;
}

elseif ($_SESSION['userid'] == null) {
    //echo ('this is the NULL time'); 
    header('Location: login.html'); 
    //session_unset();
    //session_destroy(); 
    exit;
}
//echo ('something'); 
/*
if ($_SESSION['userid'] != null) {
    header('Location: logout.html'); 
    session_unset();
    session_destroy(); 
    exit;
}

else {
    header('Location: login.html'); 
    session_unset();
    session_destroy(); 
    exit;
}

*/

?>
