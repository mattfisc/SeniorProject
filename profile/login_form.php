<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Textbook Swap</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="login.js"></script>

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
                        <img src="../img/menu.png" width="30" height="30" class="d-inline-block align-top" alt=""></a>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item"><a class="nav-link js-scroll-trigger " href="../home.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link js-scroll-trigger disabled"  tabindex="-1" aria-disabled="true" href="profile/login_form.php">Login</a></li>
                            <li class="nav-item"><a class="nav-link js-scroll-trigger " href="registration_form.php">Register</a></li>
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../about.php">About</a></li>
                        </ul>
                    </div>
                    <div>
                        <a href="member_only.php"><img src="../img/user.png" width="30" height="30" class="d-inline-block align-top" alt="">
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


        <div class="content p-5">
            
            

            <!--FORM-->
            <div class="row border-top" >

                <div class="row pt-3" id="login">
                    <div class="col-4 m-auto">
                        <h2 >Login</h2>
                        <div>
                            <input type="text" name="name" id="name" placeholder="Profile Name" required>
                            <input type="password" name="password" id="password" placeholder="Password" required>
                            <br><!--SUBMIT BUTTON -->
                            <input onclick="login()" class="button" type="submit" value="Login">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="message">
            
            </div>
                
        </div>
        <!--END OF CONTENT-->

        <!--FOOTER-->
        <div class='footer'>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>


</body>
</html>