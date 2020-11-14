<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Textbook Swap</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body id="mainbody">
    <div class='page'>
        <!--heading-->
        <?php
            require "../includes/header.php"
        ?>

        <div class="content">
            
            
            <!--FORM-->
            <div class="row m-auto" >

                <div class="col-xs-12 col-sm-12 col-md-4 col-xl-4" id="registration">  

                    <?php
                        
                        // ERROR MESSAGE
                        if(isset($_GET['error'])){
                            if($_GET['error'] == "emptyfields")
                                echo "<p class='alert alert-danger'>Error empty field found. Please fill out all fields.</p>";
                            else if($_GET['error'] == "invalidemailuid")
                                echo "<p class='alert alert-danger'>Error invalid email or username.</p>";
                            else if($_GET['error'] == "invalidemail")
                                echo "<p class='alert alert-danger'>Error email already taken or invalid email.</p>";
                            else if($_GET['error'] == "invalidUserId")
                                echo "<p class='alert alert-danger'>Error username already taken.</p>";
                            else if($_GET['error'] == "passwordcheck")
                                echo "<p class='alert alert-danger'>Error repeat password not equal.</p>";    
                            else if($_GET['error'] == "usersqlerror")
                                echo "<p class='alert alert-danger'>Error sql statement.</p>";    
                            else if($_GET['error'] == "passwordlength")
                                echo "<p class='alert alert-danger'>Error password length needs to be greater than 8 characters.</p>"; 
                            else if($_GET['error'] == "passwordrequirements"){
                                echo "<p class='alert alert-danger'>Error password requirements: 
                                    <ul>
                                        <li>1 uppercase</li> 
                                        <li>1 lowercase</li>
                                        <li>1 number</li>
                                        <li>1 symbol</li>
                                        <li>length 8 characters</li>
                                    </ul>
                                </p>" ;
                            }
                        }
                    ?>

                <!--REGISTRATION-->
                    <div >
                        <h1 class="text-center font-weight-bold text-light  p-1" style="text-shadow: 2px 2px black">Register</h1>
                        
                        <form action="../includes/signup.inc.php" method="post">
                            <input class="form-control shadow-lg bg-white rounded" type="text" id="name" name="name" placeholder="Profile name" required>
                            <input class="form-control shadow-lg bg-white rounded" type="text" id="email" name="email" placeholder="Email Address" required>
                            <input class="form-control shadow-lg bg-white rounded" type="password" id="password1" name="password1" placeholder="Password:" required>
                            <input class="form-control shadow-lg bg-white rounded" type="password" id="password2" name="password2" placeholder="Repeat password:" required>
                            <!--SUBMIT BUTTON-->
                            <br>
                            <button class="form-control shadow-lg bg-dark text-light rounded" type="submit" name="signup-submit">Signup</button>
                        </form>
                    </div>
                </div>

                <!--Requirements-->
                <div id="readable" class="col-xs-12 col-sm-12 col-md-8 col-xl-8">
                    <h1 class="text-center font-weight-bold text-light  p-1" style="text-shadow: 2px 2px black">Requirements</h1>
                    <div >
                        <div class="row">
                            <h3 class="text-center col-xs-12 col-sm-6 col-md-4 col-xl-4">Profile Name</h3>
                            <ul class="m-2 col-xs-12 col-sm-8 col-md-4 col-xl-4">
                                <li>Letters and Numbers only</li>
                                <li>No Spaces</li>
                            </ul>
                        </div>

                        <div class="row">
                            <h3 class="text-center col-xs-12 col-sm-6 col-md-4 col-xl-4">Password:</h3>
                            <ul class=" col-xs-12 col-sm-8 col-md-4 col-xl-4 ">
                                <li>Password length must be greater than 8</li>
                                <li>Must have at least one Uppercase Letter</li>
                                <li>Must have at least one Lowercase Letter</li>
                                <li>Must have at least one Symbol</li>
                                <li>Must have at least one Number</li>
                            </ul>
                        </div>
                    </div>
                </div>


            </div>

            <!--MESSAGE RETURNED-->
            <div class="row" >
                <div class="col-xs-12 col-sm-12 col-md-8 col-xl-8">
                    <div id="message" ></div>
                    
                </div>
            </div>
            <div>
                
            </div>

            

            

        </div><!--END OF CONTENT-->
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