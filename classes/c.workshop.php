<?php 

include_once(__DIR__."/c.database.php");

class Workshop{
    private $idUser;
    private $name;
    private $date;
    private $start;
    private $location;
    private $price;
    private $free;
    private $description;
    private $picture;



    /**
     * Get the value of idUser
     */ 
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set the value of idUser
     *
     * @return  self
     */ 
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

        /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of start
     */ 
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set the value of start
     *
     * @return  self
     */ 
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get the value of location
     */ 
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set the value of location
     *
     * @return  self
     */ 
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of free
     */ 
    public function getFree()
    {
        return $this->free;
    }

    /**
     * Set the value of free
     *
     * @return  self
     */ 
    public function setFree($free)
    {
        $this->free = $free;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of foto
     */ 
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set the value of foto
     *
     * @return  self
     */ 
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    public function saveWorkshop(){
        $conn = Database::getConnection();

        $statement = $conn->prepare("INSERT INTO workshop 
        (idUser, naam, datum, start, locatie, prijs, gratis, beschrijving, foto)
        VALUES
        (:idUser, :name, :date, :start, :location, :price, :free, :description, :picture)");

        $idUser       = $this->getIdUser();
        $name         = $this->getName();
        $date         = $this->getDate();
        $start        = $this->getStart();
        $location     = $this->getLocation();
        $price        = $this->getPrice();
        $free         = $this->getFree();
        $description  = $this->getDescription();
        $picture      = $this->getPicture();

        $statement->bindValue(":idUser", $idUser);
        $statement->bindValue(":name", $name);
        $statement->bindValue(":date", $date);
        $statement->bindValue(":start", $start);
        $statement->bindValue(":location", $location);
        $statement->bindValue(":price", $price);
        $statement->bindValue(":free", $free);
        $statement->bindValue(":description", $description);
        $statement->bindValue(":picture", $picture);
        

        $data = $statement->execute();

        return $data;
    }

    public function fetchMyWorkshops(){
        $conn = Database::getConnection();

        $statement = $conn->prepare("SELECT naam, datum, locatie, foto FROM workshop WHERE idUser = :idUser");

        $idUser = $this->getIdUser();

        $statement->bindValue("idUser", $idUser);

        $products = $statement->execute();

        $products = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }

    public function fetchUserProducts(){
        $conn = Database::getConnection();

        $statement = $conn->prepare("SELECT naam, datum, start, locatie, prijs, gratis, beschrijving, foto FROM workshop WHERE idUser = :idUser");

        $idUser = $this->getIdUser();

        $statement->bindValue("idUser", $idUser);

        $products = $statement->execute();

        $products = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }




}