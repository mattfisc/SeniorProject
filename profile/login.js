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
                document.getElementById("message").innerHTML = this.responseText;
            }
    }
    xhr.open("POST","login.php"); 
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.send(text);


}