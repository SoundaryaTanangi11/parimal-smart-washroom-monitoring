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
    <title>Smart Washroom Dashboard</title>
    <link rel="stylesheet" href="dashboard.css?v=3">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

    <div class="bg-blur one"></div>
    <div class="bg-blur two"></div>

    <div class="header">
        <div class="header-left">
            <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
            <p>Smart Monitoring Panel</p>
        </div>

        <div class="header-right">
            <div class="status-pill">
                <span class="status-dot"></span>
                Monitoring Active
            </div>

            <div class="clock-box" id="liveClock">--:--:--</div>

            <a href="logout.php">
                <button class="logout">Logout</button>
            </a>
        </div>
    </div>

    <div class="page-wrapper">
        <div class="black-margin"></div>

        <h2 class="main-title">Smart Washroom Dashboard</h2>

        <div class="sensor-container glass" onclick="toggleDropdown()">
            <span class="sensor-label">
                <span>Sensor Data</span>
                <span class="chevron" id="chevron">▾</span>
            </span>

            <div id="dropdownMenu" class="dropdown-content">
                <a href="server_data.php">Location</a>
                <a href="sensor-data.php?id=1">Security</a>
            </div>
        </div>

        <div class="black-margin"></div>

        <div class="calendar-container">
            <input type="date" id="calendar">
        </div>

       <div class="cards-grid">
    <a href="metric-details.php?type=temperature" class="card-link">
        <div class="sensor-card glass">
            <div class="sensor-card-header">🌡 Temperature</div>
            <div class="sensor-card-body">
                <div class="sensor-box">Current Value</div>
                <div class="sensor-box">Status</div>
                <div class="sensor-value">27°C</div>
                <div class="sensor-value">🟢 Normal</div>
            </div>
            <div class="chart-wrap">
                <canvas id="tempChart"></canvas>
            </div>
        </div>
    </a>

    <a href="metric-details.php?type=humidity" class="card-link">
        <div class="sensor-card glass">
            <div class="sensor-card-header">💧 Humidity</div>
            <div class="sensor-card-body">
                <div class="sensor-box">Current Value</div>
                <div class="sensor-box">Status</div>
                <div class="sensor-value">64%</div>
                <div class="sensor-value">🟡 Moderate</div>
            </div>
            <div class="chart-wrap">
                <canvas id="humidityChart"></canvas>
            </div>
        </div>
    </a>

    <a href="metric-details.php?type=gas" class="card-link">
        <div class="sensor-card glass">
            <div class="sensor-card-header">🧪 Gas Level</div>
            <div class="sensor-card-body">
                <div class="sensor-box">Current Value</div>
                <div class="sensor-box">Status</div>
                <div class="sensor-value">Safe</div>
                <div class="sensor-value">🟢 Normal Air</div>
            </div>
            <div class="chart-wrap">
                <canvas id="gasChart"></canvas>
            </div>
        </div>
    </a>

    <a href="metric-details.php?type=sound" class="card-link">
        <div class="sensor-card glass">
            <div class="sensor-card-header">🔊 Sound</div>
            <div class="sensor-card-body">
                <div class="sensor-box">Current Value</div>
                <div class="sensor-box">Status</div>
                <div class="sensor-value">42 dB</div>
                <div class="sensor-value">🟢 Low</div>
            </div>
            <div class="chart-wrap">
                <canvas id="soundChart"></canvas>
            </div>
        </div>
    </a>
</div>

        <div class="product-section glass">
            <h3>Product Table</h3>
            <table class="product-table">
                <tr>
                    <th>ID</th>
                    <th>Product</th>
                    <th>Description</th>
                </tr>

                <?php
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td><a href='sensor-data.php?id=" . $row['id'] . "'>" . $row['id'] . "</a></td>
                                <td>" . htmlspecialchars($row['name']) . "</td>
                                <td>" . htmlspecialchars($row['description']) . "</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No products found</td></tr>";
                }
                ?>
            </table>
        </div>
    </div>

   <script>
    function toggleDropdown() {
        const menu = document.getElementById("dropdownMenu");
        const chevron = document.getElementById("chevron");
        const container = document.querySelector('.sensor-container');

        menu.classList.toggle("show");
        chevron.classList.toggle("rotate");
        container.classList.toggle("open");
    }

    window.onclick = function(event) {
        const dropdown = document.getElementById("dropdownMenu");
        const chevron = document.getElementById("chevron");
        const container = document.querySelector('.sensor-container');

        if (!event.target.closest('.sensor-container')) {
            if (dropdown.classList.contains('show')) {
                dropdown.classList.remove('show');
                chevron.classList.remove('rotate');
                container.classList.remove('open');
            }
        }
    };

    document.getElementById("calendar").valueAsDate = new Date();

    function updateClock() {
        const now = new Date();
        const time = now.toLocaleTimeString();
        document.getElementById("liveClock").textContent = time;
    }

    setInterval(updateClock, 1000);
    updateClock();

    const commonOptions = {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: { display: false }
        },
        scales: {
            x: {
                grid: { display: false }
            },
            y: {
                beginAtZero: false
            }
        }
    };

    new Chart(document.getElementById('tempChart'), {
        type: 'line',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
            datasets: [{
                label: 'Temperature',
                data: [25, 26, 27, 26, 28, 27],
                borderColor: '#2563eb',
                backgroundColor: 'rgba(37, 99, 235, 0.12)',
                fill: true,
                tension: 0.4
            }]
        },
        options: commonOptions
    });

    new Chart(document.getElementById('humidityChart'), {
        type: 'line',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
            datasets: [{
                label: 'Humidity',
                data: [58, 60, 62, 64, 63, 64],
                borderColor: '#14b8a6',
                backgroundColor: 'rgba(20, 184, 166, 0.12)',
                fill: true,
                tension: 0.4
            }]
        },
        options: commonOptions
    });

    new Chart(document.getElementById('gasChart'), {
        type: 'bar',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
            datasets: [{
                label: 'Gas',
                data: [10, 12, 9, 11, 13, 10],
                backgroundColor: 'rgba(245, 158, 11, 0.5)',
                borderColor: '#f59e0b',
                borderWidth: 1
            }]
        },
        options: commonOptions
    });

    new Chart(document.getElementById('soundChart'), {
        type: 'line',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
            datasets: [{
                label: 'Sound',
                data: [38, 40, 42, 41, 43, 42],
                borderColor: '#8b5cf6',
                backgroundColor: 'rgba(139, 92, 246, 0.12)',
                fill: true,
                tension: 0.4
            }]
        },
        options: commonOptions
    });
</script>

</body>
</html>