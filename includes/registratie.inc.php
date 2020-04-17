<?php

if(isset($_POST['registratie-submit'])){

    require 'dbh.inc.php';

    $gebruikersnaam         = $_POST['gebruikersnaam'];
    $email                  = $_POST['email'];
    $wachtwoord             = $_POST['wachtwoord'];
    $wachtwoordBevestigen   = $_POST['wachtwoord-bevestigen'];


    // ERROR HANDLERS

    // CHECK OF VELDEN INGEVULD ZIJN
    if(empty($gebruikersnaam) || empty($email) || empty($wachtwoord) || empty($wachtwoordBevestigen)){

        header("Location: ../registratie.php?error=emptyfields&gebruikersnaam=".$gebruikersnaam."&email=".$email);
        exit();

    // CHECK OF EMAIL VALID IS EN GEBRUIKERSNAAM GEEN ONGEWONE KARAKTER BEVAT
    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match(`/^[a-zA-Z0-9]*$/`, $gebruikersnaam)){

        header("Location: ../registratie.php?error=invalidusernameemail");
        exit();

    // CHECK OF EMAIL VALID IS
    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){

        header("Location: ../registratie.php?error=invalidemail&gebruikersnaam=".$gebruikersnaam);
        exit();
    
    // CHECK OF WACHTWOORD OVEREENKOMT MET WACHTWOORD BEVESTIGEN
    }else if($wachtwoord !== $wachtwoordBevestigen){

        header("Location: ../registratie.php?error=passwordcheck&gebruikersnaam=".$gebruikersnaam."&email=".$email);
        exit();

    // CHECK OF GEBRUIKERSNAAM AL BESTAAT
    }else{

        $sql = "SELECT gebruikersnaam FROM user WHERE gebruikersnaam=?";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){

            header("Location: ../registratie.php?error=sqlerror1");
            exit();

        }else{

            mysqli_stmt_bind_param($stmt, "s", $gebruikersnaam);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);

            if($resultCheck > 0){

                header("Location: ../registratie.php?error=usertaken&email=".$email);
                exit();

            }else{

                $sql = "INSERT INTO user (gebruikersnaam, email, wachtwoord) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt, $sql)){

                    header("Location: ../registratie.php?error=sqlerror2");
                    exit();

                }else{

                    $hashedPwd = password_hash($wachtwoord, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sss", $gebruikersnaam, $email, $hashedPwd);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../profielVervolledigen.php?signup=succes");
                    exit();

                }

            }

        }

    }



    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}
else{

    header("Location: ../registratie.php");
    exit();

}

?>