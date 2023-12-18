<?php

interface AccountServiceInterface {
    public function addAccount(Account $account);
    public function getAccountsByUser(User $user);
    public function getAccountById($accountId);
    public function updateAccount(Account $account);
    public function deleteAccount($accountId);
}

?>
