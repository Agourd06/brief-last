<?php
require_once "../services/AccountService.php";
require_once "../models/account/Account.php";
require_once "../models/User.php";

$accountService = new AccountService();

// Example: Get all accounts for a specific user
$user = new User(123 , 'agourd' , 'mohamed' , 'agourd123' , null , null  );
$accounts = $accountService->getAccountsByUser($user);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Management</title>
</head>

<body>

    <h1>Account Management</h1>

    <!-- Display a table of accounts -->
    <table border="1">
        <thead>
            <tr>
                <th>Account ID</th>
                <th>Balance</th>
                <th>Account Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($accounts as $account) : ?>
                <tr>
                    <td><?= $account['account_id'] ?></td>
                    <td><?= $account['balance'] ?></td>
                    <td><?= $account['account_type'] ?></td>
                    <td>
                        <!-- Add links or buttons for actions (edit, delete, etc.) -->
                        <a href="edit_account.php?account_id=<?= $account['account_id'] ?>">Edit</a>
                        |
                        <a href="delete_account.php?account_id=<?= $account['account_id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Add a link or button to add a new account -->
    <a href="add_account.php">Add New Account</a>

</body>

</html>
