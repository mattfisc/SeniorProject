<?php



if(isset($_POST['login-submit'])){
    // CONNECT TO DATABASE
    require 'dbh.inc.php';


    // USERNAME OR EMAIL
    $emailuid = $_POST['emailuid'];
    $password = $_POST['password'];

    // ERROR EMPTY FIELDS
    if(empty($emailuid) || empty($password)){
        header("Location: ../login_feature/login_form.php?error=emptyfields");
        exit();
    }
    else{
        $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;";
        $stmt = mysqli_stmt_init($conn);
        
        // QUERY DATABASE ERROR
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../login_feature/login_form.php?error=sqlerror");
            exit();
        }
        // GET RESULTS
        else{
            mysqli_stmt_bind_param($stmt,"ss",$emailuid,$emailuid);
            mysqli_stmt_execute($stmt);
            $result= mysqli_stmt_get_result($stmt);
            
            // SEARCH RESULTS
            if($row = mysqli_fetch_assoc($result)){

                // CHECK HASH PASSWORD 
                $pwdCheck = password_verify($password,$row['pwdUsers']);
                
                // ERROR PASSWORD
                if($pwdCheck == false){
                    header("Location: ../login_feature/login_form.php?error=wrongpwd");
                    exit();
                }
                // SUCCESSFUL LOGIN
                else if($pwdCheck == true){
                    session_start();
                    $_SESSION['idUsers'] = $row['idUsers'];
                    $_SESSION['userUid'] = $row['uidUsers'];

                    header("Location: ../member_feature/member.php?success=login");
                    exit();
                }
                // ERROR FOR OTHER RETURN RESULT STRINGS
                else{
                    header("Location: ../login_feature/login_form.php?error=resultsnotboolean");
                    exit();
                }
            }
            // ERROR NOT A USER
            else{
                header("Location: ../login_feature/login_form.php?error=nouser");
                exit();
            }
        }


    }

}
// PAGE NOT ACCESSED BY PROPER FORM
else{
    header("Location: ../login_feature/login_form.php?error=wrongway");
    exit();
}

