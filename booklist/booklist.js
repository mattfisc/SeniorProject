

var booklist = [];


function searchforbook(){
    var text = getQueryString();
    
    // SEARCH WITH INPUT
    if(text != ""){
        var xml_str = "booklist/includes/searchBook.php?".concat(text);

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
        const book = new Book(res[i].id,res[i].title,res[i].author,res[i].isbn,res[i].location,res[i].picture,res[i].idUsers,res[i].description);
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
        img.id = "img";

   

        cell1.appendChild(img);
        // RIGHT CELL BOOK LIST ATTRIBUTES
        var rightstr = "<ul>".concat(
            "<li>Title:  ",booklist[i].title,"</li>",
            "<li>Author:  ",booklist[i].author,"</li>",
            "<li>Isbn:  ",booklist[i].isbn,"</li>",
            "<li>Location:  ",booklist[i].location,"</li>",
            );
        
        if(booklist[i].description == null)
            rightstr = rightstr.concat("<ul>");
        else
            rightstr = rightstr.concat("<li>Description:  ",booklist[i].description,"</li>",
            "</ul>");

        cell2.innerHTML = rightstr;
        
        // ADD MESSAGE BUTTON
        var btn = document.createElement("button");
        btn.innerHTML = "Details";
  
        //EVENT ON MESSAGE BUTTON
        btn.onclick = function(){
            localStorage["id"] = (booklist[i].id);
            localStorage["title"] = (booklist[i].title);
            localStorage["author"] = (booklist[i].author);
            localStorage["isbn"] = (booklist[i].isbn);
            localStorage["location"] = (booklist[i].location);
            localStorage["picture"] = (booklist[i].picture);
            localStorage["idUsers"] = (booklist[i].idUsers);
            localStorage["description"] = (booklist[i].description);

            popupCenter({url: 'booklist/oneBook.php', title: 'xtf', w: 900, h: 500});  
        }
        cell2.appendChild(btn);         
    }
}

const popupCenter = ({url, title, w, h}) => {
    // Fixes dual-screen position                             Most browsers      Firefox
    const dualScreenLeft = window.screenLeft !==  undefined ? window.screenLeft : window.screenX;
    const dualScreenTop = window.screenTop !==  undefined   ? window.screenTop  : window.screenY;

    const width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
    const height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

    const systemZoom = width / window.screen.availWidth;
    const left = (width - w) / 2 / systemZoom + dualScreenLeft
    const top = (height - h) / 2 / systemZoom + dualScreenTop
    const newWindow = window.open(url, title, 
      `
      scrollbars=yes,
      width=${w / systemZoom}, 
      height=${h / systemZoom}, 
      top=${top}, 
      left=${left}
      `
    )

    if (window.focus) newWindow.focus();
}

