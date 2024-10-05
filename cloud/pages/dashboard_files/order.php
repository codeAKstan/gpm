<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}
include "../db_conn.php";

$query = "SELECT balance, withdraw, roi FROM portfolio WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->execute([$_SESSION['user_id']]);
$portfolio = $stmt->fetch(PDO::FETCH_ASSOC);

// Get plan details from URL
$planName = isset($_GET['planName']) ? htmlspecialchars($_GET['planName'], ENT_QUOTES, 'UTF-8') : 'Unknown Plan';
$priceRange = isset($_GET['priceRange']) ? htmlspecialchars($_GET['priceRange'], ENT_QUOTES, 'UTF-8') : 'Unknown Price Range';

// Extract minimum price from the price range if it's a string
$minPrice = preg_match('/(\d+)/', $priceRange, $matches) ? (float)$matches[1] : 0;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
    <link rel="stylesheet" href="styles.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/c1fbfe0463.js" crossorigin="anonymous"></script>
    <style>
         .investment-container {
    max-width: 700px;
    background-color: white;
    margin: 20px auto;
    padding: 20px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

.investment-header {
    text-align: left;
    margin-bottom: 20px;
}

.investment-header h2 {
    font-size: 18px;
    color: #333;
    letter-spacing: 1px;
}

.investment-header span {
    font-size: 14px;
    color: #666;
}

.investment-form {
    margin-top: 20px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    font-size: 14px;
    color: #666;
    margin-bottom: 10px;
}

input[type="text"],
input[type="number"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
}

input[readonly] {
    background-color: #f9f9f9;
}

.balance-group {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.balance-group input {
    flex-grow: 1;
    margin-right: 10px;
}

.balance-group span {
    white-space: nowrap;
}

.invest-button {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
}

.invest-button:hover {
    background-color: #0056b3;
}

.error-message {
    color: red;
    font-size: 14px;
    margin-top: 10px;
    display: none; /* Hidden by default */
}

/* Mobile responsiveness */
@media (max-width: 600px) {
    .balance-group {
        flex-direction: column;
        align-items: flex-start;
    }

    .balance-group span {
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
                <img src="img/user.png" alt="user" onclick='window.location.href="profile.php"' class="icon">
                </div>
            </header>

        <div class="investment-container">
            <div class="investment-header">
                <h2><?= htmlspecialchars($planName, ENT_QUOTES, 'UTF-8') ?></h2>
                <span><?= htmlspecialchars($priceRange, ENT_QUOTES, 'UTF-8') ?></span>
            </div>
            <div class="investment-form">
                <div class="form-group">
                    <label for="balance">Account Balance</label>
                    <div class="balance-group">
                        <input type="text" id="balance" name="balance" value="<?= number_format($portfolio['balance'], 2) ?>" readonly>
                        <span>$</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="amount">Amount (USD)</label>
                    <input type="number" id="amount" name="amount">
                    <div id="error-message" class="error-message"></div>
                </div>
                <div class="form-group">
                    <button class="invest-button" id="invest-btn">Invest Now</button>
                </div>
            </div>
        </div>
    </div>

<script>
    const balance = <?= (float)$portfolio['balance'] ?>;
    const minPrice = <?= $minPrice ?>;

    document.getElementById('invest-btn').addEventListener('click', function (e) {
        const amount = parseFloat(document.getElementById('amount').value);
        const errorMessage = document.getElementById('error-message');

        // Reset error message visibility
        errorMessage.style.display = 'none';

        if (isNaN(amount)) {
            errorMessage.textContent = "Please enter a valid amount.";
            errorMessage.style.display = 'block';
            return;
        }

        if (amount > balance) {
            errorMessage.textContent = "Insufficient balance.";
            errorMessage.style.display = 'block';
            return;
        }

        if (amount < minPrice) {
            errorMessage.textContent = `Amount must be at least $${minPrice.toFixed(2)}.`;
            errorMessage.style.display = 'block';
            return;
        }

        // Submit the form via AJAX to the backend for processing
        fetch('process_investment.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                amount: amount
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Investment successful!');
                window.location.href = "myinvest.php";  // Redirect to investments page after success
            } else {
                errorMessage.textContent = data.message;
                errorMessage.style.display = 'block';
            }
        })
        .catch((error) => {
            console.error('Error:', error);
            errorMessage.textContent = "An error occurred. Please try again.";
            errorMessage.style.display = 'block';
        });
    });
</script>

</body>
</html>
