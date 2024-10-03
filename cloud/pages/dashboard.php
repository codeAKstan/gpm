<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

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
                    <a href="#">Dashboard</a>
                </div>
                <div class="menu-item">
                    <i class='bx bxs-wallet'></i>
                    <a href="#">Withdrawal</a>
                </div>
                <div class="menu-item">
                    <i class="icon">💵</i>
                    <a href="#">Deposit</a>
                </div>
                <div class="menu-item">
                    <i class="icon">📈</i>
                    <a href="#">Invest</a>
                </div>
                <div class="menu-item">
                    <i class="icon">🏦</i>
                    <a href="#">Active Investments</a>
                </div>
                <div class="menu-item">
                    <i class="icon">👤</i>
                    <a href="#">Profile</a>
                </div>
                <div class="menu-item">
                    <i class="icon">📞</i>
                    <a href="#">Support</a>
                </div>
                <div class="menu-item">
                    <i class="icon">📜</i>
                    <a href="#">Genealogy</a>
                </div>
                <div class="menu-item">
                    <i class="icon">🔓</i>
                    <a href="#">Logout</a>
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
                    <img src="dashboard_files/img/user.png" alt="user" class="icon">
                </div>
            </header>

            <!-- Top Section -->
            <div class="top-section">
                <div class="card">
                    <h3>$0.00</h3>
                    <p>BALANCE</p>
                </div>
                <div class="card">
                    <h3>$0.00</h3>
                    <p>ACTIVE INVESTMENT</p>
                </div>
                <div class="card">
                    <h3>$0.00</h3>
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
                <p>It pays to have friends:</p>
                <a href="https://nexohorizon.org/cloud/pages/signup?ref=80517590479" target="_blank">https://nexohorizon.org/cloud/pages/signup?ref=80517590479</a>
                <button class="copy-btn">Copy</button>
                <p><i class="icon">👤</i> 0 Referred</p>
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
</body>
</html>
