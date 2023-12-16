<?php
require_once("../repositories/Database.php");
require("BankServiceInterface.php");

class Bankservice extends Database implements BankInterface
{

    protected $db;


    public function addBank(Bank $bank)
    {

        $db = $this->connect();

        // $bankId = $bank->getbankId();
        $bankName = $bank->getbankName();
        $bankLogo = $bank->getlogo();







        $addag = "INSERT INTO bank (logo,bankName) VALUES (  :logo , :bankName)";
        $stmt = $db->prepare($addag);
        $stmt->bindParam(":bankName", $bankName);
        $stmt->bindParam(":logo", $bankLogo);



        try {
            $stmt->execute();
            echo "added";
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getBanks()
    {
        $db = $this->connect();

        $query   = "SELECT bankId, bankName FROM bank";

        $getbank = $db->query($query);
        $result = $getbank->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
}
