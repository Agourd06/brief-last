<?php
require("../../config/database.php");



Class Account{

    protected $id;
    protected $rib;
    protected $balance;
    
    public function deposit ($amount){
        if($amount> 0){
            $this->balance += $amount;
        }
    }

    public function withraw($amount){
        if($amount <= $this->balance){
            $this->balance -= $amount;
            return true;
        }
        return false;
    }


}


?>