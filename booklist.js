
// SEARCH WORD IN QUERY 
// INPUT VALIDATED BY REGULAR EXPRESSION

function searchforbook(){ 
    var text = '';
    var state = 1;// ERROR STATE

    // TITLE CHECK
    if(!document.getElementById("title_input").value.length==0){
        var word = document.getElementById("title_input").value.toLowerCase();
        if(!/[^a-z ]/.test(word))// ERROR TITLE... LETTERS ONLY
            text += 'title=' + document.getElementById("title_input").value;
        else
            state = -1;
    }
    else
        text += 'title=empty';

    // AUTHOR CHECK
    if(!document.getElementById("author_input").value.length == 0){
        var word = document.getElementById("author_input").value.toLowerCase();
        if(!/[^a-z ]/.test(word))// ERROR AUTHOR.. LETTERS ONLY
            text += '&author=' + document.getElementById("author_input").value;
        else
            state = -2;
    }
    else
        text += 'author=empty';

    // ISBN CHECK
    if(!document.getElementById("isbn_input").value.length==0){
        var word = document.getElementById("isbn_input").value;
        if(!/[^0-9]/.test(word))// ERROR ISBN...NUMBERS ONLY
            text += '&isbn=' + document.getElementById("isbn_input").value;
        else
            state = -3;
    }
    else
        text += 'isbn=empty';

    // LOCATION CHECK
    if(!document.getElementById("location_input").value.length==0){
        var word = document.getElementById("location_input").value.toLowerCase();
        if(!/[^a-z ]/.test(word))// ERRORS LOCATION.. LETTERS ONLY
            text += '&location=' + document.getElementById("location_input").value;
        else
            state = -4;
    }
    else
        text += 'location=empty';
    
    // OUTPUTS DISPLAYED
    errorOuput(state);

    var xml_str = "booklist.php?".concat(text);

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = createList;
    xhr.open("GET",xml_str, true); 
    xhr.send();

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
        
        // seems to be a string?????????????????????
        window.alert(json);
        document.getElementById("my-table").innerHTML = "title: " + json;

        // // ADD ROW
        // "<tr>"+
        //     "<th>"+ 
        //     // BOOK IMAGE
        //     "</th>"+

        //     "<th>"+
        //     // BOOK DETAILS
        //         "<ul>" +
                
        //             "<li>" + "Title: " + json[title] + "</li>"+
        //             "<li>" + "Author: " + json[author] + "</li>"+
        //             "<li>" + "IBSN: " + json[isbn] + "</li>"+

        //             "<li>" + "Owner: " + json[owner_id] + "</li>"+
        //         "</ul>"+
        //     "</th>"+
        // "</tr>";

    }
    else{
        document.getElementById("my-table").innerHTML="Error retrieving xmlrequest";
    }
}



