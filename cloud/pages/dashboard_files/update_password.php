<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

if (isset($_POST['old_password']) && isset($_POST['new_password']) && isset($_POST['confirm_password'])) {
    include "../db_conn.php";

    $user_id = $_SESSION['user_id'];
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate form fields
    if (empty($old_password) || empty($new_password) || empty($confirm_password)) {
        header("Location: profile.php?error=All fields are required");
        exit;
    }

    if ($new_password !== $confirm_password) {
        header("Location: profile.php?error=Passwords do not match");
        exit;
    }

    // Fetch the current password from the database
    $sql = "SELECT password FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verify the old password (without hashing)
    if ($old_password === $user['password']) {
        // Update the password in the database
        $sql = "UPDATE users SET password = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$new_password, $user_id]);

        header("Location: profile.php?success=Password updated successfully");
        exit;
    } else {
        header("Location: profile.php?error=Old password is incorrect");
        exit;
    }
} else {
    header("Location: profile.php?error=All fields are required");
    exit;
}
?>
