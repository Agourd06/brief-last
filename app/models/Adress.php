<?php
require("../repositories/Database.php");



Class Adress{

    protected $adressId;
    protected $ville;
    protected $quartier;
    protected $codePostal;
    protected $tel;
    

    public function __construct($adressId,$ville,$quartier,$codePostal,$tel){
        $this->adressId = $adressId;
        $this->ville= $ville;
        $this->quartier = $quartier ;
        $this->codePostal = $codePostal;
        $this->tel = $tel ;

    }



    public function getadressId($adressId){
        return $this->$adressId;
    }
    
    public function getville($ville){
        return $this->$ville;
    }
    public function setville($ville){
        $this->ville = $ville;
    }
    public function getquartier($quartier){
        return $this->$quartier;
    }
    public function setquartier($quartier){
        $this->quartier = $quartier;
    }
    public function getcodePostal($codePostal){
        return $this->$codePostal;
    }
    public function setcodePostal($codePostal){
        $this->codePostal = $codePostal;
    }
    public function gettel($tel){
        return $this->$tel;
    }
    public function settel($tel){
        $this->tel = $tel;
    }
    

}



?>


