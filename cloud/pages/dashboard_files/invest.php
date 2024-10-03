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
            .in-container {
      max-width: 1200px;
      margin: 20px auto;
      padding: 20px;
    }

    h2 {
      text-align: left;
      margin-bottom: 20px;
      font-size: 18px;
      color: #333;
      letter-spacing: 1px;
    }

    .plans {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
    }

    .plan {
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      width: 32%;
      padding: 20px;
      margin-bottom: 20px;
      text-align: center;
    }

    .plan h3 {
      color: #007bff;
      margin-bottom: 10px;
    }

    .plan .price {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 15px;
    }

    .plan ul {
      list-style: none;
      margin-bottom: 15px;
    }

    .plan ul li {
      margin: 10px 0;
      color: #333;
    }

    .plan ul li::before {
      content: '✔';
      color: #007bff;
      margin-right: 10px;
    }

    .plan button {
      padding: 10px 20px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    @media (max-width: 768px) {
      .plan {
        width: 100%;
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
            <div class="in-container">
    <h2>INVESTMENT PLANS</h2>
    <div class="plans">
      <div class="plan">
        <h3>BEGINNER PLAN</h3>
        <div class="price">From $300.00</div>
        <ul>
          <li>$999.00 Maximum</li>
          <li>Daily Payout</li>
          <li>10% ROI Daily</li>
          <li>Period of 30</li>
          <li>Instant Payout</li>
          <li>Instant Withdrawal</li>
        </ul>
        <button>Proceed</button>
      </div>

      <div class="plan">
        <h3>GOLD PLAN</h3>
        <div class="price">From $1,000.00</div>
        <ul>
          <li>$4,999.00 Maximum</li>
          <li>Daily Payout</li>
          <li>25% ROI Daily</li>
          <li>Period of 24</li>
          <li>Instant Payout</li>
          <li>Instant Withdrawal</li>
        </ul>
        <button>Proceed</button>
      </div>

      <div class="plan">
        <h3>PROMO PLAN</h3>
        <div class="price">From $5,000.00</div>
        <ul>
          <li>$9,999,999.00 Maximum</li>
          <li>Daily Payout</li>
          <li>45% ROI Daily</li>
          <li>Period of 3</li>
          <li>Instant Payout</li>
          <li>Instant Withdrawal</li>
        </ul>
        <button>Proceed</button>
      </div>
      <div class="plan">
        <h3>DIAMOND PLAN</h3>
        <div class="price">From $7,000.00</div>
        <ul>
          <li>$9,999,999.00 Maximum</li>
          <li>Daily Payout</li>
          <li>Deposit $10,000 get $200,000 in profit</li>
          <li>Period of 10</li>
          <li>Instant Payout</li>
          <li>Instant Withdrawal</li>
        </ul>
        <button>Proceed</button>
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
