<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
include "db_conn.php";

$query = "SELECT balance, withdraw, roi FROM portfolio WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->execute([$_SESSION['user_id']]);
$portfolio = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard_files/styles.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/c1fbfe0463.js" crossorigin="anonymous"></script>
    <style>
           .referral-link {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-top: 10px;
      padding: 10px;
      background-color: #e0e7ff;
      border-radius: 5px;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    .referral-link input {
      border: none;
      background-color: transparent;
      font-size: 14px;
      color: #333;
      width: 100%;
    }

    .copy-button {
      padding: 5px 10px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    @media (max-width: 768px) {

      .referral-link {
        flex-direction: column;
        align-items: flex-start;
      }

      .copy-button {
        margin-top: 10px;
      }
    }
    </style>
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
                    <a href="">Dashboard</a>
                </div>
                <div class="menu-item">
                    <i class='bx bxs-wallet'></i>
                    <a href="dashboard_files/withdraw.php">Withdrawal</a>
                </div>
                <div class="menu-item">
                <i class='bx bx-credit-card-alt' ></i>
                    <a href="dashboard_files/deposit.php">Deposit</a>
                </div>
                <div class="menu-item">
                <i class='bx bx-line-chart' ></i>
                    <a href="dashboard_files/invest.php">Invest</a>
                </div>
                <div class="menu-item">
                <i class='bx bxs-bank'></i>
                    <a href="dashboard_files/myinvest.php">Investments</a>
                </div>
                <div class="menu-item">
                    <i class="bx bxs-user-circle"></i>
                    <a href="dashboard_files/profile.php">Profile</a>
                </div>
                <div class="menu-item">
                <i class='bx bx-support' ></i>
                    <a href="dashboard_files/support.php">Support</a>
                </div>
                <div class="menu-item">
                <i class='bx bxs-notepad' ></i>
                    <a href="dashboard_files/genealogy.php">Genealogy</a>
                </div>
                <div class="menu-item">
                <i class='bx bx-log-out' ></i>
                    <a href="dashboard_files/logout.php">Logout</a>
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
                    <img src="dashboard_files/img/user.png" alt="user" onclick='window.location.href="dashboard_files/profile.php"' class="icon">
                </div>
            </header>

            <!-- Top Section -->
            <div class="top-section">
                <div class="card">
                    <h3>$<?= number_format($portfolio['balance'], 2) ?></h3>
                    <p>BALANCE</p>
                </div>
                <div class="card">
                    <h3>$<?= number_format($portfolio['roi'], 2) ?></h3>
                    <p>ACTIVE INVESTMENT</p>
                </div>
                <div class="card">
                    <h3>$<?= number_format($portfolio['withdraw'], 2) ?></h3>
                    <p>WITHDRAWN</p>
                </div>
                <div class="card">
                    <h3>0</h3>
                    <p>REFERRED</p>
                </div>
            </div>

            <!-- Referral Section -->
            <div class="referral-section">
                <h2>Refer friends and earn 💰</h2>
                <div class="referral-link">
        <input type="text" value="https://gpm.com/cloud/pages/signup?ref=80517590479" readonly>
        <button class="copy-button">Copy</button>
      </div>
                <!-- <p><i class="bx bxs-user"></i> 0 Referred</p> -->
            </div>

            <!-- Stock Section -->
            <div class="stock-section">
                <section class="mb-4 mb-lg-4">
                    <div class="col-md-6 col-sm-12">
                        <div class="tradingview-widget-container">
                            <div class="tradingview-widget-container__widget"></div>
                            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-hotlists.js" async>
                                {
                                "exchange": "US",
                                "showChart": true,
                                "locale": "en",
                                "largeChartUrl": "",
                                "width": "350",
                                "height": "450",
                                "plotLineColorGrowing": "rgba(60, 188, 152, 1)",
                                "plotLineColorFalling": "rgba(255, 74, 104, 1)",
                                "gridLineColor": "rgba(242, 243, 245, 1)",
                                "scaleFontColor": "rgba(214, 216, 224, 1)",
                                "belowLineFillColorGrowing": "rgba(60, 188, 152, 0.05)",
                                "belowLineFillColorFalling": "rgba(255, 74, 104, 0.05)",
                                "symbolActiveColor": "rgba(242, 250, 254, 1)"
                                }
                            </script>
                        </div>
                    </div>
                </section>
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
       <script>
    document.querySelector('.copy-button').addEventListener('click', function () {
      const referralLink = document.querySelector('.referral-link input');
      referralLink.select();
      referralLink.setSelectionRange(0, 99999); // For mobile devices
      navigator.clipboard.writeText(referralLink.value);
      alert('Referral link copied!');
    });
  </script>
</body>
</html>
