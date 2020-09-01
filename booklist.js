function searchforbook(){
    var input = document.getElementById("findBook").value;

    var xhr = new XMLHttpRequest();
    xhr.onload = createList;
    xhr.open("GET", "booklist.php?q=" + input, true); 
    xhr.send();

}



function createList(){

    // ARRAY
    var json = this.responseText;
    document.getElementById("booklisting").innerHTML = "<li>" + json + "</li>";
}