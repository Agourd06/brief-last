<?php

class Account {
    protected $accountId;
    protected $userId;
    protected $balance;
    protected $rib;
    protected $accountType;

    public function __construct($userId, $balance, $rib, $accountType) {
        $this->userId = $userId;
        $this->balance = $balance;
        $this->rib = $rib;
        $this->accountType = $accountType;
    }

    public function getAccountId() {
        return $this->accountId;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function getBalance() {
        return $this->balance;
    }

    public function setBalance($balance) {
        $this->balance = $balance;
    }

    public function getRib() {
        return $this->rib;
    }

    public function setRib($rib) {
        $this->rib = $rib;
    }

    public function getAccountType() {
        return $this->accountType;
    }

    public function setAccountType($accountType) {
        $this->accountType = $accountType;
    }
}

?>
