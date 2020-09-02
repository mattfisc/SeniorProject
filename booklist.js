
// SEARCH WORD IN QUERY 
function searchforbook(){
    var input = document.getElementById("input").value;

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = createList;
    xhr.open("GET", "booklist.php?q=" + input, true); 
    xhr.send();

}


// CREATING BOOK LIST
function createList(){
    // IF NO ERRORS
    if(this.readyState == 4 && this.status == 200){
        // ARRAY
        var json = this.responseText;
        
        // seems to be a string?????????????????????

        document.getElementById("my-table").innerHTML = "title: " +json[0];

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



