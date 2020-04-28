<?php 
require 'dbh.inc.php';
include_once(__DIR__."/header.inc.php");

$userid = $_SESSION['userid'];

$sql = "SELECT avatar FROM user WHERE id = $userid";
$stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt, $sql)){

    header("Location: ../index.php?error=sqlerror");
    exit();

}else{

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $imgPathArr = mysqli_fetch_assoc($result);
    $imgPath = implode("", $imgPathArr);

}

?>

