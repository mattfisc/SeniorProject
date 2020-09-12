class Book {
    
    constructor(title, author,isbn,location,picture) {
      this.title = title;
      this.author = author;
      this.isbn = isbn;
      this.location = location;
      this.picture = picture;
    }

    

    addBook(title,author,isbn,location,picture){
        // XML REQUEST JSON TO ADD BOOK TO TABLE
        
        // ADD BOOK TO PROFILE FAVORITES

    }

    deleteBook(Book){
        // XML REQUEST JSON DELETE BOOK

    }

  }// END BOOK CLASS

  function initializeBook(title, author,isbn,location,picture){
    return new Book(title, author,isbn,location,picture);
  }