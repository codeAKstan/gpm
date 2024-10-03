<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genealogy</title>
    <link rel="stylesheet" href="styles.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/c1fbfe0463.js" crossorigin="anonymous"></script>
   
</head>
<body>
    <div class="container">
        
        <!-- Sidebar -->
        <nav class="sidebar" id="sidebar">
            <!-- Add Close Button ("X") -->
            <div class="close-btn" id="close-btn" >
                <i class="icon">✖</i>
            </div>
            <div class="menu">
                <div class="menu-item"> 
                    <i class="bx bxs-dashboard"></i>
                    <a href="../dashboard.php">Dashboard</a>
                </div>
                <div class="menu-item">
                    <i class='bx bxs-wallet'></i>
                    <a href="withdraw.php">Withdrawal</a>
                </div>
                <div class="menu-item">
                <i class='bx bx-credit-card-alt' ></i>
                    <a href="deposit.php">Deposit</a>
                </div>
                <div class="menu-item">
                <i class='bx bx-line-chart' ></i>
                    <a href="invest.php">Invest</a>
                </div>
                <div class="menu-item">
                <i class='bx bxs-bank'></i>
                    <a href="myinvest.php">Investments</a>
                </div>
                <div class="menu-item">
                    <i class="bx bxs-user-circle"></i>
                    <a href="profile.php">Profile</a>
                </div>
                <div class="menu-item">
                <i class='bx bx-support' ></i>
                    <a href="support.php">Support</a>
                </div>
                <div class="menu-item">
                <i class='bx bxs-notepad' ></i>
                    <a href="genealogy.php">Genealogy</a>
                </div>
                <div class="menu-item">
                <i class='bx bx-log-out' ></i>
                    <a href="logout.php">Logout</a>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <header class="header">
                <div class="menu-toggle" id="menu-toggle">
                    <i class="icon">☰</i>
                </div>
            
                <div class="user-icon">
                    <img src="img/user.png" alt="user" class="icon">
                </div>
            </header>

            


           

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
