<?php


session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

require '../db_conn.php'; 

// Retrieve user ID from session
$user_id = $_SESSION['user_id'];

// Get the input data from the form
$payment_method = isset($_POST['payment_method']) ? $_POST['payment_method'] : '';
$withdraw_address = isset($_POST['address']) ? $_POST['address'] : '';
$withdraw_amount = isset($_POST['amount']) ? (float) $_POST['amount'] : 0.00;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Check the user's current balance from the portfolio table
        $sql = "SELECT balance FROM portfolio WHERE user_id = :user_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':user_id' => $user_id]);
        $portfolio = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$portfolio) {
            throw new Exception('Portfolio not found for this user.');
        }

        $current_balance = (float)$portfolio['balance'];

        // Check if balance is greater than zero and withdrawal amount is valid
        if ($current_balance <= 0) {
            throw new Exception('Insufficient balance. You cannot withdraw at this time.');
        }

        if ($withdraw_amount > $current_balance) {
            throw new Exception('The withdrawal amount is greater than your current balance.');
        }

        // Proceed with withdrawal, subtract the amount from balance and store in transactions
        $new_balance = $current_balance - $withdraw_amount;

        // Start a transaction
        $conn->beginTransaction();
        $transaction_started = true;  // Flag to indicate transaction has started

        // Update the portfolio balance
        $update_sql = "UPDATE portfolio SET balance = :new_balance WHERE user_id = :user_id";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->execute([
            ':new_balance' => $new_balance,
            ':user_id' => $user_id
        ]);

        // Insert the withdrawal transaction into the transactions table
        $transaction_sql = "INSERT INTO transactions (user_id, type, amount, status, payment_method, payment_address) 
                            VALUES (:user_id, 'withdrawal', :amount, 'pending', :payment_method, :payment_address)";
        $transaction_stmt = $conn->prepare($transaction_sql);
        $transaction_stmt->execute([
            ':user_id' => $user_id,
            ':amount' => $withdraw_amount,
            ':payment_method' => $payment_method,
            ':payment_address' => $withdraw_address
        ]);

        // Commit the transaction
        $conn->commit();
        $transaction_started = false;  // Reset flag after successful commit

        // Redirect to recent activities page with pending message
        header("Location: recent_activities.php?status=pending");
        exit;

    } catch (Exception $e) {
        // Rollback if any error occurs, and if a transaction had been started
        if (isset($transaction_started) && $transaction_started) {
            $conn->rollBack();
        }

        // Display the error (you can also log this error)
        echo "Error: " . $e->getMessage();
    }
}
