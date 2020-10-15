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
  <script src="booklist/book.js"></script>
  <script src="booklist/booklist.js"></script>
  <link rel="stylesheet" href="css/style.css">

</head>
<body  id="mainbody">
  <div class='page p-3'>

    <!--heading-->
    <div class='header'>
    
      <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark " id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">Book Swap</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <img src="img/menu.png" width="30" height="30" class="d-inline-block align-top" alt=""></a>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger disabled" tabindex="-1" aria-disabled="true" href="home.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="login_feature/login_form.php" >Login</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="signup_feature/signup_form.php">Register</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="about_feature/about.php">About</a></li>
                </ul>
            </div>

            <div>
              <ul class="navbar-nav ml-auto">
                <?php
                  if(isset($_SESSION['idUsers'])){
                      echo "<li class='nav-item'>
                              <a href='member_feature/member.php'>
                                  <img src='img/user.png' width='30' height='30' class='d-inline-block align-top'>".$_SESSION['userUid']."            
                              </a>
                          </li>

                          <li class='nav-item'>
                              <form action='includes/logout.inc.php' method='get'>
                                  <button name='logout-submit' type='submit'>Logout</button>
                              </form>
                          </li>
                      ";
                      
                  }
                  else{
                      echo "<li class='nav-item'>
                              <img src='img/user.png' width='30' height='30' class='d-inline-block align-top'>Guest
                          </li>";
                  }
                  ?>
              </ul>
            </div>
            
        </div>
      </nav>
    </div>

    <!--listing-->
    <div class="container" >

      <div class="row">
          <h2 class="text-center font-weight-bold text-light m-auto" style="text-shadow: 2px 2px black">Book List</h2>
      </div>
      
      <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-4 col-xl-4 " id="sticky-sidebar">
        <div class="row m-4">
          <!-- DISPLAY SUCCESS OR ERROR MESSAGES-->
         <div>
            <?php
              // SUCCESS MESSAGES
              if(isset($_GET['success'])){
                if( $_GET['success'] == 'sent' ){
                  echo "<p class='success'>Message sent successfully!</p>";
                }
              }
              // ERROR MESSAGES
              if(isset($_GET['error'])){
                if( $_GET['error'] == 'notloggedin' ){
                  echo "<p class='messageError '>Not Allowed. Register First!</p>";
                }
              }
            ?>
          </div>
        </div>
          <!--SEARCH BAR-->
          <div class="container" >
            
            <p class="text-center font-weight-bold text-light m-auto p-b-1" style="text-shadow: 2px 2px black">Searching filters</p>  
            <input class="form-control shadow-lg bg-white rounded" id="title_input" type="text" placeholder="Title..">
            <input class="form-control shadow-lg bg-white rounded" id="author_input" type="text" placeholder="Author..">
            <input class="form-control shadow-lg bg-white rounded" id="isbn_input" type="text" placeholder="ISBN..">
            <input class="form-control shadow-lg bg-white rounded" id="location_input" type="text" placeholder="University..">

            <button onclick="searchforbook()" type="submit">Submit</button>
            <br><br><br>
           
            
            
          </div>
      
        </div><!--END OF SEARCH-->

        <!--BOOK LISTING-->
        <div class="col-xs-12 col-sm-12 col-md-8 col-xl-8" >
         
          
          <table id="booklist" class="table table-bordered table-striped bg-light">
            
          </table>

          
        </div>
      </div><!--Row End-->

    </div><!--end of container middle-->
    
    <!--FOOTER-->
    <?php
      require "includes/footer.php";
    ?>
  </div>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
  <!-- Third party plugin JS-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
  
</body>
</html>