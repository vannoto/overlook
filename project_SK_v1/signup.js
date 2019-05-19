var xhr;
if (window.ActiveXObject){
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
else if (window.XMLHttpRequest){
    xhr = new XMLHttpRequest();
}

function callServer(){
   // window.alert('inside call server fnc'); 
    var username = document.getElementById("username").value;
    
    // only make the server call if there is data 
    if ((username == null) || (username == "")) return; 
    
    // build URL to connect to
    var url = "/cs329e-mitra/kosu12/overlook/signupauth.php?username=" +escape(username);
    
    // create the name-value pairs that will be sent as data 
    var params = "Username=username";
    
    // Open a connection to the server
    xhr.open("POST", url, true);
    
    // create the proper headers to send with the request
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // setup a function for the server to run when it is done
    xhr.onreadystatechange = updatePage;

    // send the request 
    xhr.send(params); 
}

function updatePage(){
    // send window alert if username exists
    if ((xhr.readyState == 4) && (xhr.status == 200)){
        var response = xhr.responseText;
        //window.alert(response); 
        if (response == "taken"){
            window.alert("Username taken. Please enter a different one.");
        }
    }
    //else {
        //window.alert('state not ready'); 
    //}
}

function validate (){
    var elt = document.getElementById("textForm");
      
    if (elt.username.value == "")
    {
      window.alert ("Invalid Input: Enter name");
      return false;
    }
      
    if (elt.password.value == "")
    {
      window.alert ("Invalid Input: Enter password");
      return false;
    }
      
    if (elt.repeat.value == "")
    {
      window.alert ("Invalid Input: Enter repeat password");
      return false;
    }
      
    //condition 1: The user name must be between 6 and 10 characters long
    if (elt.username.value.length < 6 | elt.username.value.length > 10) {
        window.alert("Invalid Input: username must be between 6 and 10 characters long"); 
        return false; 
    }
    //condition 2: The user name must contain only letters and digits
    if (elt.username.value.match(/\W/) != null) {
        window.alert ("Invalid Input: username must contain only letters and digits."); 
        console.log(elt.username.value.match(/[^a-zA-Z0-9_]/)); 
        return false; 
    }
   
    //condition 4: The password and the repeat password must match
    if (elt.password.value !== elt.repeat.value) {
        window.alert ("Invalid Input: Password and Repeat Password must be an exact match."); 
        return false; 
    }
      
    //condition 5: The password must be between 6 and 10 characters
    if (elt.password.value.length < 6 | elt.password.value.length > 10) {
        window.alert("Invalid Input: Password must be between 6 and 10 characters long"); 
        return false; 
    }
      
    //condition 6: The password must contain only letters and digits
     if (elt.password.value.match(/\W/) != null) {
        window.alert ("Invalid Input: Password must contain only letters and digits."); 
        return false; 
    }
    
    //condition 7: The password must have at least one lower case letter, at least one upper case letter, and at least one digit
      if(elt.password.value.match(/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]/) == null) {
          window.alert("Invalid Input: Must have one lowercase, one uppercase, and one digit in password"); 
          return false; 
    }
      
    var sha256 = new jsSHA('SHA-256', 'TEXT');
    sha256.update(password); 
    var hash = sha256.getHash("HEX");
    return true;
  }

function checkUserBlank (){
    var elt = document.getElementById("textForm");  
    
    if (elt.username.value == ""){
      elt.username.style.borderBottomColor = "red";
      elt.username.style.backgroundColor = "#ffc1c1";
      elt.username.placeholder = "You must enter a username.";
    }
    else {
      elt.username.style.backgroundColor = "whitesmoke";
      elt.username.style.borderBottomColor = "darkgray";
      elt.username.placeholder = "Enter a username...";
    }
}

function checkPassBlank (){
    var elt = document.getElementById("textForm");
    
    if (elt.password.value == ""){
        elt.password.style.borderBottomColor = "red";
        elt.password.style.backgroundColor = "#ffc1c1";
        elt.password.placeholder = "You must enter a password."
    }
    else {
        elt.password.style.backgroundColor = "whitesmoke";
        elt.password.style.borderBottomColor = "darkgray";
        elt.password.placeholder = "Enter a password...";
    }
}

function checkRepeatBlank (){
    var elt = document.getElementById("textForm");
    
    if (elt.repeat.value == ""){
        elt.repeat.style.borderBottomColor = "red";
        elt.repeat.style.backgroundColor = "#ffc1c1";
        elt.repeat.placeholder = "You must repeat your password."
    }
    else {
        elt.repeat.style.backgroundColor = "whitesmoke";
        elt.repeat.style.borderBottomColor = "darkgray";
        elt.repeat.placeholder = "Repeat password...";
    }
} 
