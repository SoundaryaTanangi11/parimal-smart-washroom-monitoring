<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>परिमळ - Smart Washroom Monitoring</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: white;
            background: radial-gradient(circle, #0D1B2A, #1B263B);
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 22px 60px;
            background: rgba(0, 0, 0, 0.22);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255,255,255,0.08);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
        }

        .nav-links {
            list-style: none;
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .nav-links li {
            position: relative;
        }

        .nav-links a {
            text-decoration: none;
            color: white;
            font-size: 17px;
            padding: 10px;
            transition: 0.3s;
            position: relative;
        }

        .nav-links a:hover {
            color: #00A8E8;
        }

        .nav-links a::after {
            content: "";
            position: absolute;
            width: 0%;
            height: 2px;
            bottom: 0;
            left: 0;
            background: #00A8E8;
            transition: 0.3s;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .hero {
            min-height: 100vh;
            padding: 150px 20px 80px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-image: linear-gradient(rgba(6, 17, 35, 0.35), rgba(6, 17, 35, 0.35)), url('dark.webp');
            background-size: cover;
            background-position: center;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: "";
            position: absolute;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(0,168,232,0.25), transparent);
            top: 20%;
            left: 10%;
            z-index: 0;
            filter: blur(80px);
        }

        .hero h1 {
            font-size: 58px;
            font-weight: 800;
            margin-bottom: 18px;
            text-shadow: 0 4px 20px rgba(0,0,0,0.35);
            position: relative;
            z-index: 1;
            animation: fadeSlideDown 1s ease;
        }

        .hero p {
            font-size: 22px;
            opacity: 0.9;
            max-width: 800px;
            margin-bottom: 26px;
            position: relative;
            z-index: 1;
            animation: fadeSlideUp 1.2s ease;
        }

        .cta-buttons {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
            justify-content: center;
            position: relative;
            z-index: 1;
        }

        .btn, .outline-btn {
            padding: 13px 26px;
            border-radius: 30px;
            font-size: 17px;
            font-weight: 700;
            text-decoration: none;
            transition: 0.3s ease;
            cursor: pointer;
        }

        .btn {
            background: linear-gradient(90deg, #004E92, #00A8E8);
            color: white;
            box-shadow: 0px 4px 15px rgba(0, 168, 232, 0.45);
            border: none;
        }

        .btn:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 10px 25px rgba(0,168,232,0.6);
        }

        .outline-btn {
            border: 1px solid white;
            color: white;
            background: transparent;
        }

        .outline-btn:hover {
            background: white;
            color: #0D1B2A;
            transform: translateY(-2px);
        }

        .contact-section {
            padding: 80px 10%;
            text-align: center;
            background: rgba(0,0,0,0.2);
        }

        .contact-box {
            background: rgba(255,255,255,0.08);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 24px rgba(0,0,0,0.18);
            max-width: 900px;
            margin: 0 auto;
        }

        .contact-box h2 {
            font-size: 42px;
            margin-bottom: 18px;
        }

        .contact-box p {
            font-size: 22px;
            margin: 12px 0;
        }

        .menu-toggle {
            display: none;
            font-size: 28px;
            cursor: pointer;
        }

        @keyframes fadeSlideDown {
            from {
                opacity: 0;
                transform: translateY(-40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeSlideUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 900px) {
            nav {
                padding: 18px 24px;
            }

            .menu-toggle {
                display: block;
            }

            .nav-links {
                display: none;
                flex-direction: column;
                position: absolute;
                top: 72px;
                left: 0;
                width: 100%;
                background: rgba(0,0,0,0.92);
                padding: 20px 0;
            }

            .nav-links.show {
                display: flex;
            }

            .hero h1 {
                font-size: 40px;
            }

            .hero p {
                font-size: 18px;
            }

            .contact-box h2 {
                font-size: 34px;
            }

            .contact-box p {
                font-size: 18px;
            }
        }
    </style>
</head>
<body>

    <header>
        <nav>
            <div class="logo">परिमळ</div>
            <div class="menu-toggle" id="menuToggle">☰</div>

            <ul class="nav-links" id="navLinks">
                <li><a href="overview.php">Overview</a></li>
                <li><a href="features.php">Features</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </header>

    <section class="hero">
        <h1>Intelligent Washroom System</h1>
        <p>Smart monitoring for cleaner and safer public washrooms.</p>

        <div class="cta-buttons">
            <a href="login.php" class="outline-btn">Login</a>
            <a href="login.php" class="btn">Check Status →</a>
        </div>
    </section>

    <section id="contact" class="contact-section">
        <div class="contact-box">
            <h2>Contact</h2>
            <p>Email: support@parimal.com</p>
            <p>Phone: +91 9876543210</p>
            <p>Address: 123, Smart City, India</p>
        </div>
    </section>

    <script>
        const menuToggle = document.getElementById('menuToggle');
        const navLinks = document.getElementById('navLinks');

        menuToggle.addEventListener('click', () => {
            navLinks.classList.toggle('show');
        });

        document.querySelectorAll('.nav-links a').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth <= 900 && link.getAttribute('href').startsWith('#')) {
                    navLinks.classList.remove('show');
                }
            });
        });
    </script>

</body>
</html>