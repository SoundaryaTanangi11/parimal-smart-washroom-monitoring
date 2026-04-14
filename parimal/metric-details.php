<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$type = $_GET['type'] ?? 'temperature';

$data = [
    "temperature" => [
        "title" => "Temperature Details",
        "icon" => "🌡",
        "value" => "27°C",
        "status" => "Normal",
        "description" => "The washroom temperature is within a comfortable and safe range."
    ],
    "humidity" => [
        "title" => "Humidity Details",
        "icon" => "💧",
        "value" => "64%",
        "status" => "Moderate",
        "description" => "Humidity is slightly elevated but still acceptable for washroom conditions."
    ],
    "gas" => [
        "title" => "Gas Level Details",
        "icon" => "🧪",
        "value" => "Safe",
        "status" => "Normal Air",
        "description" => "Air quality is stable and no unusual gas concentration is detected."
    ],
    "sound" => [
        "title" => "Sound Details",
        "icon" => "🔊",
        "value" => "42 dB",
        "status" => "Low",
        "description" => "Sound level indicates a calm environment with no alert-triggering noise."
    ]
];

$metric = $data[$type] ?? $data["temperature"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $metric['title']; ?></title>
    <link rel="stylesheet" href="dashboard.css?v=4">
    <style>
        .detail-card {
            max-width: 800px;
            margin: 60px auto;
            padding: 35px;
            border-radius: 24px;
        }

        .detail-card h1 {
            font-size: 38px;
            margin-bottom: 18px;
            color: #0f172a;
            text-align: center;
        }

        .detail-row {
            margin: 18px 0;
            font-size: 20px;
            color: #334155;
        }

        .back-btn {
            display: inline-block;
            margin-top: 24px;
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

    <div class="detail-card glass">
        <h1><?php echo $metric['icon'] . " " . $metric['title']; ?></h1>
        <div class="detail-row"><strong>Current Value:</strong> <?php echo $metric['value']; ?></div>
        <div class="detail-row"><strong>Status:</strong> <?php echo $metric['status']; ?></div>
        <div class="detail-row"><strong>Description:</strong> <?php echo $metric['description']; ?></div>
        <a href="dashboard.php" class="back-btn">← Back to Dashboard</a>
    </div>
</body>
</html>