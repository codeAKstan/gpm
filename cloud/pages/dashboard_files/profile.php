<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

include "../db_conn.php";

// Fetch user details from the database
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$user_id]);

// Check if the user exists
if ($stmt->rowCount() > 0) {
    $user = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch the user data
} else {
    // If user not found, redirect to login
    header("Location: ../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="styles.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/c1fbfe0463.js" crossorigin="anonymous"></script>
    <style>
        .profile-container { max-width: 1200px; margin: 50px auto; display: flex; justify-content: space-between; }
        .profile, .password, .kyc { background-color: #fff; border-radius: 10px; box-shadow: 0 0 15px rgba(0, 0, 0, 0.1); padding: 20px; width: 48%; margin-bottom: 20px; }
        .profile h2, .password h2, .kyc h2 { font-size: 18px; margin-bottom: 20px; color: #333; letter-spacing: 1px; }
        .profile .form-group, .password .form-group, .kyc .form-group { display: flex; flex-direction: column; margin-bottom: 15px; }
        .profile input, .password input, .kyc input, .kyc select { padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 5px; background-color: #f5f5f5; color: #333; }
        .profile input[readonly], .kyc input[type="file"] { background-color: #e9ecef; }
        .profile input::placeholder, .password input::placeholder, .kyc input::placeholder { color: #888; }
        .btn-update, .btn-password, .btn-upload { background-color: #007bff; color: white; border: none; padding: 10px; font-size: 16px; border-radius: 5px; cursor: pointer; width: 150px; }
        .btn-update:hover, .btn-password:hover, .btn-upload:hover { background-color: #0056b3; }
        @media (max-width: 768px) { .profile-container { flex-direction: column; align-items: center; } .profile, .password, .kyc { width: 100%; } }
    </style>
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <nav class="sidebar" id="sidebar">
            <div class="close-btn" id="close-btn"><i class="icon">✖</i></div>
            <div class="menu">
                <div class="menu-item"><i class="bx bxs-dashboard"></i><a href="../dashboard.php">Dashboard</a></div>
                <div class="menu-item"><i class='bx bxs-wallet'></i><a href="withdraw.php">Withdrawal</a></div>
                <div class="menu-item"><i class='bx bx-credit-card-alt'></i><a href="deposit.php">Deposit</a></div>
                <div class="menu-item"><i class='bx bx-line-chart'></i><a href="invest.php">Invest</a></div>
                <div class="menu-item"><i class='bx bxs-bank'></i><a href="myinvest.php">Investments</a></div>
                <div class="menu-item"><i class="bx bxs-user-circle"></i><a href="profile.php">Profile</a></div>
                <div class="menu-item"><i class='bx bx-support'></i><a href="support.php">Support</a></div>
                <div class="menu-item"><i class='bx bxs-notepad'></i><a href="genealogy.php">Genealogy</a></div>
                <div class="menu-item"><i class='bx bx-log-out'></i><a href="logout.php">Logout</a></div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <header class="header">
                <div class="menu-toggle" id="menu-toggle"><i class="icon">☰</i></div>
                <div class="user-icon">
                    <img src="img/user.png" alt="user" onclick='window.location.href="profile.php"' class="icon">
                </div>
            </header>

            <div class="profile-container">
                <!-- Profile Section -->
                <div class="profile">
                    <h2>PROFILE</h2>
                    <div class="form-group"><input type="text" value="<?= htmlspecialchars($user['name']) ?>" readonly></div>
                    <div class="form-group"><input type="text" value="<?= htmlspecialchars($user['username']) ?>" readonly></div>
                    <div class="form-group"><input type="email" value="<?= htmlspecialchars($user['email']) ?>" readonly></div>
                    <div class="form-group"><input type="text" value="<?= htmlspecialchars($user['country']) ?>" readonly></div>
                    <div class="form-group"><input type="text" value="<?= htmlspecialchars($user['phone_number']) ?>" readonly></div>
                    <!-- <button class="btn-update">Update</button> -->
                </div>

                <!-- Password Update Section -->
                <div class="password">
                <?php if (isset($_GET['error'])): ?>
    <div class="alert alert-danger" style="color:red; background-color:#eba8aa;padding:10px;">
        <?php echo htmlspecialchars($_GET['error']); ?>
    </div>
<?php elseif (isset($_GET['success'])): ?>
    <div class="alert alert-success" style="color:green;background-color:#b9eba8;padding:10px;">
        <?php echo htmlspecialchars($_GET['success']); ?>
    </div>
<?php endif; ?>


                    <h2>UPDATE PASSWORD</h2>
                    <form action="update_password.php" method="POST">
                        <div class="form-group"><input type="password" name="old_password" placeholder="Old Password"></div>
                        <div class="form-group"><input type="password" name="new_password" placeholder="New Password"></div>
                        <div class="form-group"><input type="password" name="confirm_password" placeholder="Confirmation Password"></div>
                        <button class="btn-password" type="submit">Change Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // JavaScript to handle menu toggle
        document.getElementById('menu-toggle').addEventListener('click', function () {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        });

        // JavaScript to handle close button in the sidebar
        document.getElementById('close-btn').addEventListener('click', function () {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        });
    </script>
</body>
</html>
