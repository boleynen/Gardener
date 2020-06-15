<?php 

include_once(__DIR__."/c.database.php");

class Volg{
    private $idVolger;
    private $idGevolgd;


    /**
     * Get the value of idVolger
     */ 
    public function getIdVolger()
    {
        return $this->idVolger;
    }

    /**
     * Set the value of idVolger
     *
     * @return  self
     */ 
    public function setIdVolger($idVolger)
    {
        $this->idVolger = $idVolger;

        return $this;
    }

    /**
     * Get the value of idGevolgd
     */ 
    public function getIdGevolgd()
    {
        return $this->idGevolgd;
    }

    /**
     * Set the value of idGevolgd
     *
     * @return  self
     */ 
    public function setIdGevolgd($idGevolgd)
    {
        $this->idGevolgd = $idGevolgd;

        return $this;
    }

    public function volg(){
        $conn = Database::getConnection();

        $statement = $conn->prepare("INSERT INTO volgers
        (idVolger, idGevolgd)
        VALUES
        (:idVolger, :idGevolgd)");

        $idVolger   = $this->getIdVolger();
        $idGevolgd  = $this->getIdGevolgd();

        $statement->bindValue(":idVolger", $idVolger);
        $statement->bindValue(":idGevolgd", $idGevolgd);

        $statement->execute();
    }

    public function fetchFollowers(){
        $conn = Database::getConnection();

        $statement = $conn->prepare("SELECT idGevolgd FROM volgers WHERE idVolger = :idVolger");

        $idVolger = $this->getIdVolger();

        $statement->bindValue(":idVolger", $idVolger);

        $data = $statement->execute();

        $data = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }


}