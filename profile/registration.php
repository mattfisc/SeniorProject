<?php

// POSSIBLE NUMBER
$name = $_POST['name'];
$email = $_POST['email'];
$password= $_POST['password'];


// CONNECT TO DATABASE
//WEBPAGE NOTE: $mysqli = new mysqli("127.0.0.1", "username", "password", "database", 3306);
$conn = new mysqli("localhost", "root", "", "cs450");

// CHECK CONNECTION
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// TEST IF MEMBER EXISTS BY EMAIL or name
$test = "SELECT * FROM `registration` WHERE email = '". $email ."' profile_name = '". $name ."'";


// TEST
$check = mysqli_query($conn,$test);

// NUMBER OF MEMBERS
$num = mysqli_num_rows($check);

// EMAIL TAKEN REGISTRATION ERROR
if($num == 1){
  header('location:form.php?message=emailerror');// TRY AGAIN

}
else{
  
  // CREATE NEXT ID NUMBER
  $id = "SELECT MIN(id) FROM registration;";
  echo $id;



  // QUERY STRING
  $createMember = "INSERT INTO registration (`profile_name`, `email`, `password`) VALUES ('".$name."','".$email."','".$password."')";

  // CREATE MEMBER TRUE
  if ($conn->query($createMember) === TRUE) {
    // SUCCEESS
    header('location:form.php?message=created');
  } 
  // CREATE MEMBER FALSE
  else {
    header('location:form.php?message=fail');
  

  }
}

?>