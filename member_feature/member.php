<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Textbook Swap</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>


<body id="mainbody" style="background-color: #6b6b6b;">
  <div class='page'>

    <!--HEADER AND NAV BAR-->
    <?php
        require "../includes/header.php";
    ?>

   
    <!--FORM-->
    <div class="content p-5 border-top m-auto">
      <div class="row">
        <h2 class="text-center font-weight-bold text-light" style="text-shadow: 2px 2px black">Book List</h2>
      </div>
      <div id="addbook">
        <h2>Add Books</h2>
        <button><a href="../booklist/form_add_book.php">Add Book</a></button>
      </div>
      <div id="message">
        <h2>Messages Here</h2>
      </div>
      <div id="edit">
        <h2>Edit Profile</h2>
      </div>
      <div id="myAds">
        <h2>My Ads</h2>
      </div>
      <div id="logout">
        <h2>Log out</h2>
        <form action="" method="post">
          <button type="submit" name="logout-submit">Logout</button>
        </form>
      </div>
    </div>



    <!-- MEMBER ONLY -->
    <?php
      if(isset($_SESSION['userId'])){

      }

    ?>
    <!--END OF CONTENT-->
      

      <!--FOOTER-->
      <?php
        //require "../includes/footer.php";
    ?>
  </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>


</body>
</html>