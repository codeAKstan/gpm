<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

require '../db_conn.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Insert transaction into the database
    $user_id = $_SESSION['user_id'];
    $amount = isset($_POST['amount']) ? $_POST['amount'] : 0;
    $type = 'deposit'; 

    $sql = "INSERT INTO transactions (user_id, type, amount, status) VALUES (:user_id, :type, :amount, 'pending')";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':user_id' => $user_id,
        ':type' => $type,
        ':amount' => $amount
    ]);


    header("Location: recent_activities.php?status=pending");
    exit;
}

?>