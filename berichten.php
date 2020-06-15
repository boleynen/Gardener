<?php
include_once(__DIR__."/includes/header.inc.php");
include_once(__DIR__."/classes/c.chat.php");
include_once(__DIR__."/classes/c.user.php");


$fetchUser = new User();
$fetchUser->setEmail($_SESSION['email']);
$myId = $fetchUser->fetchMyId();
$myId = implode(" ", $myId);


$getChats = new Chat();
$getChats->setSender($myId);
$getChats->setReceiver($myId);
$chats = $getChats->getChats();




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&family=Source+Sans+Pro:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Document</title>
</head>

<body>
    <div id="top-nav">
        <div id="back-btn" >
            <a href="index.php">&#8249;</a>
        </div>
        <p id="titel-pagina">Chat</p>
    </div>
    <main>
        <div>
            <?php
              

             foreach($chats as $chat){
                 $chatId = implode(" ",$chat);
                 try {
                    $getPerson = new Chat();
                    $getPerson->setSender($chatId);
                    $person = $getPerson->searchName();

                    $getPerson->setReceiver($person[0]['id']);
                    $lastChat = $getPerson->getLastMessage();
                    $lastChat1 = $getPerson->getLastMessage1();

                    // print("<pre>".print_r($lastChat,true)."</pre>");

                    ?>
                    <div class="chat-person">
                            <div class="chat-person-avatar-wrapper">
                                <img src="avatars/<?php echo $person[0]['avatar'] ?>" alt="profielfoto">
                            </div>
                            <span>
                                <h2>
                                    <a href="chatbox.php?uid=<?php echo $person[0]['id'] ?>">
                                        <?php echo $person[0]['voornaam']." ".$person[0]['achternaam'] ?>
                                    </a>
                                </h2>
                                <?php 
                                error_reporting(0);
                                if($lastChat[0]['id'] > $lastChat1[0]['id']){

                                    ?><p><?php echo $lastChat[0]['bericht']; ?></p><?php

                                    $r = "hidden";

                                }else if($lastChat[0]['id'] < $lastChat1[0]['id']){

                                    ?><p style="font-weight:bold"><?php echo $lastChat1[0]['bericht']; ?></p><?php

                                    $r = "visible";

                                }else if($lastChat[0]['bericht'] == NULL){

                                    ?><p><?php echo $lastChat[0]['bericht']; ?></p><?php
                                    
                                    $r = "visible";

                                }else if($lastChat1[0]['bericht'] == NULL){

                                    ?><p><?php echo $lastChat1[0]['bericht']; ?></p><?php
                                    
                                    $r = "hidden";

                                }
                                
                                ?>
                            </span>
                            <div class="read" style="visibility:<?php echo $r ?>"></div>

                    </div>

            <?php
                 } catch (\Throwable $th) {
                    $error = $th->getMessage();
                    // echo $error;
                 }

             }
            ?>



        </div>
    </main>

</body>

</html>