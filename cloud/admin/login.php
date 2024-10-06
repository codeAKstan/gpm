<?php
session_start();
include "../pages/db_conn.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query admin data from the database
    $query = "SELECT * FROM admins WHERE username = ? LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->execute([$username]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($admin && md5($password) === $admin['password']) {
        $_SESSION['admin_id'] = $admin['id']; // Store admin session
        $_SESSION['admin_username'] = $admin['username'];
        header("Location: admin.php");
        exit();
    } else {
        echo "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        /* Style for centering the form */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }

        /* Styling the form */
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

        input[type="text"], input[type="password"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #007bff; /* Blue color */
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            text-align: center;
        }

        button:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
        h1 {
            text-align: center;
            font-size: 24px;
            color: #333;
        }
    </style>
</head>
<body>

    <form method="POST" action="login.php">
        <h1> ADMIN LOGIN </h1>
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required />
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required />
        <button type="submit">Login</button>
    </form>

</body>
</html>
