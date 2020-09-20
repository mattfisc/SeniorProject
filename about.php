<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Textbook Swap</title>
    <!-- <link rel="stylesheet" href="booklist.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body id="mainbody" style="background-color: #6b6b6b;">
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
                            <li class="nav-item"><a class="nav-link js-scroll-trigger " href="home.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="profile/login_form.php">Login</a></li>
                            <li class="nav-item"><a class="nav-link js-scroll-trigger " href="profile/registration_form.php">Register</a></li>
                            <li class="nav-item"><a class="nav-link js-scroll-trigger disabled" href="about.php" tabindex="-1" aria-disabled="true">About</a></li>
                        </ul>
                    </div>
                    <div>
                        <a href="profile/member_only.php"><img src="img/user.png" width="30" height="30" class="d-inline-block align-top " alt="">
                            <?php
                            session_start();
                            echo "Hello ";
                            echo $_SESSION["profile_name"];
                            ?>
                        </a>
                    </div>
                </div>
            </nav>

        </div>

        <!--FORM-->
            <div class="content border-top m-auto pt-5" >

              <div class="col-4 m-auto">
                <div class="row">
                    <h2 class="text-center font-weight-bold text-light" style="text-shadow: 2px 2px black">Book List</h2>
                </div>
                <p>This website was created for the ease of trading books inside of Universties.  
                      Books are being re-used every semester.  Would you like to get in contact with 
                      people that just got out of the class and trade or buy there book.</p>
              </div>

            </div><!--END OF CONTENT-->
        
        <!--footer-->
        <div class='footer'>

        </div>
    </div>
    <script src="booklist.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>


</body>
</html>