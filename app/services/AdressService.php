<?php
require("../repositories/Database.php");
require("AdressServiceInterface.php");

class AdressService extends Database implements AdressInterface
{

    protected $db;


    public function addAdress(Adress $adress)
    {

        $this->db = $this->connect();

        $adressId = $adress->getadressId();
        $ville = $adress->getville();
        $rue = $adress->getRue();
        $quartier = $adress->getquartier();
        $codePostal = $adress->getcodePostal();
        $email = $adress->getEmail();
        $tel = $adress->getTel();


        $addag = "INSERT INTO adress  VALUES ( :adressId, :ville, :rue,:quartier,:codePostal,:email,:tel)";
        $stmt = $this->db->prepare($addag);
        $stmt->bindParam(":adressId", $adressId);
        $stmt->bindParam(":ville", $ville);
        $stmt->bindParam(":rue", $rue);
        $stmt->bindParam(":quartier", $quartier);
        $stmt->bindParam(":codePostal", $codePostal);   
        $stmt->bindParam(":email",$email);
        $stmt->bindParam(":tel",$tel);


        try {
            $stmt->execute();
            echo "added";
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
