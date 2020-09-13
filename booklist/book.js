class Book {
    /**
   * Class Book
   * Creates an object Book
   * 
   * 
   * @param title string is the title of the book
   * @param author string is the author of the book
   * @param isbn int is the isbn of a book
   * @param location string is the City or University location of the Book
   * @param picture string is the name of the picture
   */

    constructor(title, author,isbn,location,picture) {
    /**
     * Class Book
     * Creates an object Book
     * 
     * @param title string is the title of the book
     * @param author string is the author of the book
     * @param isbn int is the isbn of a book
     * @param location string is the City or University location of the Book
     * @param picture string is the name of the picture
     * @returns book object
     */
      this.title = title;
      this.author = author;
      this.isbn = isbn;
      this.location = location;
      this.picture = picture;
    }



}// END BOOK CLASS

function initializeBook(title, author,isbn,location,picture){
  return new Book(title, author,isbn,location,picture);
}


// ADD A BOOK
function addBook(title,author,isbn,location,picture){
  /**
   * addBook Function 
   * This function will take the parameters and add it to the database 'booklist'
   * 
   * 
   * @param title string is the title of the book
   * @param author string is the author of the book
   * @param isbn int is the isbn of a book
   * @param location string is the City or University location of the Book
   * @param picture string is the name of the picture
   * 
   * @param text string validates book attributes
   * @param xml_str string built query string for XMLHttpRequest request
   * @param xhr object XMLHttpRequest
   * @param result_str string text showing success or failure of adding book
   * 
   * @returns string of success or failure
   */
  var text = getQueryString();
  console.log(text);
  console.log(typeof text);
  // XML REQUEST JSON TO ADD BOOK TO TABLE
  var xml_str = "addBook.php?".concat(text);
  //var xml_str = "test.php?".concat(text);

  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
      // NO ERRORS
      if(this.readyState == 4 && this.status == 200){
          // CREATE ARRAY of BOOK OBJECT
          // fillBookList(this.responseText);
        var result_str = this.responseText;

      }
  }

  xhr.open("GET",xml_str, true); 
  xhr.send();

}

function deleteBook(Book){
  /**
   * deleteBook Function 
   * This function will take the parameters and delete a book from the database 'booklist'
   * 
   * 
   * @param Book object is a book
   * @returns string of success or failure
   */
    var book_id = Book.id;
    // XML REQUEST JSON DELETE BOOK

  }

  // DISPLAY ERROR
function searchError(state){
  /**
   * deleteBook Function 
   * This function will take the parameters and delete a book from the database 'booklist'
   * 
   * 
   * @param state int where 1 is no errors and all negative numbers displays types of errors 
   */
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

// SEARCH WORD IN QUERY 
// INPUT VALIDATED BY REGULAR EXPRESSION
function getQueryString(){
  /**
   * deleteBook Function 
   * This function will take the parameters and delete a book from the database 'booklist'
   * 
   * 
   * @param text string is the query string for the xmlhttp request
   * @param state int where 1 is no errors and all negative numbers displays types of errors
   * @param Book object is a book
   * @returns string json object string list of books from database 'booklist'
   */

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



  // ERROR DISPLAY
  searchError(state);

  //RETURN VALIDATED QUERY OR EMPTY
  if(state < 1)
    return "";
  else
    return text;


}