<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

// Capture the payment method and amount from the POST request
$payment_method = isset($_POST['payment_method']) ? $_POST['payment_method'] : 'Unknown';
$amount = isset($_POST['amount']) ? $_POST['amount'] : '0.00';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wallet deposit</title>
    <link rel="stylesheet" href="styles.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/c1fbfe0463.js" crossorigin="anonymous"></script>
    <style>
          .investment-container {
      max-width: 1000px;
      margin: 50px auto;
      background-color: #fff;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    .investment-container h2 {
      font-size: 20px;
      color: #333;
      margin-bottom: 20px;
      text-align: center;
    }

    .instructions {
      font-size: 16px;
      color: #555;
      line-height: 1.8;
      margin-bottom: 30px;
      text-align: center;
    }

    .instructions p {
      margin-bottom: 10px;
    }

    .investment-details {
      text-align: center;
      margin-bottom: 30px;
    }

    .investment-details h3 {
      font-size: 22px;
      color: #333;
      margin-bottom: 10px;
    }

    .investment-details .amount {
      font-size: 18px;
      color: #555;
      margin-bottom: 10px;
    }

    .wallet-address {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-bottom: 20px;
    }

    .wallet-address input {
      width: 450px;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #f5f5f5;
      text-align: center;
      color: #333;
      margin-right: 10px;
    }

    .btn-copy {
      background-color: #007bff;
      color: white;
      border: none;
      padding: 10px 15px;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
    }

    .btn-copy:hover {
      background-color: #0056b3;
    }

    .btn-save {
      background-color: #007bff;
      color: white;
      border: none;
      padding: 12px 30px;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
      display: block;
      margin: 0 auto;
    }

    .btn-save:hover {
      background-color: #0056b3;
    }

    .save-section {
      text-align: center;
      margin-top: 20px;
    }

    @media (max-width: 768px) {
      .wallet-address {
        flex-direction: column;
      }

      .wallet-address input {
        margin-bottom: 10px;
        width: 100%;
      }

      .btn-copy {
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
                <img src="img/user.png" alt="user" onclick='window.location.href="profile.php"' class="icon">
                </div>
            </header>
            <div class="investment-container">
                <h2>Confirm Investment</h2>
                <div class="instructions">
                    <p>Please kindly copy the wallet address below and send exactly $<strong><?php echo $amount . " in " . $payment_method; ?></strong> to it.</p>
                    <p>After sending the payment, click on the "Save" button.</p>
                    <p>Be patient while the system automatically confirms your payment.</p>
                </div>

                <div class="investment-details">
                    <h3>Send Exactly</h3>
                    <p class="amount"><strong>$<?php echo $amount . " in " . $payment_method; ?></strong></p>
                    <p><?php echo $payment_method; ?> network to</p>
                </div>

                <div class="wallet-address">
                    <input type="text" value="1NPJrcVGF7NLKxut8EscGcVNRMxBbRnjAn" readonly>
                    <button class="btn-copy">Copy Wallet Address</button>
                </div>

                <form action="wallet.php" method="post">
    <input type="hidden" name="amount" value="<?php echo $amount; ?>">
    <input type="hidden" name="payment_method" value="<?php echo $payment_method; ?>">
    <div class="save-section">
        <button class="btn-save">SAVE</button>
    </div>
</form>

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
    document.querySelector('.btn-copy').addEventListener('click', function () {
      const referralLink = document.querySelector('.wallet-address input');
      referralLink.select();
      referralLink.setSelectionRange(0, 99999); // For mobile devices
      navigator.clipboard.writeText(referralLink.value);
      alert('Address copied!');
    });
  </script>
 
</body>
</html>
