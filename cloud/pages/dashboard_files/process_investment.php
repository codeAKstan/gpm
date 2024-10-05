<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

include "../db_conn.php";

try {
    $conn->beginTransaction();

    // Fetch user portfolio
    $query = "SELECT balance FROM portfolio WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$_SESSION['user_id']]);
    $portfolio = $stmt->fetch(PDO::FETCH_ASSOC);

    // Get the raw POST data
    $data = json_decode(file_get_contents('php://input'), true);
    $amount = (float)$data['amount']; // The amount the user wants to invest

    $newBalance = $portfolio['balance'] - $amount;

    // Ensure the user has enough balance
    if ($newBalance < 0) {
        throw new Exception("Insufficient balance for the investment.");
    }

    // Update the balance in the portfolio table
    $updateQuery = "UPDATE portfolio SET balance = ?, roi = roi + ? WHERE user_id = ?";
    $updateStmt = $conn->prepare($updateQuery);
    $updateStmt->execute([$newBalance, $amount, $_SESSION['user_id']]);

    // Insert transaction record into transactions table
    $insertQuery = "INSERT INTO transactions (user_id, type, amount, roi, status, created_at)
                    VALUES (?, 'investment', ?, ?, 'completed', NOW())";
    $insertStmt = $conn->prepare($insertQuery);
    $insertStmt->execute([$_SESSION['user_id'], $amount, $amount]);

    // Commit the transaction
    $conn->commit();
    echo json_encode(['success' => true, 'message' => 'Investment successful.']);
} catch (Exception $e) {
    // Rollback the transaction in case of error
    $conn->rollBack();
    echo json_encode(['success' => false, 'message' => 'An error occurred during the transaction: ' . $e->getMessage()]);
}
