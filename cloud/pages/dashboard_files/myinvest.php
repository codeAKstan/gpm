<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

include "../db_conn.php";

// Fetch user's investments
$query = "SELECT * FROM transactions WHERE user_id = ? AND type = 'investment'";
$stmt = $conn->prepare($query);
$stmt->execute([$_SESSION['user_id']]);
$investments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Active Investments</title>
    <link rel="stylesheet" href="styles.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/c1fbfe0463.js" crossorigin="anonymous"></script>
    <style>
        .wallet-container {
            max-width: 700px;
            background-color: white;
            margin: 20px auto;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .wallet-header {
            text-align: left;
            margin-bottom: 20px;
        }

        .wallet-header h2 {
            font-size: 18px;
            color: #333;
            letter-spacing: 1px;
        }

        .wallet-details {
            border-top: 1px solid #eee;
            border-bottom: 1px solid #eee;
            padding: 15px 0;
        }

        .wallet-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
        }

        .wallet-row .label {
            color: #d9534f;
            font-size: 16px;
            font-weight: bolder;
        }

        .wallet-row .amount {
            color: #000;
            font-size: 16px;
        }

        .withdraw-container {
            display: flex;
            justify-content: flex-end;
            margin-top: 15px;
        }

        .withdraw-button {
            background-color: #014df9;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        .withdraw-button:hover {
            background-color: #014df9;
        }

        /* Mobile responsiveness */
        @media (max-width: 600px) {
            .wallet-row {
                flex-direction: column;
                text-align: left;
            }

            .wallet-row .amount {
                margin-top: 10px;
            }

            .withdraw-container {
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <nav class="sidebar" id="sidebar">
            <div class="close-btn" id="close-btn">
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
                    <i class='bx bx-credit-card-alt'></i>
                    <a href="deposit.php">Deposit</a>
                </div>
                <div class="menu-item">
                    <i class='bx bx-line-chart'></i>
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
                    <i class='bx bx-support'></i>
                    <a href="support.php">Support</a>
                </div>
                <div class="menu-item">
                    <i class='bx bxs-notepad'></i>
                    <a href="genealogy.php">Genealogy</a>
                </div>
                <div class="menu-item">
                    <i class='bx bx-log-out'></i>
                    <a href="logout.php">Logout</a>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="main-content">
            <header class="header">
                <div class="menu-toggle" id="menu-toggle">
                    <i class="icon">☰</i>
                </div>
                <div class="user-icon">
                    <img src="img/user.png" alt="user" onclick='window.location.href="profile.php"' class="icon">
                </div>
            </header>
            <div class="wallet-container">
                <div class="wallet-header">
                    <h2>INVESTMENTS</h2>
                </div>
                <div class="wallet-details">
                    <?php if (count($investments) > 0): ?>
                        <?php foreach ($investments as $investment): ?>
                            <div class="wallet-row">
                                <span class="label">Investment Amount:</span>
                                <span class="amount">$<?= number_format($investment['amount'], 2) ?></span>
                            </div>
                            <div class="wallet-row">
                                <span class="label">Status:</span>
                                <span class="amount"><?= htmlspecialchars($investment['status'], ENT_QUOTES, 'UTF-8') ?></span>
                            </div>
                            <div class="wallet-row">
                                <span class="label">Date:</span>
                                <span class="amount"><?= htmlspecialchars($investment['created_at'], ENT_QUOTES, 'UTF-8') ?></span>
                            </div>
                            <hr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="wallet-row">
                            <span class="label">You have no investments</span>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="withdraw-container">
                    <button class="withdraw-button" onclick='window.location.href="invest.php"'>Make an Investment</button>
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
