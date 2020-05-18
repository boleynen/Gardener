<?php 

include_once(__DIR__."/c.database.php");

class Complete{
    private $firstname;
    private $lastname;
    private $city;
    private $street;
    private $avatar;
    private $email;

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
     * Get the value of city
     */ 
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set the value of city
     *
     * @return  self
     */ 
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get the value of street
     */ 
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set the value of street
     *
     * @return  self
     */ 
    public function setStreet($street)
    {
        $this->street = $street;

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


    public function saveProfile(){
        $conn = Database::getConnection();

        $statement = $conn->prepare("UPDATE user SET 
        voornaam    = :firstname, 
        achternaam  = :lastname, 
        stad        = :city, 
        straat      = :street, 
        avatar      = :avatar
        WHERE email = :email");

        $firstname  = $this->getFirstname();
        $lastname   = $this->getLastname();
        $city       = $this->getCity();
        $street     = $this->getStreet();
        $avatar     = $this->getAvatar();
        $email      = $this->getEmail();

        $statement->bindValue("firstname", $firstname);
        $statement->bindValue("lastname", $lastname);
        $statement->bindValue("city", $city);
        $statement->bindValue("street", $street);
        $statement->bindValue("avatar", $avatar);
        $statement->bindValue("email", $email);

        $statement->execute();


    }

}