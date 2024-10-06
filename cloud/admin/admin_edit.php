<?php
session_start();
include "../pages/db_conn.php";

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

// Get transaction ID from the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the transaction details
    $query = "SELECT * FROM transactions WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$id]);
    $transaction = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$transaction) {
        echo "Transaction not found.";
        exit();
    }
} else {
    echo "Invalid request.";
    exit();
}

// Update the transaction if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_status = $_POST['status'];
    $new_balance = (float)$_POST['balance'];

    // Update the transaction status
    $updateQuery = "UPDATE transactions SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->execute([$new_status, $id]);

    // If the transaction is confirmed, update the user's portfolio balance
    if ($new_status == 'completed') {
        $userId = $transaction['user_id'];
        $transactionAmount = (float)$transaction['amount'];

        // Check if the transaction is a withdraw or deposit
        if ($transaction['type'] == 'withdrawal') {
            // Subtract from balance if it's a withdrawal
            $updateBalance = "UPDATE portfolio SET balance = balance - ? WHERE user_id = ?";
            $stmt = $conn->prepare($updateBalance);
            $stmt->execute([$transactionAmount, $userId]);
        } elseif ($transaction['type'] == 'deposit') {
            // Add to balance if it's a deposit
            $updateBalance = "UPDATE portfolio SET balance = balance + ? WHERE user_id = ?";
            $stmt = $conn->prepare($updateBalance);
            $stmt->execute([$transactionAmount, $userId]);
        }
    }

    echo "Transaction updated successfully.";
    header("Location: admin.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transaction</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h1 {
            text-align: center;
            font-size: 24px;
            color: #333;
        }

        label {
            font-size: 14px;
            color: #555;
            margin-top: 10px;
            display: block;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin: 5px 0 15px;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <form method="POST" action="admin_edit.php?id=<?= $transaction['id'] ?>">
        <h1>Edit Transaction</h1>

        <input type="hidden" name="transaction_id" value="<?= $transaction['id'] ?>"> <!-- Hidden field for transaction ID -->

        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="pending" <?= $transaction['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
            <option value="completed" <?= $transaction['status'] == 'completed' ? 'selected' : '' ?>>Confirmed</option>
            <option value="failed" <?= $transaction['status'] == 'failed' ? 'selected' : '' ?>>Declined</option>
        </select>

        <label for="balance">Balance Update (if confirmed):</label>
        <input type="number" name="balance" id="balance" value="<?= $transaction['amount'] ?>" required>

        <button type="submit">Update Transaction</button>
    </form>
</body>
</html>

