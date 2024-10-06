<?php
session_start();
include "../pages/db_conn.php";

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}
// Fetch all transactions
$query = "SELECT t.*, u.name AS username FROM transactions t JOIN users u ON t.user_id = u.id";
$stmt = $conn->prepare($query);
$stmt->execute();
$transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Transactions</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f4f4f4;
        }
        .view-users-btn {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <h1>Admin Panel - Manage Transactions</h1>
    <a href="view_users.php" class="view-users-btn">View Users</a>
    <table>
        <tr>
            <th>Transaction ID</th>
            <th>User</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Type</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($transactions as $transaction): ?>
        <tr>
            <td><?= $transaction['id'] ?></td>
            <td><?= $transaction['username'] ?></td>
            <td>$<?= number_format($transaction['amount'], 2) ?></td>
            <td><?= $transaction['status'] ?></td>
            <td><?= $transaction['type'] ?></td>
           
            <td>
                <a href="admin_edit.php?id=<?= $transaction['id'] ?>">Edit</a> | 
                <a href="admin_delete.php?id=<?= $transaction['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>