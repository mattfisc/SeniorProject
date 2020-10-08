

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
        const book = new Book(res[i].id,res[i].title,res[i].author,res[i].isbn,res[i].location,res[i].picture,res[i].idUsers);
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
        
        // ADD DELETE BUTTON
        var btn = document.createElement("button");
        btn.innerHTML = "Message Owner";
  
        //EVENT ON DELETE BUTTON
        btn.onclick = function(){

            //  GET DIV ELEMENT
            var message_div = document.getElementById("message");

            // CREATE FORM
            var form = document.createElement("form");

            // TITLE
            var title =document.createElement('p');
            title.innerHTML = "Send Message to Book Owner";
            message_div.appendChild(title);

            message_div.appendChild(form);

            form.method = "POST";
            form.action = "message_feature/create_message.php";

            var message = document.createElement("input");  
            message.name = "message";
            form.appendChild(message);

            // SEND RECIEVER ID
            var r = document.createElement('input');
            r.type = 'hidden';
            r.setAttribute("name", "reciever");
            r.value = booklist[i].idUsers;
            form.appendChild(r);

             // SEND BOOK ID
             var bookId = document.createElement('input');
             bookId.type = 'hidden';
             bookId.setAttribute("name", "bookId");
             bookId.value = booklist[i].id;
             form.appendChild(bookId);

            var btnsubmit = document.createElement("button"); 
            btnsubmit.innerHTML = "submit message";
            btnsubmit.name = "submit-message";
            form.appendChild(btnsubmit);
            // form.submit();
            
          };
        
        // function(){
        //     var xhr = new XMLHttpRequest();
        //     xhr.onreadystatechange = function() {
        //         // NO ERRORS
        //         if(this.readyState == 4 && this.status == 200){
        //             // CREATE ARRAY of BOOK OBJECT
        //             var str = this.responseText;

        //             console.log(str);

        //         }
        //     }
        // var reciever = booklist[i].idUsers;
        // console.log(reciever);
 
        // var str = "message_feature/create_message.php?";
        // str = str.concat("reciever=",reciever);


        // xhr.open("GET",str, true); 
        // xhr.send();
        // };

        cell2.appendChild(btn);
    }
}