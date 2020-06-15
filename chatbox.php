<?php 
include_once(__DIR__."/includes/header.inc.php");
include_once(__DIR__."/classes/c.chat.php");
include_once(__DIR__."/classes/c.user.php");

$fetchUser = new User();
$fetchUser->setEmail($_SESSION['email']);
$myId = $fetchUser->fetchMyId();
$myId = implode(" ", $myId);

$receiverId = $_GET['uid'];
$fetchUser->setUId($receiverId);
$receiver = $fetchUser->getUser();

$getMessages = new Chat();
$getMessages->setSender($myId);
$getMessages->setReceiver($receiverId);
$messages = $getMessages->getMessages();

if(!empty($_POST)){
    try {

        $setMessages = new Chat();
        $setMessages->setSender($myId);
        $setMessages->setReceiver($receiverId);
        $setMessages->setMessage($_POST['message']);
        $setMessages->sendMessage();

        header("Refresh:0");

    } catch (\Throwable $th) {
        $error = $th->getMessage();
        echo $error;
    }
}

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
        <div id="back-btn">
            <a href="berichten.php">&#8249;</a>
        </div>
        <div id="ontvanger">
            <div class="chat-avatar-wrapper">
                <img src="avatars/<?php echo $receiver[0]['avatar']?>" alt="">
            </div>
            <p id="titel-pagina">
                <a style="text-decoration: none; color: #585858" href="userProfiel.php?Uid=<?php echo $receiverId ?>">
                <?php echo $receiver[0]['voornaam']." ".$receiver[0]['achternaam'] ?>
                </a>
            </p>
        </div>
        
    </div>
        <section id="chatbox">
            <div id="chat-output">
                <div id="scroll">
            <?php 
            // print("<pre>".print_r($messages,true)."</pre>");
            ?>


            <?php 

                    foreach ( $messages as $message ) {
                       
                        foreach ( $message as $key => $value ) {  

                            if($value == $myId && $key == 'verzender_id'){
                                $myName = $getMessages->searchName($myId);
                                ?> 
                                <div class="sender">
                                    <p class="chat-message">
                                        <?php echo $message['bericht'];?>
                                    </p>
                                    <div class="flex-row">
                                        <div class="chat-avatar-wrapper">
                                            <img src="avatars/<?php echo $myName[0]['avatar']?>" alt="">
                                        </div>
                                    </div>
                                </div>
                                <?php
                  
                            }else if($key == 'verzender_id'){
                                ?>
                                <div class="receiver">
                                    <div class="flex-row">
                                        <div class="chat-avatar-wrapper">
                                            <img src="avatars/<?php echo $receiver[0]['avatar']?>" alt="">
                                        </div>
                                    </div>
                                    
                                    <p class="chat-message">
                                        <?php echo $message['bericht']; ?>
                                    </p>
                                </div>
                                <?php
                            }
                        }                     
                    }
                
                 ?> 

                </div>
            </div>

            <div id="chat-input">
                <form method="post" id="form-chat">
                    <input type="text"  name="message" placeholder="Typ hier je bericht">
                    <input type="submit"  name="submit-chat" value="Verzend">
                </form>
            </div>
        </section>
    
</body>
</html>