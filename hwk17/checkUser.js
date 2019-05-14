var xhr;
if (window.ActiveXObject){
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
else if (window.XMLHttpRequest){
    xhr = new XMLHttpRequest();
}

function callServer(){
    // create username
    var username = document.getElementById("username").value;
    
    // only make the server call if there is data 
    if ((username == null) || (username == "")) return; 
    
    // build URL to connect to
    var url = "/cs329e-mitra/vaa546/hwk17/dataExtract.php?username=" +escape(username);
    
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
        if (response == "taken"){
            window.alert("Username taken. Please enter a different one.");
        }
    }
}
