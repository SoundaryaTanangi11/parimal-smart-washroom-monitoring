<?php
include("db_connect.php");
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 1;

// Fetch latest sensor readings
$sql = "SELECT * FROM sensor_data ORDER BY id DESC LIMIT 10";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sensor Data</title>
    <link rel="stylesheet" href="dashboard.css?v=5">
    <style>
        .sensor-page {
            width: 88%;
            max-width: 1200px;
            margin: 30px auto;
        }

        .sensor-table-wrap {
            background: rgba(255,255,255,0.75);
            backdrop-filter: blur(12px);
            border-radius: 20px;
            padding: 24px;
            box-shadow: 0 10px 24px rgba(15, 23, 42, 0.12);
        }

        .sensor-table-wrap h2 {
            text-align: center;
            margin-bottom: 18px;
            color: #0f172a;
            font-size: 32px;
        }

        .sensor-table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
            overflow: hidden;
            border-radius: 12px;
        }

        .sensor-table th {
            background: linear-gradient(135deg, rgba(31,58,86,0.95), rgba(165,172,184,0.95));
            color: white;
            padding: 14px;
            font-size: 15px;
        }

        .sensor-table td {
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
            <p>Sensor Monitoring Panel</p>
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

    <div class="sensor-page">
        <div class="sensor-table-wrap">
            <h2>Latest Sensor Data</h2>

            <table class="sensor-table">
                <tr>
                    <th>ID</th>
                    <th>Temperature (°C)</th>
                    <th>Humidity (%)</th>
                    <th>Gas Level</th>
                    <th>Sound (dB)</th>
                    <th>Timestamp</th>
                </tr>

                <?php
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['temperature']}</td>
                                <td>{$row['humidity']}</td>
                                <td>{$row['gas_level']}</td>
                                <td>{$row['sound_level']}</td>
                                <td>{$row['timestamp']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No sensor data found</td></tr>";
                }
                ?>
            </table>
            <canvas id="sensorChart" style="margin-top:30px;"></canvas>

            <a href="dashboard.php" class="back-btn">← Back to Dashboard</a>
        </div>
    </div>
    <!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('sensorChart').getContext('2d');

const sensorChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['1','2','3','4','5','6','7','8','9','10'],
        datasets: [
            {
                label: 'Temperature',
                data: [27,28,26.5,27.2,28.1,27,28,26.5,27.2,28.1],
                borderColor: '#ff6b6b',
                tension: 0.4
            },
            {
                label: 'Humidity',
                data: [64,63,65,62,64.5,64,63,65,62,64],
                borderColor: '#4dabf7',
                tension: 0.4
            }
        ]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                labels: { color: '#000' }
            }
        }
    }
});
</script>
</body>
</html>