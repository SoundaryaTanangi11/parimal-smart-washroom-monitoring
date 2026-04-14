<?php
include("db_connect.php");
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Dummy / demo location data
$locations = [
    [
        "id" => 1,
        "location_name" => "Washroom A - Floor 1",
        "device_id" => "PARIMAL-101",
        "status" => "Active",
        "last_updated" => date("Y-m-d H:i:s")
    ],
    [
        "id" => 2,
        "location_name" => "Washroom B - Floor 2",
        "device_id" => "PARIMAL-102",
        "status" => "Active",
        "last_updated" => date("Y-m-d H:i:s")
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location Data</title>
    <link rel="stylesheet" href="dashboard.css?v=5">
    <style>
        .location-page {
            width: 88%;
            max-width: 1200px;
            margin: 30px auto;
        }

        .location-wrap {
            background: rgba(255,255,255,0.75);
            backdrop-filter: blur(12px);
            border-radius: 20px;
            padding: 24px;
            box-shadow: 0 10px 24px rgba(15, 23, 42, 0.12);
        }

        .location-wrap h2 {
            text-align: center;
            margin-bottom: 18px;
            color: #0f172a;
            font-size: 32px;
        }

        .location-table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
            overflow: hidden;
            border-radius: 12px;
        }

        .location-table th {
            background: linear-gradient(135deg, rgba(31,58,86,0.95), rgba(165,172,184,0.95));
            color: white;
            padding: 14px;
            font-size: 15px;
        }

        .location-table td {
            padding: 14px;
            background: rgba(255,255,255,0.88);
            border-bottom: 1px solid #e5e7eb;
        }

        .back-btn {
            display: inline-block;
            margin-top: 20px;
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
            <p>Location Monitoring Panel</p>
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

    <div class="location-page">
        <div class="location-wrap">
            <h2>Location / Device Information</h2>

            <table class="location-table">
                <tr>
                    <th>ID</th>
                    <th>Location Name</th>
                    <th>Device ID</th>
                    <th>Status</th>
                    <th>Last Updated</th>
                </tr>

                <?php foreach ($locations as $loc): ?>
                    <tr>
                        <td><?php echo $loc['id']; ?></td>
                        <td><?php echo $loc['location_name']; ?></td>
                        <td><?php echo $loc['device_id']; ?></td>
                        <td><?php echo $loc['status']; ?></td>
                        <td><?php echo $loc['last_updated']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <a href="dashboard.php" class="back-btn">← Back to Dashboard</a>
        </div>
    </div>

</body>
</html>