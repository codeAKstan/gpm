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
    <title>Deposit</title>
    <link rel="stylesheet" href="styles.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/c1fbfe0463.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Include jQuery (needed for Select2) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <style>

    .deposit-container {
      max-width: 800px;
      margin: 50px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: left;
      margin-bottom: 20px;
      font-size: 18px;
      color: #333;
      letter-spacing: 1px;
    }

    .form-group {
      display: flex;
      justify-content: space-between;
      margin-bottom: 15px;
      align-items: center;
    }

    .form-group select,
    .form-group input {
      width: 70%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
      color: #333;
    }

    .form-group .currency {
      font-size: 18px;
      font-weight: bold;
      padding-left: 10px;
      color: #333;
    }

    .form-group input[readonly] {
      background-color: #f5f5f5;
      text-align: right;
      color: #333;
    }

    .btn-deposit {
      width: 30%;
      background-color: #007bff;
      color: white;
      border: none;
      padding: 10px 20px;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
    }

    .btn-deposit:hover {
      background-color: #0056b3;
    }
    .img-flag {
      width: 15px;
      height: 15px;
      margin-right: 10px;
    }

    @media (max-width: 768px) {
      .form-group {
        flex-direction: column;
        align-items: flex-start;
      }

      .form-group select,
      .form-group input,
      .btn-deposit {
        width: 100%;
        margin-top: 10px;
      }

      .currency {
        padding: 0;
        margin-top: 10px;
        text-align: left;
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
                <img src="img/user.png" alt="user" onclick='window.location.href="profile.php"' class="icon">
                </div>
            </header>

            <div class="deposit-container">
    <h2>ACCOUNT DEPOSIT</h2>
    <div class="form-group">
    <select id="payment-method" style="width: 100%;">
    <option value="">--Select Payment Method--</option>
    <option data-image="img/btc.png">Bitcoin</option>
    <option data-image="img/usdt.png">USDT</option>
    <option data-image="img/eth.png">Ethereum</option>
    <option data-image="img/paypal.png">Paypal</option>
    <option data-image="img/skrill.png">Skrill</option>
    <option data-image="img/cashapp.png">Cash App</option>
    <option data-image="img/venmo.png">Venmo</option>
  </select>
      <input type="text" readonly value="$ 0.00" class="currency">
    </div>

    <div class="form-group">
      <input type="number" placeholder="Amount (USD)">
    </div>

    <div class="form-group">
      <button class="btn-deposit">Deposit Now</button>
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
    $(document).ready(function() {
      function formatState(state) {
        if (!state.id) {
          return state.text; // Return without changes for placeholder option
        }
        var $state = $(
          '<span><img src="' + $(state.element).attr('data-image') + '" class="img-flag" />' + state.text + '</span>'
        );
        return $state;
      }

      $('#payment-method').select2({
        templateResult: formatState,
        templateSelection: formatState,
        minimumResultsForSearch: Infinity // Hide search box
      });
    });
  </script>
</body>
</html>
