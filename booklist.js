
// SEARCH WORD IN QUERY 
function searchforbook(){
    var input = document.getElementById("findBook").value;

    var xhr = new XMLHttpRequest();
    xhr.onload = createList;
    xhr.open("GET", "booklist.php?q=" + input, true); 
    xhr.send();

}


// CREATING BOOK LIST
function createList(){

    // ARRAY
    var json = this.responseText;
    document.getElementById("booklisting").innerHTML = "<li>" + json + "</li>";
}



$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
