function login(){
    
    var text = "name=".concat(document.getElementById("name").value);
    text = text.concat("&password=",document.getElementById("password").value);
    
    // XML REQUEST TO ADD PROFILE TO TABLE
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        // NO ERRORS
            if(this.readyState == 4 && this.status == 200){
                // GET ELEMENT
                // DISPLAY MESSAGE
                login_results(this.responseText);
            }
    }
    xhr.open("POST","login.php"); 
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.send(text);


}

login_results(results_str){
    if(results_str == "failed"){
        window.alert("failed to login. try to register");
    }
    else{

    }

}