<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Features - Parimal</title>
    <link rel="stylesheet" href="dashboard.css?v=6">
    <style>
        .features-page {
            width: 88%;
            max-width: 1200px;
            margin: 30px auto;
        }

        .features-card {
            background: rgba(255,255,255,0.76);
            backdrop-filter: blur(12px);
            border-radius: 24px;
            padding: 36px;
            box-shadow: 0 10px 24px rgba(15, 23, 42, 0.12);
        }

        .features-card h1 {
            text-align: center;
            font-size: 46px;
            color: #0f172a;
            margin-bottom: 26px;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 22px;
        }

        .feature-box {
            background: rgba(255,255,255,0.72);
            border-radius: 18px;
            padding: 24px;
            box-shadow: 0 8px 18px rgba(15, 23, 42, 0.08);
            transition: 0.25s ease;
        }

        .feature-box:hover {
            transform: translateY(-5px);
        }

        .feature-box h3 {
            font-size: 24px;
            color: #0f172a;
            margin-bottom: 10px;
        }

        .feature-box p {
            font-size: 16px;
            color: #475569;
            line-height: 1.8;
        }

        .back-btn {
            display: inline-block;
            margin-top: 26px;
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

        @media (max-width: 900px) {
            .feature-grid {
                grid-template-columns: 1fr;
            }

            .features-card h1 {
                font-size: 34px;
            }
        }
    </style>
</head>
<body>

    <div class="bg-blur one"></div>
    <div class="bg-blur two"></div>

    <div class="header">
        <div class="header-left">
            <h2>परिमळ</h2>
            <p>Smart Washroom Monitoring Features</p>
        </div>

        <div class="header-right">
            <a href="overview.php"><button class="logout" style="background:#2563eb;">Overview</button></a>
            <a href="index.php"><button class="logout">Home</button></a>
        </div>
    </div>

    <div class="features-page">
        <div class="features-card">
            <h1>Features</h1>

            <div class="feature-grid">
                <div class="feature-box">
                    <h3>🌡 Real-Time Monitoring</h3>
                    <p>Tracks temperature, humidity, gas level, and sound conditions using sensor-driven logic and dashboard visualization.</p>
                </div>

                <div class="feature-box">
                    <h3>📊 Visual Dashboard</h3>
                    <p>Displays metrics in cards, graphs, and interactive sections for clear monitoring and analysis.</p>
                </div>

                <div class="feature-box">
                    <h3>🔐 Secure Admin Login</h3>
                    <p>Provides protected admin access with login-based entry into the monitoring dashboard.</p>
                </div>

                <div class="feature-box">
                    <h3>📍 Location & Device View</h3>
                    <p>Shows location mapping and device allocation for washroom units and monitoring nodes.</p>
                </div>

                <div class="feature-box">
                    <h3>🧠 Clickable Detail Pages</h3>
                    <p>Each dashboard card can be expanded into detailed pages for deeper understanding of a particular metric.</p>
                </div>

                <div class="feature-box">
                    <h3>⚡ Demo-Ready Simulation</h3>
                    <p>Supports dummy values and simulated readings, making the system presentable even without live hardware.</p>
                </div>
            </div>

            <a href="index.php" class="back-btn">← Back to Home</a>
        </div>
    </div>

</body>
</html>