function validate (){
    var elt = document.getElementById("textForm");  
    
    // check for blank fields before submission  
    if (elt.userName.value == ""){
      window.alert ("Please enter a username.");
    }
      
    if (elt.password.value == ""){
      window.alert ("Please enter a password.");
    }
  }

function SHA256(s){

    var characters  = 8;
    var hexcase = 0;

    function crypt_add (x, y) {
        var i = (x & 0xFFFF) + (y & 0xFFFF);
        var j = (x >> 16) + (y >> 16) + (i >> 16);
        return (j << 16) | (i & 0xFFFF);

    }
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
