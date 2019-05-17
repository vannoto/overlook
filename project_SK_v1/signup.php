<?php 
session_start(); 
$_SESSION["userid"] = null;
include $_SERVER['DOCUMENT_ROOT'].'overlook.html';

    extract($_POST); 
    $userName = trim($_POST['username']); 

    $name = strip_tags($userName); 

    $_SESSION["userid"] = $name;

    $password = (trim($_POST['password'])); 
    $repeat = trim($_POST['repeat']); 

    $uNames = array(); 
    $pNames = array(); 

    $myfile = fopen('passwd.txt', 'r') or die('Unable to open file'); 
    
    while(!feof($myfile)) {
    $line = fgets($myfile); 
    $str = explode(":", $line); 
    array_push($uNames, trim($str[0])); 
    array_push($pNames, trim($str[1])); 
}
fclose($myfile); 

$myfile = fopen('./passwd.txt', 'a') or die('Unable to open file'); 

if ((((((((strlen($userName) < 6) or (strlen($userName)) > 10) or ((strlen($password)) < 6)) or ((strlen($password)) > 10)) or (preg_match("/\W/", $userName) != null)) or ($password !== $repeat)) or (preg_match("/\W/", $password) != null)) or (preg_match("/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]/", $password) == null)) 
{
     
    $conditional = 'false'; 
    //print(strlen($userName).strlen($password).$conditional);
}
else {
    $conditional = 'true';
    //print(strlen($userName).strlen($password).$conditional);
}


if (!(in_array(trim($userName), $uNames)) and $userName!="" and $password!="" and $conditional == 'true'){
    //fwrite($myfile, 'should append to file'); 
    //$password = md5($password); 
    $password = crypt($password); 
    fwrite($myfile, "\n$userName:$password"); 
    fclose($myfile); 
    setcookie('auth', 'true', time() + 60 * 30); 
    regSaved($name); 
}

else {
    print($conditional); 
    print($userName); 
    print($password); 
    //regNotSaved(); 
}
    
function regSaved($name) {
    print<<<SAVED
    <html>
    <head>
        <style>
                // Color Schemes 
                  //  #ea5c5c; #f4898e; #fede55; #e8bf42
                

                html {
                    max-height: 100%; 
                    max-width: 100%; 
                }

                body {
                    background: #fede55;
                }

                h1 {
                    text-align: center;
                    font-family: sans-serif;
                    font-size: 30px;
                    text-decoration: underline;
                    text-decoration-color: #ea5c5c;
                    color: black;
                    padding-bottom: 10px;
                }

                p {
                    font-family: sans-serif;
                    color: #262730;
                    letter-spacing: 1px;
                    font-size: small;
                }

                a {
                    font-family: sans-serif;
                    color: #262730;
                    letter-spacing: 1px;
                    font-size: small;
                }

                a:hover {
                    color: gray;
                    text-decoration: none;
                }

                form {
                    background: whitesmoke;
                    border: none;
                    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.10), 0 6px 20px 0 rgba(0, 0, 0, 0.10);
                    border-radius: 20px;
                    width: 500px;
                    display: block;
                    margin-left: auto;
                    margin-right: auto;
                    margin-top: 50px;
                    margin-bottom: 50px;
                }

                label {
                    font-family: sans-serif;
                    color: #262730;
                }

                input[type="text"], input[type="password"] {
                    width: 400px;
                    background-color: whitesmoke;
                    height: 50px;
                    font-size: 12pt;
                    border: none;
                    border-bottom: 1px solid darkgray;
                }

                input:focus, input:active {
                    outline: none;
                }

                table {
                    padding-top: 20px;
                    padding-left: 50px;
                    padding-right: 50px;
                }

                td {
                    padding-top: 10px;
                    padding-bottom: 20px;
                }

                td.buttons {
                    padding-left: 30px;
                }

                input[type="submit"], input[type="reset"]{
                    width: 150px;
                    height: 50px;
                    background-color: #f4898e;
                    font-size: 10pt;
                    color: white;
                    letter-spacing: 2px;
                    border: none;
                    border-radius: 20px;
                    cursor: pointer;
                    margin-top: 20px;
                    margin-left: 10px;
                    margin-right: 10px;
                }

                input[type="submit"]:hover, input[type="reset"]:hover{
                    background-color: #ea5c5c;
                }

                .redirect {
                    text-align: center;
                    padding-bottom: 40px;
                }

                span {
                    //display: block;
                    text-align: center;
                }
            
        </style>    
    </head>
    <body>
    <form>
    <h1> Registeration Successful </h1>
    <h1> <a href = "./favorites.php">Click here if not automatically redirected</a> </h1>
    </form>
    </body>
    </html>
SAVED;
    redirect(); 
}

function regNotSaved() {
    print<<<NOTSAVED
    <html>
    <head> 
        <style>
            // Color Schemes 
              //  #ea5c5c; #f4898e; #fede55; #e8bf42
            

            html {
                max-height: 100%; 
                max-width: 100%; 
            }

            body {
                background: #fede55;
            }

            h1 {
                text-align: center;
                font-family: sans-serif;
                font-size: 30px;
                text-decoration: underline;
                text-decoration-color: #ea5c5c;
                color: black;
                padding-bottom: 10px;
            }

            p {
                font-family: sans-serif;
                color: #262730;
                letter-spacing: 1px;
                font-size: small;
            }

            a {
                font-family: sans-serif;
                color: #262730;
                letter-spacing: 1px;
                font-size: small;
            }

            a:hover {
                color: gray;
                text-decoration: none;
            }

            form {
                background: whitesmoke;
                border: none;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.10), 0 6px 20px 0 rgba(0, 0, 0, 0.10);
                border-radius: 20px;
                width: 500px;
                display: block;
                margin-left: auto;
                margin-right: auto;
                margin-top: 50px;
                margin-bottom: 50px;
            }

            label {
                font-family: sans-serif;
                color: #262730;
            }

            input[type="text"], input[type="password"] {
                width: 400px;
                background-color: whitesmoke;
                height: 50px;
                font-size: 12pt;
                border: none;
                border-bottom: 1px solid darkgray;
            }

            input:focus, input:active {
                outline: none;
            }

            table {
                padding-top: 20px;
                padding-left: 50px;
                padding-right: 50px;
            }

            td {
                padding-top: 10px;
                padding-bottom: 20px;
            }

            td.buttons {
                padding-left: 30px;
            }

            input[type="submit"], input[type="reset"]{
                width: 150px;
                height: 50px;
                background-color: #f4898e;
                font-size: 10pt;
                color: white;
                letter-spacing: 2px;
                border: none;
                border-radius: 20px;
                cursor: pointer;
                margin-top: 20px;
                margin-left: 10px;
                margin-right: 10px;
            }

            input[type="submit"]:hover, input[type="reset"]:hover{
                background-color: #ea5c5c;
            }

            .redirect {
                text-align: center;
                padding-bottom: 40px;
            }

            span {
                //display: block;
                text-align: center;
            }
            
        </style>
    </head>
    <body> <form>
    <h1> Invalid Sign Up Attempt. </h1>
    <h1> <a href = "./signup.html">Re-register</a> </h1> </form>
    </body>
    </html>
NOTSAVED;
   //  $_SESSION["userid"] = $userName;
    //print($userName); 
    //print($_SESSION['userid']); 
    //echo 'session variable should have echoed'; 
}

function redirect () {
    header('Location: favorites.php');
    exit;
}
?>