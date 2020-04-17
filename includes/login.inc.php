<?php 

if(isset($_POST['login-submit'])){

    require 'dbh.inc.php';

    $email = $_POST['email'];
    $wachtwoord = $_POST['wachtwoord'];

    if(empty($email) || empty($wachtwoord)){

        header("Location: ../login.php?error=emptyfields");
        exit();

    }else{

        $sql = "SELECT * FROM user WHERE email=?";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){

            header("Location: ../login.php?error=sqlerror");
            exit();

        }else{

            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if($row = mysqli_fetch_assoc($result)){

                $pwdCheck = password_verify($wachtwoord, $row['wachtwoord']);
                
                if($pwdCheck == false){

                    header("Location: ../login.php?error=wrongpassword");
                    exit();

                }else if($pwdCheck == true){

                    session_start();
                    $_SESSION['userid'] = $row['id'];
                    $_SESSION['usergebruikersnaam'] = $row['gebruikersnaam'];
                    $_SESSION['useremail'] = $row['email'];

                    header("Location: ../index.php?login=succes");
                    exit();

                }else{

                    header("Location: ../login.php?error=wrongpassword");
                    exit();

                }


            }else{

                header("Location: ../login.php?error=nouser1");
                exit();

            }

        }

    }

}else{

    header("Location: ../login.php?accesdenied");

}

?>