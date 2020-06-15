<?php 

include_once(__DIR__."/c.database.php");

class Chat{
    private $sender;
    private $receiver;
    private $message;
    private $seen;



    /**
     * Get the value of sender
     */ 
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * Set the value of sender
     *
     * @return  self
     */ 
    public function setSender($sender)
    {
        $this->sender = $sender;

        return $this;
    }

    /**
     * Get the value of receiver
     */ 
    public function getReceiver()
    {
        return $this->receiver;
    }

    /**
     * Set the value of receiver
     *
     * @return  self
     */ 
    public function setReceiver($receiver)
    {
        $this->receiver = $receiver;

        return $this;
    }

    /**
     * Get the value of message
     */ 
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @return  self
     */ 
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get the value of seen
     */ 
    public function getSeen()
    {
        return $this->seen;
    }

    /**
     * Set the value of seen
     *
     * @return  self
     */ 
    public function setSeen($seen)
    {
        $this->seen = $seen;

        return $this;
    }

    public function getMessages(){
        $conn = Database::getConnection();
        
        $statement = $conn->prepare("SELECT verzender_id, ontvanger_id, bericht FROM chat
        WHERE
            (verzender_id = :verzender_id AND ontvanger_id = :ontvanger_id)
        OR
            (verzender_id = :ontvanger_id AND ontvanger_id = :verzender_id)");

        $verzender = $this->getSender();
        $ontvanger = $this->getReceiver();

        $statement->bindValue(":verzender_id", $verzender);
        $statement->bindValue(":ontvanger_id", $ontvanger);

        $statement->execute();
        
        $messages = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $messages;
    }

    public function getChats(){
        $conn = Database::getConnection();

        $statement = $conn->prepare(
        "SELECT DISTINCT verzender_id
        FROM chat 
        WHERE (ontvanger_id = :ontvanger_id)
        UNION
        SELECT DISTINCT ontvanger_id
        FROM chat
        WHERE (verzender_id = :verzender_id)");

        $verzender = $this->getSender();
        $ontvanger = $this->getReceiver();

        $statement->bindValue(":verzender_id", $verzender);
        $statement->bindValue(":ontvanger_id", $ontvanger);
        
        $statement->execute();
        
        $messages = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $messages;


    }

    public function getLastMessage(){
        $conn = Database::getConnection();

        $statement = $conn->prepare(
        "SELECT id, bericht 
        FROM chat 
        WHERE (ontvanger_id = :ontvanger_id) 
        ORDER BY id DESC LIMIT 1");

        $ontvanger = $this->getReceiver();

        $statement->bindValue(":ontvanger_id", $ontvanger);

        $statement->execute();
        
        $messages = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $messages;
    }

    public function getLastMessage1(){
        $conn = Database::getConnection();

        $statement = $conn->prepare(
        "SELECT id, bericht 
        FROM chat 
        WHERE (verzender_id = :verzender_id) 
        ORDER BY id DESC LIMIT 1");

        $verzender = $this->getSender();

        $statement->bindValue(":verzender_id", $verzender);

        $statement->execute();
        
        $messages = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $messages;
    }

    public function searchMyName($receiver){
        $conn = Database::getConnection();

        $statement = $conn->prepare("select voornaam, achternaam, avatar from user where id like :ontvanger_id");

        $receiver = $this->getReceiver();

        $statement->bindValue(":ontvanger_id", $ontvanger);

        $result = $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function searchName(){
        $conn = Database::getConnection();

        $statement = $conn->prepare("select id, voornaam, achternaam, avatar from user where id like :verzender_id");

        $sender = $this->getSender();

        $statement->bindValue(":verzender_id", $sender);

        $result = $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function sendMessage(){
        $conn = Database::getConnection();

        $statement = $conn->prepare
        ("INSERT INTO chat 
        (verzender_id, ontvanger_id, bericht) 
        VALUES 
        (:verzender_id, :ontvanger_id, :bericht)");

        $sender = $this->getSender();
        $receiver = $this->getReceiver();
        $message = $this->getMessage();

        $statement->bindValue(":verzender_id", $sender);
        $statement->bindValue(":ontvanger_id", $receiver);
        $statement->bindValue(":bericht", $message);

        $result = $statement->execute();

        return $result;
    }

}