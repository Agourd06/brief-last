<?php
require("../config/database.php");



Class Atm{




    private $atmId;
    private $adress;
    
    public function __construct($adress){
    
        $this->adress= $adress;
       
    
    }
    
    
 
    public function getAdress($adress){
        return $this->$adress;
    }



    public function setAdress($adress){
        $this->adress = $adress;
    }





}



?>