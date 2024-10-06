<?php
session_start();
include "../pages/db_conn.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "Passwords do not match.";
        exit();
    }

    // Check if username or email already exists
    $query = "SELECT * FROM admins WHERE username = ? OR email = ? LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->execute([$username, $email]);
    $existingAdmin = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existingAdmin) {
        echo "Username or email already exists.";
        exit();
    }

    // Hash the password for security
    $hashedPassword = md5($password);

    // Insert the new admin into the database
    $insertQuery = "INSERT INTO admins (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->execute([$username, $email, $hashedPassword]);

    // Redirect to admin login page after successful registration
    echo "Admin registered successfully. Redirecting to login...";
    header("refresh:2;url=login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Signup</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }

        form {
            background-color: white;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label, input {
            display: block;
            width: 100%;
            margin-bottom: 10px;
        }

        input[type="text"], input[type="password"], input[type="email"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #28a745;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            text-align: center;
        }

        button:hover {
            background-color: #218838;
        }
        h1 {
            text-align: center;
            font-size: 24px;
            color: #333;
        }
    </style>
</head>
<body>

    <form method="POST" action="signup.php">
        <h1>Admin Signup</h1>
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required />
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required />
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required />
        <label for="confirm_password">Confirm Password</label>
        <input type="password" id="confirm_password" name="confirm_password" required />
        <button type="submit">Signup</button>
        <a href="login.php">login</a>
    </form>

</body>
</html>
