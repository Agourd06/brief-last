<?php

class CurrentAccount extends Account {
    protected $overdraftLimit;

    public function __construct($userId, $balance, $rib, $overdraftLimit) {
        parent::__construct($userId, $balance, $rib, 'Current'); // 'Current' indicates the account type
        $this->overdraftLimit = $overdraftLimit;
    }

    public function getOverdraftLimit() {
        return $this->overdraftLimit;
    }

    public function setOverdraftLimit($overdraftLimit) {
        $this->overdraftLimit = $overdraftLimit;
    }
}

?>
