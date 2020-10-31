<?php

// CONNECT TO DATABASE
//localhost: $conn = new mysqli("localhost", "root", "", "cs450");

$servername = "localhost";
$dbUsername = "mattfisc";
$dbPassword = "GFr9gPhTnNwEW5N";
$dbName = "cs450";

// $servername = "localhost";
// $dbUsername = "root";
// $dbPassword = "";
// $dbName = "cs450";

//$conn = mysqli_connect($servername,$dbUsername, $dbPassword,$dbName);
$conn = new mysqli($servername,$dbUsername, $dbPassword,$dbName);

// CHECK CONNECTION SHOW ERROR
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


// ---------------------------  SIGNUP FORM ---------------------------------------------------
if(isset($_POST['signup-submit'])){

 
  
    $username = $_POST['name'];
    $email = $_POST['email'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
  
  
    // INVALID EMPTY FIELDS
    if( empty($username) || empty($email) || empty($password1) || empty($password2) ){
      header("Location: seniorproject/signup_feature/signup_form.php?emptyfields&uid= ". $username ."&email=". $email);
      exit();
    }
    // INVALID email and password
    if(!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
      header("Location: seniorproject/signup_feature/signup_form.php?error=invalidemailuid");
      exit();
    }
    // EMAIL TAKEN
    else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      header("Location: seniorproject/signup_feature/signup_form.php?error=invalidemail&uid=".$username);
      exit();
    }
  
    // USERNAME TAKEN
    else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
      header("Location: seniorproject/signup_feature/signup_form.php?error=invalidUserId&uid=".$email);
      exit();
    }
  
    // PASSWORD REPEAT NOT THE SAME
    else if($password1 != $password2){
      header("Location: seniorproject/signup_feature/signup_form.php?error=passwordcheck&uid=".$username."&email=".$email);
      exit();
    }
    // RUN SQL IS USER ID ALREADY USED
    else{
      $sql = 'SELECT uidUsers FROM users WHERE uidUsers=?';
      $stmt = mysqli_stmt_init($conn);
  
      // CHECK CONNECTION
      if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location: seniorproject/signup_feature/signup_form.php?error=usersqlerror");
        exit();
      }
      // CHECK 
      else{
        mysqli_stmt_bind_param($stmt,'s',$username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
  
        // EMAIL ALREADY TAKEN
        if($resultCheck > 0){
          header("Location: seniorproject/signup_feature/signup_form.php?error=usertaken&email=".$email);
          exit();
        }
        // RUN SQL FOR PREP INSERT
        else{
          $sql = 'INSERT INTO users (uidUsers,emailUsers,pwdUsers) VALUES (?,?,?)';
          $stmt = mysqli_stmt_init($conn);
  
          // CHECK CONNECTION
          if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: seniorproject/signup_feature/signup_form.php?error=sqlerror");
            exit();
          }
          // CHECK MATCH ALREADY IN TABLE
          else{
            // HASHED PWD
            $hashedPwd = password_hash($password1,PASSWORD_DEFAULT);
  
            mysqli_stmt_bind_param($stmt,'sss',$username,$email,$hashedPwd);
            mysqli_stmt_execute($stmt);
            header("Location: seniorproject/login_feature/login_form.php?success=signup");
            exit();
          }
        }
      }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
  
  }
  else{
    header("Location: seniorproject/registration_form.php?error=inappropriatereach");
      exit();
  }