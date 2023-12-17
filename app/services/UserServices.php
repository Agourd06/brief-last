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
       $agencyId = $users->getAgencyId();
       


 
        $addag = "INSERT INTO users (pw,firstName,familyName,username,adrId,agencyId)  VALUES ( :pw,:firstName,:familyName,:username,:adrId,:agencyId)";
        $stmt = $db->prepare($addag);
        $stmt->bindParam(":pw", $password);
        $stmt->bindParam(":firstName", $prenom);
        $stmt->bindParam(":familyName", $nom);
        $stmt->bindParam(":username", $userName);
        $stmt->bindParam(":adrId", $adressId);
        $stmt->bindParam(":agencyId", $agencyId);
      

        try {
            $stmt->execute();
           $userId = $db->lastInsertId();

            echo "added";
            return $userId;
        } catch (PDOException $e) {
            die($e->getMessage());
        }

    }
    public function getUser()
    {
        $db = $this->connect();

        $query   = "SELECT * FROM users";

        $getUser = $db->query($query);
        $result = $getUser->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function getFilteredUsers($id)
    {
        $db = $this->connect();
    
        $query = "SELECT u.*, a.agencyId, a.agencyName
                  FROM users u
                  JOIN agency a ON a.agencyId = u.agencyId
                  WHERE u.agencyId = :id";
    
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $result;
    }
    


}
