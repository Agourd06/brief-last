<?php

class SavingsAccount extends Account {
    protected $interestRate;

    public function __construct($userId, $balance, $rib, $interestRate) {
        parent::__construct($userId, $balance, $rib, 'Savings'); // 'Savings' indicates the account type
        $this->interestRate = $interestRate;
    }

    public function getInterestRate() {
        return $this->interestRate;
    }

    public function setInterestRate($interestRate) {
        $this->interestRate = $interestRate;
    }
}

?>
