<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

require '../db_conn.php';

$user_id = $_SESSION['user_id'];

// Fetch recent transactions for the logged-in user
$sql = "SELECT * FROM transactions WHERE user_id = :user_id ORDER BY created_at DESC LIMIT 10";
$stmt = $conn->prepare($sql);
$stmt->execute([':user_id' => $user_id]);
$transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Check if there is a 'status' query parameter in the URL
$pending_message = "";
if (isset($_GET['status']) && $_GET['status'] == 'pending') {
    $pending_message = "View all your transactions";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recent Activities</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .activities-container {
            max-width: 1000px;
            margin: 50px auto;
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .activities-container h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        .pending-message {
            color: orange;
            font-size: 16px;
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #f4f4f4;
        }

        .status-pending {
            color: orange;
            font-weight: bold;
        }

        .status-completed {
            color: green;
            font-weight: bold;
        }

        .status-failed {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="activities-container">
        <h2>Recent Activities</h2>

        <?php if ($pending_message): ?>
            <div class="pending-message"><?php echo $pending_message; ?></div>
        <?php endif; ?>

        <table>
            <thead>
                <tr>
                    <th>Transaction ID</th>
                    <th>Type</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($transactions): ?>
                    <?php foreach ($transactions as $transaction): ?>
                        <tr>
                            <td><?php echo $transaction['id']; ?></td>
                            <td><?php echo ucfirst($transaction['type']); ?></td>
                            <td>$<?php echo number_format($transaction['amount'], 2); ?></td>
                            <td class="status-<?php echo $transaction['status']; ?>">
                                <?php echo ucfirst($transaction['status']); ?>
                            </td>
                            <td><?php echo date("d M Y, h:i A", strtotime($transaction['created_at'])); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">No recent transactions found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <button onclick="window.location.href='../dashboard.php'">Back Home</button>
    </div>
</body>
</html>
