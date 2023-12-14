<?php
require("../config/database.php");



Class User{

    private $userId;
    private $username;
    private $nom;
    private $prenom;
    private $password;

    public function __construct($username,$nom,$prenom,$password){

        $this->username= $username;
        $this->nom = $nom ;
        $this->prenom = $prenom;
        $this->password = $password ;

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


