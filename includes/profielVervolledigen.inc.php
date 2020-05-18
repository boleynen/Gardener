<?php 

// session_start();

// if(isset($_POST['vervolledig-submit'])){
//     require 'dbh.inc.php';

//     $voornaam       = $_POST['voornaam'];
//     $achternaam     = $_POST['achternaam'];

//     $userid         = $_SESSION['userid']; 
//     $useremail      = $_SESSION['useremail'];

//     $file           = $_FILES['avatar'];
//     $fileName       = $_FILES['avatar']['name'];
//     $fileTmpName    = $_FILES['avatar']['tmp_name'];
//     $fileSize       = $_FILES['avatar']['size'];
    
//     $fileError      = $_FILES['avatar']['error'];
//     $fileExt        = explode(".", $fileName);
//     $fileActualExt  = strtolower(end($fileExt));
//     $fileNameNew    = uniqid('', true).".".$fileActualExt;
    
//     $allowed        = array('jpg', 'jpeg', 'png');
    

//     //  ERROR HANDLERS  

//     // CHECK OF VELDEN INGEVULD ZIJN
//     //     $_FILES['avatar']['error'] == 4 <-------- als error 4 is betekent het dat er geen file is geupload
//     if($fileError == 4  || empty($voornaam) || empty($achternaam)){

//         header("Location: ../profielVervolledigen.php?error=emptyfields&voornaam=".$voornaam."&achternaam=".$achternaam);
//         exit();


//     }else{
        
//         $sql = "UPDATE user SET avatar = ?, voornaam = ?, achternaam = ? WHERE id = $userid";
//         $stmt = mysqli_stmt_init($conn);

//         if(!mysqli_stmt_prepare($stmt, $sql)){

//             header("Location: ../profielVervolledigen.php?error=sqlerror");
//             exit();

//         }else{

//             mysqli_stmt_bind_param($stmt, "sss", $fileNameNew, $voornaam, $achternaam);
//             mysqli_stmt_execute($stmt);

//         }



//         if(in_array($fileActualExt, $allowed)){
    
//             if($fileError === 0){
//                 if($fileSize < 2000000){

//                     $fileDestination = 'C:/xampp/htdocs/lab2/Gardener/avatars/'.$fileNameNew;

//                     move_uploaded_file($fileTmpName, $fileDestination);

//                     header("Location: ../index.php");

//                 }else{

//                     echo "Je bestandstype is te groot. (max. 2MB)";

//                 }

//             }else{

//                 echo "Error: Uploaden mislukt.";
//                 echo $fileError;

//             }

//         }else{

//             echo "Dit bestandstype is niet juist (enkel jpg, jpeg, png)";

//         }
//     }

//     mysqli_stmt_close($stmt);
//     mysqli_close($conn);

// }
// else{

//     header("Location: ../profielVervolledigen.php?error=submitnotset");
//     exit();

// }

?>