<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overview - Parimal</title>
    <link rel="stylesheet" href="dashboard.css?v=6">
    <style>
        .info-page {
            width: 88%;
            max-width: 1200px;
            margin: 30px auto;
        }

        .info-card {
            background: rgba(255,255,255,0.76);
            backdrop-filter: blur(12px);
            border-radius: 24px;
            padding: 36px;
            box-shadow: 0 10px 24px rgba(15, 23, 42, 0.12);
        }

        .info-card h1 {
            text-align: center;
            font-size: 46px;
            color: #0f172a;
            margin-bottom: 22px;
        }

        .info-card p {
            font-size: 19px;
            line-height: 1.9;
            color: #334155;
            margin-bottom: 18px;
        }

        .highlight-boxes {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-top: 26px;
        }

        .highlight-box {
            background: rgba(255,255,255,0.72);
            border-radius: 18px;
            padding: 22px;
            text-align: center;
            box-shadow: 0 8px 18px rgba(15, 23, 42, 0.08);
        }

        .highlight-box h3 {
            font-size: 22px;
            color: #0f172a;
            margin-bottom: 8px;
        }

        .highlight-box p {
            font-size: 15px;
            margin: 0;
            color: #475569;
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
            .highlight-boxes {
                grid-template-columns: 1fr;
            }

            .info-card h1 {
                font-size: 34px;
            }

            .info-card p {
                font-size: 17px;
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
            <p>Smart Washroom Monitoring Overview</p>
        </div>

        <div class="header-right">
            <a href="features.php"><button class="logout" style="background:#2563eb;">Features</button></a>
            <a href="index.php"><button class="logout">Home</button></a>
        </div>
    </div>

    <div class="info-page">
        <div class="info-card">
            <h1>Overview</h1>

            <p>
                Parimal is a smart washroom monitoring solution created to improve hygiene visibility,
                cleanliness tracking, and maintenance efficiency in public washrooms.
            </p>

            <p>
                The system brings together sensor-based monitoring, admin-level control, and visual
                dashboard analytics to track temperature, humidity, gas levels, and sound conditions
                in one connected platform.
            </p>

            <p>
                Even in demo mode, it simulates a real IoT workflow by showing dynamic values,
                chart-based visualization, device information, and interactive metric pages.
            </p>

            <div class="highlight-boxes">
                <div class="highlight-box">
                    <h3>Real-Time Vision</h3>
                    <p>Designed to monitor changing washroom conditions continuously.</p>
                </div>
                <div class="highlight-box">
                    <h3>Admin Control</h3>
                    <p>Provides secure access to dashboard, devices, and data views.</p>
                </div>
                <div class="highlight-box">
                    <h3>Scalable Model</h3>
                    <p>Can be connected with real hardware sensors in future deployment.</p>
                </div>
            </div>

            <a href="index.php" class="back-btn">← Back to Home</a>
        </div>
    </div>

</body>
</html>