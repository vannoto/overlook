<?php

//if cookies is set, the automatically logged in condition here 

function loginForm() {
    
    $ToRedirect = $_POST['Redirect']; 
    $auth = $_COOKIE['auth']; 
    if($auth == 'true') {
        //if user is logged in redirectArticle(); 
    }
    
    else {
        
    print <<<LOGIN
    <html>
    <head>
    <title> Login </title>
    <style> 
        table {
            display: block; 
            margin-left: auto; 
            margin-right: auto; 
        }
        h2 {
            margin-top: 10px; 
            margin-bottom: 30px; 
            font-size: 30px; 
        }
    </style>
    </head>
    <body>
    <center>
    <h2> Login Credentials </h2>
    </center>
    <table width="25%">
    <form action = "$script" method = "POST">
    <tr>
    <td> Enter username </td>
    <td> <input type = "text" name = "username" size = "30" /></td>
    </tr>
    <tr>
    <td> Enter password </td>
    <td> <input type = "text" name = "password" size = "30" /></td>
    </tr>
    <tr>
    <td> <input type="hidden" name="Redirect" value=$ToRedirect> </td> <td> &nbsp; </td>
    </tr>
    <tr>
    <td> &nbsp; </td> <td> &nbsp; </td>
    </tr>
    <tr>
    <td><input type="submit" name="login" value="Sign In" class="button"/> </td>
    <td><input type="submit" name="signup" value="Sign Up" class="button"/> </td>
    </tr>
    </table>
    </body>
    </html>    
LOGIN;
        
    }
}

function loginAuth () {
    $ToRedirect = $_POST['Redirect'];
    $username = $_POST['username']; 
    $password = $_POST['password']; 
    
    $myfile = fopen('./passwd.txt', 'r'); 
    while(!feof($myfile)) {
        $line = fgets($myfile); 
        $line = explode(':', $line); 
        $user = rtrim($line[0]); 
        $pass = rtrim($line[1]); 
        //echo $user; 
        //echo $pass; 
        if (!$user || !$pass) {
            break;
        }
        elseif ($user == $username && $pass == $password) {
            setcookie('auth', 'true', time() + 120); 
            $ToRedirect = $_POST['Redirect']; 
            //what happens here redirectArticle(); 
            fclose($myfile); 
            return;
        }
    }
    echo "<script> window.alert('Invalid Login. Please try again or press the Sign Up button.'); </script>"; 
    loginForm(); 
    fclose($myfile); 
}


function regRedirect() {
    $ToRedirect = $_POST['Redirect']; 
    print <<<REGISTER
    <html>
    <head>
    <title> Registration Form </title>
    <style> 
        table {
            display: block; 
            margin-left: auto; 
            margin-right: auto; 
        }
        h2 {
            margin-top: 10px; 
            margin-bottom: 30px; 
            font-size: 25px; 
        }
    </style>
    </head>
    <body>
    <center>
    <h2> Register a New User </h2>
    </center>
    <table width="25%">
    <form action = "$script" method = "POST">
    <tr>
    <td> Enter username </td>
    <td> <input type = "text" name = "username" size = "30" /></td>
    </tr>
    <tr>
    <td> Enter password </td>
    <td> <input type = "text" name = "password" size = "30" /></td>
    </tr>
    <tr>
    <td> <input type="hidden" name="Redirect" value=$ToRedirect> </td> <td> &nbsp; </td>
    </tr>
    <tr>
    <td> &nbsp; </td> <td> &nbsp; </td>
    </tr>
    <tr>
    <td><input type="submit" name="reg_auth" value="Register" class="button"/> </td>
    </tr>
    </table>
    </body>
    </html>    
REGISTER;
    
}



function registrationAuth () {
    $username = $_POST['username']; 
    $password = $_POST['password']; 
    if(!$username || !$password) {
        echo "<script>window.alert('Enter all information');</script>";
        regRedirect();
        return;
    }
    else {
        $userArray = array(); 
        $myfile = fopen("./passwd.txt", "r"); 
        while (!feof($myfile)) {
            $line = fgets($myfile); 
            $line = explode(':', $line); 
            $user = rtrim($line[0]); 
            array_push($userArray, $user); 
        }
        fclose($myfile); 
        if(in_array($username, $userArray)) {
            echo "<script>window.alert('Username already exists. Create a new one.');</script>"; 
            regRedirect(); 
            return; 
        }
        else {
            $myfile = fopen('./passwd.txt', 'a'); 
            $str = "\n".$username.':'.$password; 
            fwrite($myfile, $str); 
            fclose($myfile); 
            setcookie('auth', 'true', time() + 120); 
            //need to write what happens here ; 
        }
    }
    
} 
?>
