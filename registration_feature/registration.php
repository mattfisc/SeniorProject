<?php

$name = $_POST['name'];
$email = $_POST['email'];
$password= $_POST['password'];



// CONNECT TO DATABASE
// WEBPAGE NOTE: $mysqli = new mysqli("127.0.0.1", "username", "password", "database", 3306);
$conn = new mysqli("localhost", "root", "", "cs450");

// CHECK CONNECTION
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// TEST IF MEMBER EXISTS BY EMAIL or name
//$test = "SELECT * FROM `registration` WHERE  email = '" . $email . "'OR name_profile = '" .$name. "'";
//SELECT * FROM `registration` WHERE email = 'ashfisch@outlook.com' OR name_profile = 'Matthew Fischer'
$test = "SELECT * FROM `registration` WHERE  name_profile = '" .$name. "' OR email = '" . $email . "'";
//$email_test = "SELECT * FROM `registration` WHERE  email = '" . $email . "'";

// TEST
$check = mysqli_query($conn,$test);
$num_rows = mysqli_num_rows($check);


// EMAIL TAKEN REGISTRATION ERROR
// EMAIL TAKEN REGISTRATION ERROR
if($num_rows > 0){
    echo "Name already taken";
  
}
else{


  // QUERY STRING
  $createMember = "INSERT INTO registration (`name_profile`, `email`, `password`) VALUES ('".$name."','".$email."','".$password."')";

  // CREATE MEMBER TRUE
  if ($conn->query($createMember) === TRUE) {
    // SUCCEESS
    echo "Created Member Record.";
  } 
  // CREATE MEMBER FALSE
  else {
    echo "Failed to create.";
  

  }
}

?>