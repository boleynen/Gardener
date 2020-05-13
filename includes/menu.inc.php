<?php 

include_once(__DIR__."/header.inc.php");
include_once(__DIR__."/../classes/c.user.php");


try {
    $getAvatar = new User();
    $getAvatar->setEmail($_SESSION['email']);
    $imgPath = $getAvatar->fetchAvatar();

} catch (\Throwable $th) {
    echo $th;
}


?>

