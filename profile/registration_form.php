<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Textbook Swap</title>
    <link rel="stylesheet" href="style.css">
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
                        <img src="../img/menu.png" width="30" height="30" class="d-inline-block align-top" alt=""></a>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item"><a class="nav-link js-scroll-trigger " href="../home.html">Home</a></li>
                            <li class="nav-item"><a class="nav-link js-scroll-trigger " href="login_form.php">Login</a></li>
                            <li class="nav-item"><a class="nav-link js-scroll-trigger disabled"  tabindex="-1" aria-disabled="true" href="registration_form.php">Register</a></li>
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../about.html">About</a></li>
                        </ul>
                    </div>
                    <div><a href="profile/profile.html"><img src="../img/user.png" width="30" height="30" class="d-inline-block align-top" alt=""></a></div>
                </div>
            </nav>

        </div>


        <div class="content">
            
            <div class="row p-1" id="m">
                <?php
                    echo "hello";
                    // //$fullUrl = "http://$SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                    // $url = "http://localhost:$_SERVER[REQUEST_URI]";

                    // $index =strpos($url, "message");
                    // $substr = substr($url,$index);
                    // echo $substr;

                    // // Message exists
                    // if(strcmp($substr,$url) != 0){
                    //     // LOGIN IN SUCCESS
                    //     if(strcmp($substr, "message=created") == 0){
                    //         echo "<div id=messageImg></div>";
                    //         echo "<p class='message'>Created Member Record!<p>";

                    //     }
                    //     // LOGIN FAILED
                    //     else if(strcmp($substr, "message=fail") == 0){
                    //         echo "<div id=errorImg></div>";
                    //         echo "<p class='error'>Failed to login. Try to register first.<p>";
                        
                    //     }
                    //     // LOGIN FAILED
                    //     else if(strcmp($substr, "message=error") == 0){
                    //         echo "<div id=errorImg>
                    //         <p class='error'>Failed to login. Email or Password is incorrect!.<p></div>";

                    //     }
                    //     else{
                    //         echo"nothing";
                    //     }
                    // }
                    // // LOADING PAGE DEFAULT
                    // else{
                    //     echo "<p>Register here!<p>";
                    // }
                ?>
            </div>

            <!--FORM-->
            <div class="row pt-5 border-top" >

                <div class="row pt-3" id="registration">  
                <!--REGISTRATION-->
                    <div class="col-4 m-auto ">
                        <h2>Register</h2>
                        <form action="registration.php" method="post">
                            <input type="text" id="name" name="name" placeholder="Profile name" required>
                            <input type="text" id="email" name="email" placeholder="Email Address" required>
                            <input type="password" id="password" name="pwd" placeholder="Password:" required>
                            <br><!--SUBMIT BUTTON-->
                            <input class="button" type="submit" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
        </div><!--END OF CONTENT-->
        <!--footer-->
        <div class='footer'>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>


</body>
</html>