
// SEARCH WORD IN QUERY 
// INPUT VALIDATED BY REGULAR EXPRESSION

function searchforbook(){
    var text = '';
    var state = 1;// ERROR STATE

    // GET TITLE AND VALIDATE
    if(document.getElementById("title_input").value.length != ""){
        var word = document.getElementById("title_input").value.toLowerCase();
        if(!/[^a-z ]/.test(word))// ERROR TITLE... LETTERS ONLY
            text += 'title='.concat(word);
        else
            state = -1;
    }


    // GET AUTHOR AND VALIDATE
    if(document.getElementById("author_input").value != ""){
        var word = document.getElementById("author_input").value.toLowerCase();
        if(!/[^a-z ]/.test(word))// ERROR AUTHOR.. LETTERS ONLY
            text += '&author='.concat(word);
        else
            state = -2;
    }
    

    // GET ISBN AND VALIDATE
    if(document.getElementById("isbn_input").value.length != ""){
        var word = document.getElementById("isbn_input").value;
        if(!/[^0-9]/.test(word))// ERROR ISBN...NUMBERS ONLY
            text += '&isbn='.concat(word);
        else
            state = -3;
    }
 

    // GET LOCATION AND VALIDATE
    if(document.getElementById("location_input").value.length != ""){
        var word = document.getElementById("location_input").value.toLowerCase();
        if(!/[^a-z ]/.test(word))// ERRORS LOCATION.. LETTERS ONLY
            text += '&location='.concat(word);
        else
            state = -4;
    }

    
    // OUTPUTS DISPLAYED
    errorOuput(state);
    
    // SEARCH WITH INPUT
    if(text != ""){
        var xml_str = "booklist.php?".concat(text);

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = createList;
        xhr.open("GET",xml_str, true); 
        xhr.send();
    }
    

}

// DISPLAY ERROR
function errorOuput(state){
    // ERROR
    switch(state){
        case -1:
            window.alert("ERROR Title... no numbers or symbols allowed");
            break;
        case -2:
            window.alert("ERROR Author name... no numbers or symbols allowed");
            break;
        case -3:
            window.alert("ERROR ISBN... numbers ONLY.  Do not include: dashes, spaces, or any symbols");
            break;
        case -4:
            window.alert("ERROR University name... no numbers or symbols allowed");
            break;
        default:
            // NO ERROR
    }
}


// CREATING BOOK LIST
function createList(){
    // IF NO ERRORS
    if(this.readyState == 4 && this.status == 200){
        // ARRAY
        var json = this.responseText;
    
        document.getElementById("my-table").innerHTML = json;

        // // ADD ROW
        // "<tr>"+
        //     "<th>"+ 
        //     // BOOK IMAGE
        //         "Picture: " + json[picture_loc] +
        //     "</th>"+

        //     "<th>"+
        //     // BOOK DETAILS
        //         "<ul>" + 3
                
        //             "<li>" + "Title: " + json[title] + "</li>"+
        //             "<li>" + "Author: " + json[author] + "</li>"+
        //             "<li>" + "IBSN: " + json[isbn] + "</li>"+
                    
        //             "<li>" + "Owner: " + json[location] + "</li>"+
        //         "</ul>"+
        //     "</th>"+
        // "</tr>";

    }
   
}



