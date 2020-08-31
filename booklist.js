function startsearch(){
    var input = document.getElementById("searchvalue").value;
    document.alert(input);
}

function searchforbook(){
    var input = document.getElementById("searchvalue").value;
    document.write(input);
    
    // var xhr = new XMLHttpRequest();
    // xhr.onload = createList;
    // xhr.open("GET", "booklist.php?q=" + input, true); 
    // xhr.send();

}