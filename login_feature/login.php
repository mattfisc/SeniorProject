<?php


// LOGIN
$name = $_POST['name'];
$password = $_POST['password'];

// CONNECT TO DATABASE
//WEBPAGE NOTE: $mysqli = new mysqli("127.0.0.1", "username", "password", "database", 3306);
$conn = new mysqli("localhost", "root", "", "cs450");

// CHECK CONNECTION
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// TEST IF MEMBER EXISTS BY EMAIL
// $test = "SELECT * FROM `fitnesssignup` WHERE Email = '$email' "; works
$test = "SELECT name FROM `registration` WHERE name = '". $name ."'";
//$test = "SELECT * FROM `booklisting` WHERE `title` LIKE 'matt' AND `author` LIKE 'fischer'";

// TEST
$check = mysqli_query($conn,$test);
$rows = mysqli_num_rows($check);

// LOGIN IN MEMBER
if($rows == 1){
    while($row = $check->fetch_assoc()){
        
        // FIND CORRECT EMAIL WITH PASSWORD
        if($row['name'] == $name){
            // MEMBER EXISTS
            $_SESSION["profile_name"] = $name;
            header('location:member_only.html');
        }
        else{
            echo "error";
        }
    }
}
else{
    // MEMBER DOES NOT EXIST
    header('location:login_form.html');
    echo "Member does not exist ";
}

?>