<?php
include("db_connect.php");
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$sql = "SELECT * FROM product";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="dashboard.css?v=6">
    <style>
        .product-page {
            width: 88%;
            max-width: 1200px;
            margin: 30px auto;
        }

        .product-wrap {
            background: rgba(255,255,255,0.78);
            backdrop-filter: blur(12px);
            border-radius: 22px;
            padding: 28px;
            box-shadow: 0 10px 24px rgba(15, 23, 42, 0.12);
        }

        .product-wrap h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #0f172a;
            font-size: 36px;
        }

        .product-desc {
            text-align: center;
            color: #475569;
            font-size: 16px;
            margin-bottom: 24px;
        }

        .product-table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
            overflow: hidden;
            border-radius: 14px;
        }

        .product-table th {
            background: linear-gradient(135deg, rgba(31,58,86,0.95), rgba(165,172,184,0.95));
            color: white;
            padding: 14px;
            font-size: 15px;
            font-weight: 600;
        }

        .product-table td {
            padding: 14px;
            border-bottom: 1px solid rgba(229, 231, 235, 0.9);
            background: rgba(255,255,255,0.88);
            font-size: 15px;
        }

        .product-table tr:hover td {
            background: rgba(249, 250, 251, 0.95);
        }

        .back-btn {
            display: inline-block;
            margin-top: 22px;
            padding: 12px 18px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 12px;
            font-weight: 600;
        }

        .back-btn:hover {
            background: #1d4ed8;
        }
    </style>
</head>
<body>

    <div class="bg-blur one"></div>
    <div class="bg-blur two"></div>

    <div class="header">
        <div class="header-left">
            <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
            <p>Product Information Panel</p>
        </div>

        <div class="header-right">
            <div class="status-pill">
                <span class="status-dot"></span>
                Monitoring Active
            </div>
            <a href="dashboard.php">
                <button class="logout">Back</button>
            </a>
        </div>
    </div>

    <div class="product-page">
        <div class="product-wrap">
            <h2>Product Details</h2>
            <p class="product-desc">This section shows registered smart monitoring devices and their descriptions.</p>

            <table class="product-table">
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Description</th>
                </tr>

                <?php
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . htmlspecialchars($row['id']) . "</td>
                                <td>" . htmlspecialchars($row['name']) . "</td>
                                <td>" . htmlspecialchars($row['description']) . "</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No product details found</td></tr>";
                }
                ?>
            </table>

            <a href="dashboard.php" class="back-btn">← Back to Dashboard</a>
        </div>
    </div>

</body>
</html>