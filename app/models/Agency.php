<?php
require("../config/database.php");



Class Agency{


    private $agencyId;
    private $longitude;
    private $latitude;
    private $agencyName;
    



    public function __construct($longitude,$latitude,$agencyName){
    
        $this->longitude= $longitude;
        $this->latitude = $latitude ;
        $this->agencyName = $agencyName ;
       

    }




    public function getagencyId($agencyId){
        return $this->$agencyId;
    }
    
    public function getlongitude($longitude){
        return $this->$longitude;
    }
    public function setlongitude($longitude){
        $this->longitude = $longitude;
    }
    public function getlatitude($latitude){
        return $this->$latitude;
    }
    public function setlatitude($latitude){
        $this->latitude = $latitude;
    }
    public function getagencyName($agencyName){
        return $this->$agencyName;
    }
    public function setagencyName($agencyName){
        $this->agencyName = $agencyName;
    }
    
    }
    

?>
