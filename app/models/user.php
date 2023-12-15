<?php
require("../repositories/Database.php");
require("Adress.php");


Class User{

    private $userId;
    private $username;
    private $nom;
    private $prenom;
    private $password;
    private Adress $adress;
    public function __construct($userId,$username,$nom,$prenom,$password,Adress $adress){
        $this->userId=$userId;
        $this->username= $username;
        $this->nom = $nom ;
        $this->prenom = $prenom;
        $this->password = $password ;
        $this->adress = $adress;

    }



    public function getuserId($userId){
        return $this->$userId;
    }
    
    public function getusername($username){
        return $this->$username;
    }
    public function setusername($username){
        $this->username = $username;
    }
    public function getnom($nom){
        return $this->$nom;
    }
    public function setnom($nom){
        $this->nom = $nom;
    }
    public function getprenom($prenom){
        return $this->$prenom;
    }
    public function setprenom($prenom){
        $this->prenom = $prenom;
    }
    public function getpassword($password){
        return $this->$password;
    }
    public function setpassword($password){
        $this->password = $password;
    }
    



}



?>


