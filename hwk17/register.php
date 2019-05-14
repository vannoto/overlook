<?php

extract ($_POST);

$username = $_POST["username"];
$password = $_POST["password"];

if (!checkUser($username, $password)){
    print <<<INVALID_USER
    <html>
    <head>
    <title> Invalid Username </title>
    </head>
    <body>
    <p>Username already taken. Please use a different one.</p>
    <a href="./signup.html">Try again.</a>
    </div>
    </body>
    </html>
INVALID_USER;
}
else {
    // store into flat file
    if ($fh = fopen ("passwd.txt", "a")){
      if (checkUser($username, $password)){
        $crypt_password = crypt($password);
        fwrite ($fh, "$username" . ":" . "$crypt_password\n");
      }
    fclose ($fh);
    }

    print <<<REGISTRATION_SUCCESS
    <html>
    <head>
    <title> Registration Success </title>
    </head>
    <body>
    <p>Registration Successful<p>
    </body>
    </html>
REGISTRATION_SUCCESS;
}

function checkUser($username, $password){
	
    if (empty($username) || empty($password)){
       return(false);
    }

    // read file for valid usernames
    $myfile = fopen("passwd.txt", "r") or die ("Unable to open file.");
    while (!feof($myfile)){
      $line = fgets($myfile);
      $line_contents = explode(":", $line);
      if ($line_contents[0] == $username){
        return (false);
      }
    }
    fclose($myfile);
    return (true);
}

?>
