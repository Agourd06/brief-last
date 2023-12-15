<?php
require("../repositories/Database.php");
require("AgencyInterfaceService.php");

class Agencyservice extends Database implements AgencyInterface
{

    private $db;


    public function addAgency(Agency $agency)
    {

        $db = $this->connect();

        $agencyId = $agency->getagencyId();
        $longitude = $agency->getlongitude();
        $latitude = $agency->getlatitude();
       
        $agencyName = $agency->getagencyName();
        $adress = $agency->getAdress();
        $adrId =  $adress->getadressId();


        $addag = "INSERT INTO agency  VALUES ( :agencyId, :longitude, :latitude,:bankId,:agencyname,:adrId)";
        $stmt = $db->prepare($addag);
        $stmt->bindParam(":agencyId", $agencyId);
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
}
