<?php
require_once("../repositories/Database.php");


Class Users{

    private $userId;
    private $username;
    private $nom;
    private $prenom;
    private $password;
    private $adressId;
    
    public function __construct($password,$prenom,$nom,$username,$adressId){
        $this->username= $username;
        $this->nom = $nom ;
        $this->prenom = $prenom;
        $this->password = $password ;
        $this->adressId = $adressId;

    }



    public function getuserId(){
        return $this->userId;
    }
    
    public function getusername(){
        return $this->username;
    }
    public function setusername($username){
        $this->username = $username;
    }
    public function getnom(){
        return $this->nom;
    }
    public function setnom($nom){
        $this->nom = $nom;
    }
    public function getprenom(){
        return $this->prenom;
    }
    public function setprenom($prenom){
        $this->prenom = $prenom;
    }
    public function getpassword(){
        return $this->password;
    }
    public function setpassword($password){
        $this->password = $password;
    }
    
    public function getadressId(){
        return $this->adressId;
    }


}



?>


