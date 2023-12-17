<?php
require_once("../repositories/Database.php");
require_once("../models/Agency.php");
require("AgencyInterfaceService.php");

class Agencyservice extends Database implements AgencyInterface
{

    protected $db;


    public function addAgency(Agency $agency)
    {

        $db = $this->connect();

        // $agencyId = $agency->getagencyId();
        $longitude = $agency->getlongitude();
        $latitude = $agency->getlatitude();
        $agencyName = $agency->getagencyName();
        $adrId = $agency->getadressId();
        $bankId = $agency->getBankId();



 
        $addag = "INSERT INTO agency (longitude , latitude,bankId,agencyName,adrId)  VALUES ( :longitude, :latitude,:bankId,:agencyname,:adrId)";
        $stmt = $db->prepare($addag);
        // $stmt->bindParam(":agencyId", $agencyId);
        $stmt->bindParam(":longitude", $longitude);
        $stmt->bindParam(":latitude", $latitude);
        $stmt->bindParam(":bankId", $bankId);
        $stmt->bindParam(":agencyname", $agencyName);
        $stmt->bindParam(":adrId",$adrId);


        try {
            $stmt->execute();
            echo "added";
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAgency()
    {
        $db = $this->connect();

        $query   = "SELECT * FROM agency";

        $getAgency = $db->query($query);
        $result = $getAgency->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
    public function getFiltredAgency($id)
    {
        $db = $this->connect();

        $query   = "SELECT a.* ,b.bankId , b.logo 
        FROM agency a
        JOIN bank b ON a.bankId = b.bankId
        WHERE a.bankId = $id
        
        ";

        $getAgency = $db->query($query);
        $result = $getAgency->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }


}
