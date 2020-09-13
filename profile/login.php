<?php


// LOGIN
$email = $_POST['userEmail'];
$password = $_POST['userPassword'];

// CONNECT TO DATABASE
//WEBPAGE NOTE: $mysqli = new mysqli("127.0.0.1", "username", "password", "database", 3306);
$conn = new mysqli("localhost", "root", "", "cs450");

// CHECK CONNECTION
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// TEST IF MEMBER EXISTS BY EMAIL
// $test = "SELECT * FROM `fitnesssignup` WHERE Email = '$email' "; works
$test = "SELECT Email, Pass FROM `fitnesssignup` WHERE Email = '$email'";
//$test = "SELECT * FROM `booklisting` WHERE `title` LIKE 'matt' AND `author` LIKE 'fischer'";

// TEST
$check = $mysqli->query($test);

// LOGIN IN MEMBER
if($check->num_rows > 0){
    while($row = $check->fetch_assoc()){

        // FIND CORRECT EMAIL WITH PASSWORD
        if($row['Email']=== $email && $row['Pass']=== $password){
            // MEMBER EXISTS
            header('location:login_form.php?message=success');
            
        }
        else{
            header('location:login_form.php?message=error');
        }
    }
}
else{
    // MEMBER DOES NOT EXIST
    header('location:login_form.php?message=fail');
}

?>