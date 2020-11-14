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

  <!-- <script src="home.js"></script> -->
  <script src="../booklist/book.js"></script>
  <script src="../booklist/booklist.js"></script>
  <link rel="stylesheet" href="../css/style.css">

</head>
<body  id="mainbody">
  <div class='page' id='page-top'>

    <!--heading-->
    <?php
      require "../includes/header.php"
    ?>

    <!--listing-->
    <div class="container" >

      <div class="row">
          <h2 class="text-center font-weight-bold text-light m-auto" style="text-shadow: 2px 2px black">Book List</h2>
      </div>
      
      <div class="row m-auto">
        <div class="col-xs-12 col-sm-12 col-md-4 col-xl-4 " id="registration">
          <div class="row ">
            <!-- DISPLAY SUCCESS OR ERROR MESSAGES-->
            <?php
              // SUCCESS MESSAGES
              if(isset($_GET['success'])){
                if( $_GET['success'] == 'sent' ){
                  echo "<p class='alert alert-success'>Message sent successfully!</p>";
                }
                else if( $_GET['success'] == 'logout' ){
                  echo "<p class='alert alert-success'>Logged out!</p>";
                }

              }
              // ERROR MESSAGES
              if(isset($_GET['error'])){
                if( $_GET['error'] == 'notloggedin' ){
                  echo "<p class='alert alert-danger '>Not Allowed. Register First!</p>";
                }
                else if( $_GET['error'] == 'yourbook' ){
                  echo "<p class='alert alert-danger '>That is your book!</p>";
                  echo "<p class='alert alert-danger '>You are messaging yourself!</p>";
                }
              }
            ?>
          </div>
        <!--SEARCH BAR-->
        <div class="row" >
          
          <p class="text-center font-weight-bold text-light m-auto " style="text-shadow: 2px 2px black">Searching filters</p>  
          
            <input class="form-control shadow-lg bg-white rounded" id="title_input" type="text" placeholder="Title..">
            <input class="form-control shadow-lg bg-white rounded" id="author_input" type="text" placeholder="Author..">
            <input class="form-control shadow-lg bg-white rounded" id="isbn_input" type="text" placeholder="ISBN..">
            <input class="form-control shadow-lg bg-white rounded" id="location_input" type="text" placeholder="University..">
            <br>
            <button class="form-control shadow-lg bg-dark text-light rounded" onclick="searchforbook()" type="submit">Submit</button>
          
          
          <br><br>
          
        </div>
      
      </div><!--END OF SEARCH-->

        <!--BOOK LISTING-->
        <div class="col-xs-12 col-sm-12 col-md-8 col-xl-8 " >
         
          
          <table  id="booklist" class="table table-bordered table-striped bg-light thead-dark">
            
          </table>

          
        </div>
      </div><!--Row End-->

    </div><!--end of container middle-->
    
    <!--FOOTER-->
    <?php
      require "../includes/footer.php";
    ?>
  </div>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
  <!-- Third party plugin JS-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
  
</body>
</html>