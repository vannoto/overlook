function validate (){
    var elt = document.getElementById("textForm");
      
    if (elt.userName.value == "")
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
    if (elt.userName.value.length < 6 | elt.userName.value.length > 10) {
        window.alert("Invalid Input: username must be between 6 and 10 characters long"); 
        return false; 
    }
    //condition 2: The user name must contain only letters and digits
    if (elt.userName.value.match(/\W/) != null) {
        window.alert ("Invalid Input: username must contain only letters and digits."); 
        console.log(elt.userName.value.match(/[^a-zA-Z0-9_]/)); 
        return false; 
    }
    //condition 3: The user name cannot begin with a digit
    if (elt.userName.value.match(/^[^0-9]/) == null) {
        window.alert ("Invalid Input: username cannot begin with a digit."); 
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
      
    return true;
  }

function checkUserBlank (){
    var elt = document.getElementById("textForm");  
    
    if (elt.userName.value == ""){
      elt.userName.style.borderBottomColor = "red";
      elt.userName.style.backgroundColor = "#ffc1c1";
      elt.userName.placeholder = "You must enter a username.";
    }
    else {
      elt.userName.style.backgroundColor = "whitesmoke";
      elt.userName.style.borderBottomColor = "darkgray";
      elt.userName.placeholder = "Enter a username...";
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

