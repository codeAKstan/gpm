<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

include('../db_conn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];

    // Update user profile
    $query = "UPDATE users SET email = ?, phone_number = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssi", $email, $phone_number, $user_id);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Profile updated successfully!";
    } else {
        $_SESSION['error'] = "Failed to update profile.";
    }

    $stmt->close();
    $conn->close();

    header("Location: profile.php");
    exit;
}
?>
