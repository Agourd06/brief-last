<?php

require_once("../repositories/Database.php");
require("AccountServiceInterface.php");
require("../models/account/Account.php");
require("../models/account/CurrentAccount.php");
require("../models/account/SavingsAccount.php");

class AccountService extends Database implements AccountServiceInterface {
    protected $db;

    public function addAccount(Account $account) {
        $db = $this->connect();

        $userId = $account->getUserId();
        $accountType = get_class($account); // Returns the class name, e.g., CurrentAccount or SavingsAccount
        $balance = $account->getBalance();

        // Specific attributes for CurrentAccount and SavingsAccount
        $overdraftLimit = ($account instanceof CurrentAccount) ? $account->getOverdraftLimit() : null;
        $interestRate = ($account instanceof SavingsAccount) ? $account->getInterestRate() : null;
    
        $addAccountQuery = "INSERT INTO account (user_id, account_type, balance, overdraft_limit, interest_rate) 
                            VALUES (:userId, :accountType, :balance, :overdraftLimit, :interestRate)";
        $stmt = $db->prepare($addAccountQuery);
        $stmt->bindParam(":userId", $userId, PDO::PARAM_INT);
        $stmt->bindParam(":accountType", $accountType);
        $stmt->bindParam(":balance", $balance);
        $stmt->bindParam(":overdraftLimit", $overdraftLimit);
        $stmt->bindParam(":interestRate", $interestRate);
    
        try {
            $stmt->execute();
            echo "Account added successfully";
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAccountsByUser(User $user) {
        $db = $this->connect();
        $userId = $user->getUserId();
    
        // Update the query to match the actual column name in your database
        $getAccountsQuery = "SELECT * FROM account WHERE user_id_column_name = :userId";
        $stmt = $db->prepare($getAccountsQuery);
        $stmt->bindParam(":userId", $userId, PDO::PARAM_INT);
        $stmt->execute();
    
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $result;
    }
    
    

    public function getAccountById($accountId) {
        $db = $this->connect();

        $getAccountQuery = "SELECT * FROM account WHERE account_id = :accountId";
        $stmt = $db->prepare($getAccountQuery);
        $stmt->bindParam(":accountId", $accountId, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function updateAccount(Account $account) {
        $db = $this->connect();

        $accountId = $account->getAccountId();
        $newBalance = $account->getBalance();

        $updateAccountQuery = "UPDATE account SET balance = :newBalance WHERE account_id = :accountId";
        $stmt = $db->prepare($updateAccountQuery);
        $stmt->bindParam(":newBalance", $newBalance);
        $stmt->bindParam(":accountId", $accountId, PDO::PARAM_INT);

        try {
            $stmt->execute();
            echo "Account updated successfully";
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function deleteAccount($accountId) {
        $db = $this->connect();

        $deleteAccountQuery = "DELETE FROM account WHERE account_id = :accountId";
        $stmt = $db->prepare($deleteAccountQuery);
        $stmt->bindParam(":accountId", $accountId, PDO::PARAM_INT);

        try {
            $stmt->execute();
            echo "Account deleted successfully";
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}

?>
