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
    <style>
         .g-container {
      max-width: 1200px;
      margin: 20px auto;
      padding: 20px;
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
      flex-wrap: wrap;
    }

    .card {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      background-color: #f2f2f2;
      padding: 10px;
      width: 150px;
      border-radius: 10px;
      text-align: center;
      margin: 10px;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    .card p {
      margin: 5px 0;
    }

    .card .amount {
      font-size: 24px;
      font-weight: bold;
    }

    .referral-section {
      margin-top: 20px;
      padding: 20px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .referral-section h2 {
      margin-bottom: 15px;
      font-size: 18px;
    }

    .referral-section p {
      margin-bottom: 10px;
      font-size: 14px;
    }

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
      

      .card {
        width: 100%;
      }

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

        <div class="g-container">
    <div class="header">
      <div class="card">
        <p>Earned</p>
        <p class="amount">$ 0.00</p>
      </div>
      <div class="card">
        <p>Referred</p>
        <p class="amount">0</p>
      </div>
    </div>

    <div class="referral-section">
      <h2>Refer friends and earn 💰</h2>
      <p>This is just our way of saying thanks:</p>
      <div class="referral-link">
        <input type="text" value="https://stormgold.net/cloud/pages/signup?ref=80517590479" readonly>
        <button class="copy-button">Copy</button>
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
