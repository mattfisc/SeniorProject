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
<body class= " p-5" id="mainbody" style="background-color: #6b6b6b;">
    <div class='page'>
        <!--heading-->
        <?php
            require "../includes/header.php"
        ?>

        <div class="content">
            
            
            <!--FORM-->
            <div class="row pt-5 border-top" >

                <div class="col-xs-12 col-sm-12 col-md-4 col-xl-4 wrapper-main" id="registration">  
                <!--REGISTRATION-->
                    <div class="m-auto col-2">
                        <h1 class="text-center font-weight-bold text-light  p-1" style="text-shadow: 2px 2px black">Register</h1>
                        <?php
                        
                        // ERROR MESSAGE
                        if(isset($_GET['error'])){
                            if($_GET['error'] == "emptyfields")
                                echo "<p class='signuperror'>Error empty field found. Please fill out all fields.</p>";
                            else if($_GET['error'] == "invalidemailuid")
                                echo "<p class='signuperror'>Error invalid email or username.</p>";
                            else if($_GET['error'] == "invalidemail"){
                                echo "<p class='signuperror'>Error email already taken.</p>";
                            }
                            else if($_GET['error'] == "invalidUserId")
                                echo "<p class='signuperror'>Error username already taken.</p>";
                            else if($_GET['error'] == "passwordcheck")
                                echo "<p class='signuperror'>Error repeat password not equal.</p>";    

                        }
                        

                        ?>
                        <form action="../includes/signup.inc.php" method="post">
                            <input type="text" id="name" name="name" placeholder="Profile name" required>
                            <input type="text" id="email" name="email" placeholder="Email Address" required>
                            <input type="password" id="password1" name="password1" placeholder="Password:" required>
                            <input type="password" id="password2" name="password2" placeholder="Repeat password:" required>
                            <br><!--SUBMIT BUTTON-->
                            <button type="submit" name="signup-submit">Signup</button>
                        </form>
                    </div>
                </div>

                <!--Requirements-->
                <div class="col-xs-12 col-sm-12 col-md-12 col-xl-8">
                    <h1 class="text-center font-weight-bold text-light  p-1" style="text-shadow: 2px 2px black">Requirements</h1>
                    <div >
                        <div class="row">
                            <h3 class="col-xs-12 col-sm-8 col-md-4 col-xl-4">Profile Name</h3>
                            <ul class="col-xs-12 col-sm-8 col-md-4 col-xl-4">
                                <li>Letters and Numbers only</li>
                                <li>No Spaces</li>
                            </ul>
                        </div>
                        
                        <div class="row">
                            <h3 class="col-xs-12 col-sm-8 col-md-4 col-xl-4">Password:</h3>
                            <ul class="col-xs-12 col-sm-8 col-md-4 col-xl-4">
                                <li>Password length must be greater than 8</li>
                                <li>Must have at least one Uppercase Letter</li>
                                <li>Must have at least one Lowercase Letter</li>
                                <li>Must have at least one Symbol</li>
                                <li>Must have at least one Number</li>
        
                                <li>Can not have more than two of the same character in a row</li>
                                <li>Can not have a space</li>
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