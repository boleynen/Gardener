<?php 

include_once(__DIR__."/c.database.php");

class User{
    private $uId;
    private $username;
    private $email;
    private $password;
    private $firstname;
    private $lastname;
    private $avatar;
    private $phonenumber;

    
/**
     * Get the value of uId
     */ 
    public function getUId()
    {
        return $this->uId;
    }

    /**
     * Set the value of uId
     *
     * @return  self
     */ 
    public function setUId($uId)
    {
        $this->uId = $uId;

        return $this;
    }

    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of firstname
     */ 
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @return  self
     */ 
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of lastname
     */ 
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */ 
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of avatar
     */ 
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set the value of avatar
     *
     * @return  self
     */ 
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get the value of phonenumber
     */ 
    public function getPhonenumber()
    {
        return $this->phonenumber;
    }

    /**
     * Set the value of phonenumber
     *
     * @return  self
     */ 
    public function setPhonenumber($phonenumber)
    {
        $this->phonenumber = $phonenumber;

        return $this;
    }

    public function fetchPassword(){
        $conn = Database::getConnection();
        
        $statement = $conn->prepare("select wachtwoord from user where email like :email" );

        $email = $this->getEmail();

        $statement->bindValue(":email", $email);

        $statement->execute();
        
        $passwordVerification = $statement->fetchColumn();
        
        return $passwordVerification;
    }

    public function fetchName(){
        $conn = Database::getConnection();
        
        $statement = $conn->prepare("select voornaam, achternaam from user where email like :email" );

        $email = $this->getEmail();

        $statement->bindValue(":email", $email);

        $statement->execute();
        
        $data = $statement->fetch(PDO::FETCH_ASSOC);
        
        return $data;
    }

    public function fetchAvatar(){
        $conn = Database::getConnection();
        
        $statement = $conn->prepare("select avatar from user where email like :email" );

        $email = $this->getEmail();

        $statement->bindValue(":email", $email);

        $statement->execute();
        
        
        $avatar = $statement->fetchColumn();
        
        return $avatar;
    }

    public function fetchMyId(){
        $conn = Database::getConnection();

        $statement = $conn->prepare("SELECT id FROM user WHERE email like :email");

        $email = $this->getEmail();

        $statement->bindValue("email", $email);

        $id = $statement->execute();

        $id = $statement->fetch(PDO::FETCH_ASSOC);

        return $id;
    }

    public function fetchFarmerLocations(){
        $conn = Database::getConnection();

        $statement = $conn->prepare("SELECT stad, straat FROM user");

        $data = $statement->execute();

        $data = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }

    public function getLatLng(){
        $conn = Database::getConnection();

        $statement = $conn->prepare("SELECT lat, lng FROM user");

        $data = $statement->execute();

        $data = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }

    public function getFarmerName(){
        $conn = Database::getConnection();

        $statement = $conn->prepare("SELECT voornaam, achternaam FROM user");

        $data = $statement->execute();

        $data = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }

    public function getFarmerId(){
        $conn = Database::getConnection();

        $statement = $conn->prepare("SELECT id FROM user");

        $data = $statement->execute();

        $data = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }

    public function getUser(){
        $conn = Database::getConnection();

        $statement = $conn->prepare("SELECT voornaam, achternaam, email, avatar FROM user WHERE id like :uid");

        $uId = $this->getUId();

        $statement->bindValue("uid", $uId);

        $data = $statement->execute();

        $data = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }




    
}





?>