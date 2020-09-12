

var booklist = new Array();


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
    searchError(state);
    
    // SEARCH WITH INPUT
    if(text != ""){
        var xml_str = "booklist/searchBook.php?".concat(text);
        //var xml_str = "test.php?".concat(text);

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            // NO ERRORS
            if(this.readyState == 4 && this.status == 200){
                // CREATE ARRAY of BOOK OBJECT
                fillBookList(this.responseText);
                
            }
        }

        xhr.open("GET",xml_str, true); 
        xhr.send();
    }
    

}

// DISPLAY ERROR
function searchError(state){
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





function fillBookList1(str){
    // EMPTY OLD TABLE
    emptyList();

    // PARSE STRING OF MULTIPLE JSON OBJECTS
    var res = JSON.parse('[' + str.replace(/}{/g, '},{') + ']');

    // GET ELEMENT
    var table = document.getElementById("booklist");

    // SEARCH JSONOBJECT ARRAY
    for (let i = 0; i < res.length; i++) {
        // CREATE TABLE ELEMENTS
        var row = table.insertRow(i);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);

        // SELECT JSON OBJECT
        const jsonObj = res[i];

        // LEFT IMAGE
        var leftstr = "";
        var img = document.createElement("img");
        
        // PICTURE FILE

        leftstr = "upload/".concat(jsonObj.picture);  
        img.src = leftstr; 
        cell1.appendChild(img);

        // BOOK LIST
        var rightstr = "<ul>".concat(
            "<li>Title:  ",jsonObj.title,"</li>",
            "<li>Author:  ",jsonObj.author,"</li>",
            "<li>Isbn:  ",jsonObj.isbn,"</li>",
            "<li>Location:  ",jsonObj.location,"</li>",
            "</ul>");
        
        cell2.innerHTML = rightstr;
    }
}

function emptyList(){
    // EMPTY OBJECT LIST
    booklist = new Array();

    // EMPTY TABLE IN HTML
    var table = document.getElementById("booklist");
    table.innerHTML = "";
}

function fillBookList(str){
    // EMPTY OLD SEARCH LIST
    emptyList();

    // PARSE STRING OF MULTIPLE JSON OBJECTS
    var res = JSON.parse('[' + str.replace(/}{/g, '},{') + ']');

    

    // SEARCH JSONOBJECT ARRAY
    for (let i = 0; i < res.length; i++) {
        // SELECT JSON OBJECT
        const jsonObj = res[i];

        // CREATE BOOK LIST
        const book = initializeBook(res[i].title,res[i].author,res[i].isbn,res[i].location,res[i].picture);
        booklist.push(book);
        
    }
    displayList();
}


function displayList(){
    // GET TABLE ELEMENT
    var table = document.getElementById("booklist");

    for(let i = 0; i < booklist.length; i++) {
        // CREATE TABLE ELEMENTS
        var row = table.insertRow(i);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);

        // LEFT CELL
        var leftstr = "";
        var img = document.createElement("img");
        
        // PICTURE FILE
        leftstr = "upload/".concat(booklist[i].picture);  
        img.src = leftstr; 
        cell1.appendChild(img);

        // RIGHT CELL BOOK LIST ATTRIBUTES
        var rightstr = "<ul>".concat(
            "<li>Title:  ",booklist[i].title,"</li>",
            "<li>Author:  ",booklist[i].author,"</li>",
            "<li>Isbn:  ",booklist[i].isbn,"</li>",
            "<li>Location:  ",booklist[i].location,"</li>",
            "</ul>");
        
        cell2.innerHTML = rightstr;
        
    }
}