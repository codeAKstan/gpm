<?php
session_start();
include "../pages/db_conn.php";

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch all users with their portfolio details
$query = "SELECT u.*, p.balance, p.roi, p.withdraw
          FROM users u 
          LEFT JOIN portfolio p ON u.id = p.user_id";
$stmt = $conn->prepare($query);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - View Users</title>
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
        .tran-btn {
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
    <h1>Admin Panel - View Users</h1>
    <a href="admin.php" class="tran-btn">View Transactions</a>
    <table>
        <tr>
            <th>User ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Country</th>
            <th>Password</th>
            <th>Balance</th>
            <th>Withdrawal</th>
            <th>ROI</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['name'] ?></td>
            <td><?= $user['email'] ?></td>
            <td><?= $user['country'] ?></td>
            <td><?= $user['password'] ?></td>
            <td>$<?= number_format($user['balance'], 2) ?></td>
            <td>$<?= number_format($user['withdraw'], 2) ?></td>
            <td>$<?= number_format($user['roi'], 2) ?></td>
            <td>
                <a href="admin_edit_user.php?id=<?= $user['id'] ?>">Edit</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
