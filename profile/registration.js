function register(){
    var profile_name = validate_name();
    var email = validate_email();
    var password = validate_password();

  // XML REQUEST JSON TO ADD BOOK TO TABLE
  var xml_str = "registration.php?".concat(text);

  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
      // NO ERRORS
        if(this.readyState == 4 && this.status == 200){
            // GET ELEMENT
            // DISPLAY MESSAGE
            var result_str = this.responseText;
            console.log(result_str);
        }
   }
}

function validate_name(){
    // LETTERS AND NUMBERS ONLY
    var name = document.getElementById("name").value;
}

function validate_email(){
    // VALIDATE EMAIL????
}

function validate_password(){
    // VALIDATE PASSWORD
}