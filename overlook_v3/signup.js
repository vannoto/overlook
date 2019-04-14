document.getElementById("textForm").onsubmit = validate;
  function validate ()
  {
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
    //condition 3: The user name cannot begin with a digit
    if (elt.username.value.match(/^[^0-9]/) == null) {
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
      
    window.alert ("Passed Validation"); 
    return true;
  }
