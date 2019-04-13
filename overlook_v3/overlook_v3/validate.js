document.getElementById("validateForm").onsubmit = validate;
  function validate ()
  {
    var elt = document.getElementById("textForm");
      
    if (elt.userName.value == "")
    {
      window.alert ("Invalid Input: Enter name");
      return false;
    }
      
    if (elt.pass.value == "")
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
        window.alert("Invalid Input: userName must be between 6 and 10 characters long"); 
        return false; 
    }
    //condition 2: The user name must contain only letters and digits
    if (elt.userName.value.match(/\W/) != null) {
        window.alert ("Invalid Input: userName must contain only letters and digits."); 
        console.log(elt.userName.value.match(/[^a-zA-Z0-9_]/)); 
        return false; 
    }
    //condition 3: The user name cannot begin with a digit
    if (elt.userName.value.match(/^[^0-9]/) == null) {
        window.alert ("Invalid Input: userName cannot begin with a digit."); 
        return false; 
    }
      
    //condition 4: The password and the repeat password must match
    if (elt.pass.value !== elt.repeat.value) {
        window.alert ("Invalid Input: Password and Repeat Password must be an exact match."); 
        return false; 
    }
      
    //condition 5: The password must be between 6 and 10 characters
    if (elt.pass.value.length < 6 | elt.pass.value.length > 10) {
        window.alert("Invalid Input: Password must be between 6 and 10 characters long"); 
        return false; 
    }
      
    //condition 6: The password must contain only letters and digits
     if (elt.pass.value.match(/\W/) != null) {
        window.alert ("Invalid Input: Password must contain only letters and digits."); 
        return false; 
    }
    
    //condition 7: The password must have at least one lower case letter, at least one upper case letter, and at least one digit
      if(elt.pass.value.match(/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]/) == null) {
          window.alert("Invalid Input: Must have one lowercase, one uppercase, and one digit in password"); 
          return false; 
    }
      
    window.alert ("Passed Validation"); 
    return true;
  }
