<?php
require("../config/database.php");



Class User{

    private $adressId;
    private $ville;
    private $quartier;
    private $codePostal;
    private $tel;
    

    public function __construct($ville,$quartier,$codePostal,$tel){

        $this->username= $ville;
        $this->nom = $quartier ;
        $this->prenom = $codePostal;
        $this->password = $tel ;

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


