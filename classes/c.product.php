<?php 

include_once(__DIR__."/c.database.php");

class Product{
    private $idUser;
    private $name;
    private $type;
    private $price;
    private $amount;
    private $free;
    private $trade;
    private $order;
    private $unit;
    private $description;
    private $pictures;
    



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
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */ 
    public function setType($type)
    {
        $this->type = $type;

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
     * Get the value of amount
     */ 
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set the value of amount
     *
     * @return  self
     */ 
    public function setAmount($amount)
    {
        $this->amount = $amount;

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
     * Get the value of trade
     */ 
    public function getTrade()
    {
        return $this->trade;
    }

    /**
     * Set the value of trade
     *
     * @return  self
     */ 
    public function setTrade($trade)
    {
        $this->trade = $trade;

        return $this;
    }

    /**
     * Get the value of order
     */ 
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set the value of order
     *
     * @return  self
     */ 
    public function setOrder($order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get the value of unit
     */ 
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * Set the value of unit
     *
     * @return  self
     */ 
    public function setUnit($unit)
    {
        $this->unit = $unit;

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
     * Get the value of pictures
     */ 
    public function getPictures()
    {
        return $this->pictures;
    }

    /**
     * Set the value of pictures
     *
     * @return  self
     */ 
    public function setPictures($pictures)
    {
        $this->pictures = $pictures;

        return $this;
    }

    public function saveProduct(){
        $conn = Database::getConnection();

        $statement = $conn->prepare("INSERT INTO product 
        (idUser, naam, type, prijs, gratis, ruilen, bestelling, hoeveelheid, eenheid, beschrijving, fotos)
        VALUES
        (:idUser, :name, :type, :price, :free, :trade, :order, :amount, :unit, :description, :pictures)");

        $idUser         = $this->getIdUser();
        $name           = $this->getName();
        $type           = $this->getType();
        $price          = $this->getPrice();
        $amount         = $this->getAmount();
        $free           = $this->getFree();
        $trade          = $this->getTrade();
        $order          = $this->getOrder();
        $unit           = $this->getunit();
        $description    = $this->getDescription();
        $pictures       = $this->getPictures();

        $statement->bindValue(":idUser", $idUser);
        $statement->bindValue(":name", $name);
        $statement->bindValue(":type", $type);
        $statement->bindValue(":price", $price);
        $statement->bindValue(":amount", $amount);
        $statement->bindValue(":free", $free);
        $statement->bindValue(":trade", $trade);
        $statement->bindValue(":order", $order);
        $statement->bindValue(":unit", $unit);
        $statement->bindValue(":description", $description);
        $statement->bindValue(":pictures", $pictures);

        $data = $statement->execute();

        return $data;
    }

    public function fetchMyProducts(){
        $conn = Database::getConnection();

        $statement = $conn->prepare("SELECT naam, prijs, eenheid, fotos FROM product WHERE idUser = :idUser");

        $idUser = $this->getIdUser();

        $statement->bindValue("idUser", $idUser);

        $products = $statement->execute();

        $products = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }


}