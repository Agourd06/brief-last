<?php
require_once("../repositories/Database.php");
require("UserServiceInterface.php");

class Userservice extends Database implements UserInterface
{

    protected $db;


    public function addUser(Users $users)
    {

        $db = $this->connect();

        // $agencyId = $agency->getagencyId();
        $userName = $users->getusername();
        $nom = $users->getnom();
        $prenom = $users->getprenom();
        $password = $users->getpassword();
        $adressId = $users->getadressId();
       
       


 
        $addag = "INSERT INTO users (pw,firstName,familyName,username,adrId)  VALUES ( :pw,:firstName,:familyName,:username,:adrId)";
        $stmt = $db->prepare($addag);
        $stmt->bindParam(":pw", $password);
        $stmt->bindParam(":firstName", $prenom);
        $stmt->bindParam(":familyName", $nom);
        $stmt->bindParam(":username", $userName);
        $stmt->bindParam(":adrId", $adressId);
      

        try {
            $stmt->execute();
           $userId = $db->lastInsertId();

            echo "added";
            return $userId;
        } catch (PDOException $e) {
            die($e->getMessage());
        }

    }

}
