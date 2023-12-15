<?php
require("../repositories/Database.php");



Class Bank{


private $bankId;
private $name;
private $logo;

public function __construct($name,$logo){

    $this->name= $name;
    $this->logo = $logo ;
   

}


public function getbankId($bankId){
    return $this->$bankId;
}

public function getname($name){
    return $this->$name;
}
public function setname($name){
    $this->name = $name;
}
public function getlogo($logo){
    return $this->$logo;
}
public function setlogo($logo){
    $this->logo = $logo;
}


}


?>