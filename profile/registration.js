function register(){
    
    // INPUT IS VALIDATED
    if(validate_name() == true && validate_email() == true && validate_password() == true){
        var name
  
        var text = "name=".concat(document.getElementById("name").value);
        text = text.concat("&email=",document.getElementById("email").value);
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
        xhr.open("POST","registration.php"); 
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhr.send(text);
    }
    // INPUT ERROR
    else
        console.log("error");

}

function validate_name(){
    // LETTERS AND NUMBERS ONLY
    var name = document.getElementById("name").value;
    var letters = /^[0-9a-zA-Z]+$/;

    if(name.match(letters))
        return true;
    else{
        window.alert('Profile name error, Please input alphanumeric characters only');
        return false;
    }
    
        
    
}

function validate_email(){
    // VALIDATE EMAIL????
    var email = document.getElementById("email").value;
    var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

    if(email.match(mailformat))
        return true;
    else{
        window.alert("You have entered an invalid email address!");
        return false;
    }
}

function validate_password(){
    // VALIDATE PASSWORD
    var password = document.getElementById("password").value;
    var passformat = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/gm;

    if(password.match(passformat))
        return true;
    else{
        window.alert("Weak Password. Try again!");
        return false;
    }


}