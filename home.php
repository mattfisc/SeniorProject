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
  <!-- <link rel="stylesheet" href="style.css"> -->
  <!-- <script src="home.js"></script> -->
  <script src="booklist/book.js"></script>
  <script src="booklist/booklist.js"></script>

</head>
<body  id="mainbody" style="background-color: #6b6b6b;">
  <div class='page'>

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

                          <li class='nav-item ml-5'>
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
    <div class="container" style="padding-top: 75px;">

      <div class="row">
        <h2 class="text-center font-weight-bold text-light m-auto" style="text-shadow: 2px 2px black">Book List</h2>
      </div>
      
      <div class="row">
        <div class="col-m-4" id="sticky-sidebar">
    
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
        <div class="col-m-8" >
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
  
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

</body>
</html>