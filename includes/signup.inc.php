<?php

// ACCESS FROM FORM
if(isset($_POST['signup-submit'])){

  require 'dbh.inc.php';

  $username = $_POST['name'];
  $email = $_POST['email'];
  $password1 = $_POST['password1'];
  $password2 = $_POST['password2'];


  // INVALID EMPTY FIELDS
  // if( empty($username) || empty($email) || empty($password1) || empty($password2) ){
  //   header("Location: ../signup_feature/signup_form.php?emptyfields&uid= ". $username ."&email=". $email);
  //   exit();
  // }
  // INVALID email and password
  if(!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
    header("Location: ../signup_feature/signup_form.php?error=invalidemailuid");
    exit();
  }
  // INVALID EMAIL
  else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    header("Location: ../signup_feature/signup_form.php?error=invalidemail&uid=".$username);
    exit();
  }

  // INVALID EMAIL
  else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
    header("Location: ../signup_feature/signup_form.php?error=invalidemail&uid=".$email);
    exit();
  }

  // PASSWORD REPEAT NOT THE SAME
  else if($password1 != $password2){
    header("Location: ../signup_feature/signup_form.php?error=passwordcheck&uid=".$username."&email=".$email);
    exit();
  }

  // RUN SQL
  else{
    $sql = 'SELECT uidUsers FROM users WHERE uidUsers=?';
    $stmt = mysqli_stmt_init($conn);

    // CHECK CONNECTION
    if(!mysqli_stmt_prepare($stmt,$sql)){
      header("Location: ../signup_feature/signup_form.php?error=sqlerror");
    exit();
    }
    // CHECK MATCH ALREADY IN TABLE
    else{
      mysqli_stmt_bind_param($stmt,'ss',$username);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultCheck = mysqli_stmt_num_rows($stmt);

      // EMAIL ALREADY TAKEN
      if($resultCheck > 0){
        header("Location: ../signup_feature/signup_form.php?error=usertaken&email=".$email);
        exit();
      }
      else{
        $sql = 'INSERT INTO users (uidUsers,emailUsers,pwdUsers) VALUES (?,?,?)';
        $stmt = mysqli_stmt_init($conn);

        // CHECK CONNECTION
        if(!mysqli_stmt_prepare($stmt,$sql)){
          header("Location: ../signup_feature/signup_form.php?error=sqlerror");
          exit();
        }
        // CHECK MATCH ALREADY IN TABLE
        else{
          // HASHED PWD
          $hashedPwd = password_hash($password,PASSWORD_DEFAULT);

          mysqli_stmt_bind_param($stmt,'sss',$username,$email,$hashedPwd);
          mysqli_stmt_execute($stmt);
          header("Location: ../login_feature/login_form.php?signup=success");
          exit();
        }
      }
    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);

}
else{
  header("Location: ../registration_form.php?error=inappropriatereach");
    exit();
}