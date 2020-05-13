<?php 

include_once(__DIR__."/c.database.php");

class Signup{

    private $username;
    private $email;
    private $password;
    private $passwordConfirmation;


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
     * Get the value of passwordConfirmation
     */ 
    public function getPasswordConfirmation()
    {
        return $this->passwordConfirmation;
    }

    /**
     * Set the value of passwordConfirmation
     *
     * @return  self
     */ 
    public function setPasswordConfirmation($passwordConfirmation)
    {
        $this->passwordConfirmation = $passwordConfirmation;

        return $this;
    }

    
    public function saveNewUser(){
        $conn = Database::getConnection();
        
        $statement = $conn->prepare("insert into user (gebruikersnaam, email, wachtwoord) 
                                    values (:gebruikersnaam, :email, :wachtwoord)");
        
        $username   = $this->getUsername();
        $email      = $this->getEmail();
        $password   = $this->getPassword();

        $password = password_hash($password, PASSWORD_DEFAULT, ["cost" => 14]);
        
        $statement->bindValue(":gebruikersnaam", $username);
        $statement->bindValue(":email", $email);
        $statement->bindValue(":wachtwoord", $password);
        
        $result = $statement->execute();
        
        return $result;
        
    }

    public static function getEmails(){
        $conn = Database::getConnection();
        
        $statement = $conn->prepare("select email from user");
        
        $statement->execute();
        
        $emailAdressen = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $emailAdressen;
    }


}