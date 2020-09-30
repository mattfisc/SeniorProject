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
        <!--heading-->
        <?php
        require "../includes/header.php"
        ?>

        <div class="content m-5">
            
            
            <!--FORM-->
            <div class="row pt-5 border-top" >

                <div class="col-4 pt-3 wrapper-main" id="registration">  
                <!--REGISTRATION-->
                    <div class="m-auto col-4 ">
                        <h1>Register</h1>
                        
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
                <div class="col-4">
                    <h1>Requirements</h1>
                    <div>
                        <div class="row">
                            <h3 class="col-4">Profile Name</h3>
                            <ul class="col-4">
                                <li>Letters and Numbers only</li>
                                <li>No Spaces</li>
                            </ul>
                        </div>
                        
                        <div class="row">
                            <h3 class="col-4">Password:</h3>
                            <ul class="col-4">
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
                <div class="col-4">
                    <div id="message" ></div>
                    
                </div>
            </div>
            <div>
                
            </div>

            

            

        </div><!--END OF CONTENT-->
        <!--footer-->
        <?php
        //require "../includes/footer.php";
        ?>
    </div>

    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->


</body>
</html>