document.getElementById("textForm").onsubmit = validate;
  function validate (){
    var elt = document.getElementById("textForm");
    var alphaNum =  /^[a-zA-Z0-9]+$/;
    var passReq = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])/;
      
    // username validation checks  
    if (elt.userName.value == ""){
      window.alert("Invalid input. Enter username.");
      return (false);
    }
    if (elt.userName.value.length < 6 || elt.userName.value.length > 10){
      window.alert("Invalid input. The username must be between 6 and 10 characters long.");
      return (false);
    }
    if (!elt.userName.value.match(alphaNum)){
      window.alert("Invalid input. The username must contain only letters and digits.");
      return (false);
    }
    if (!isNaN(elt.userName.value[0])){
      window.alert("Invalid input. The username cannot begin with a digit.");
      return (false);
    }
     
    // password validation checks  
    if (elt.password.value == ""){
      window.alert("Invalid input. Enter password.");
      return (false);
    }
    if (elt.password.value !== elt.repeat.value){
      window.alert("Invalid input. Passwords do not match.");
      return (false);
    }
    if (elt.password.value.length < 6 || elt.password.value.length > 10){
      window.alert("Invalid input. The password must be between 6 and 10 characters long.");
      return (false);
    }
    if (!elt.password.value.match(alphaNum)){
      window.alert("Invalid input. The password must contain only letters and digits.");
      return (false);
    }
    if (!elt.password.value.match(passReq)){
      window.alert("Invalid input. The password must contain at least one digit, lowercase letter, and uppercase letter.");
      return (false);
    }
    
    window.alert("Passed validation.")
    return (true);
  }