var your_booklist = [];


function requestYourAds(){
    var xml_str = "requestYourAds.php";
    
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        // NO ERRORS
        if(this.readyState == 4 && this.status == 200){
            // CREATE ARRAY of BOOK OBJECT
            var str = this.responseText;
            console.log(str);
            console.log(typeof str);
            //fillBookList(this.responseText);
        }
    }

    xhr.open("GET",xml_str, true); 
    xhr.send();
    
}

function emptyList(){
    // EMPTY OBJECT LIST
    booklist = new Array();

    // EMPTY TABLE IN HTML
    var table = document.getElementById("display");
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
        const book = new Book(res[i].title,res[i].author,res[i].isbn,res[i].location,res[i].picture);
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
        var rightstr = 
            "<ul>".concat(
                "<li>Title:  ",booklist[i].title,"</li>",
                "<li>Author:  ",booklist[i].author,"</li>",
                "<li>Isbn:  ",booklist[i].isbn,"</li>",
                "<li>Location:  ",booklist[i].location,"</li>",
            "</ul>");
        
        cell2.innerHTML = rightstr;
        
    }
}