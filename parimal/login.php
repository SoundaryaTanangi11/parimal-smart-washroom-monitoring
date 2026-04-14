<?php
session_start();
include("db_connect.php");

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows === 1) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
         $_SESSION['username'] = $row['username'];

        if (isset($_POST['remember'])) {
        setcookie("username", $username, time() + (86400 * 7)); // 7 days
         }

         header("Location: dashboard.php");
        exit();
        } else {
            $error = "Invalid username or password.";
        }
    } else {
        $error = "Invalid username or password.";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login | Parimal</title>

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Poppins', sans-serif;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background:
        radial-gradient(circle at top left, rgba(125, 162, 206, 0.25), transparent 40%),
        radial-gradient(circle at bottom right, rgba(86, 123, 168, 0.25), transparent 40%),
        linear-gradient(135deg, #0D1B2A, #1B263B);
}

/* floating glow */
body::before {
    content: "";
    position: absolute;
    width: 350px;
    height: 350px;
    background: #00A8E8;
    filter: blur(120px);
    top: -80px;
    left: -80px;
    opacity: 0.25;
    animation: float 6s infinite alternate;
}

@keyframes float {
    from { transform: translateY(0px); }
    to { transform: translateY(40px); }
}

/* login card */
.login-card {
    width: 380px;
    padding: 40px;
    border-radius: 20px;
    backdrop-filter: blur(18px);
    background: rgba(255,255,255,0.08);
    box-shadow: 0 12px 35px rgba(0,0,0,0.3);
    text-align: center;
    animation: fadeUp 0.8s ease;
}

@keyframes fadeUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}

.logo {
    font-size: 28px;
    font-weight: bold;
    color: #00A8E8;
    margin-bottom: 10px;
}

.subtitle {
    font-size: 14px;
    color: #cbd5e1;
    margin-bottom: 30px;
}

h2 {
    margin-bottom: 20px;
    font-size: 24px;
    color: white;
}

/* inputs */
.input-group {
    text-align: left;
    margin-bottom: 18px;
}

.input-group label {
    font-size: 14px;
    color: #cbd5e1;
    margin-bottom: 6px;
    display: block;
}

.input-group input {
    width: 100%;
    padding: 12px 14px;
    border-radius: 10px;
    border: none;
    outline: none;
    font-size: 14px;
    background: rgba(255,255,255,0.15);
    color: white;
}

.input-group input::placeholder {
    color: #94a3b8;
}

.input-group input:focus {
    box-shadow: 0 0 0 2px #00A8E8;
}

/* button */
.login-btn {
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 30px;
    background: linear-gradient(90deg, #004E92, #00A8E8);
    color: white;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
}

.login-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0,168,232,0.5);
}
.loading {
    pointer-events: none;
    opacity: 0.7;
}

.loading::after {
    content: "⏳ Logging in...";
    display: block;
    margin-top: 8px;
    font-size: 13px;
}
/* error */
.error {
    background: rgba(255, 0, 0, 0.15);
    color: #ff6b6b;
    padding: 10px;
    border-radius: 8px;
    margin-bottom: 15px;
    font-size: 13px;
}

/* footer */
.footer {
    margin-top: 20px;
    font-size: 13px;
    color: #94a3b8;
}
</style>

</head>
<body>

<div class="login-card">
    <div class="logo">परिमळ</div>
    <div class="subtitle">Smart Washroom Monitoring System</div>

    <h2>Admin Login</h2>

    <?php if ($error): ?>
        <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" placeholder="Enter username" required>
        </div>

        <div class="input-group">
            <label>Password</label>
        <div style="position: relative;">
            <input type="password" id="password" name="password" placeholder="Enter password" required>

            <span onclick="togglePassword()" 
              style="position:absolute; right:12px; top:50%; transform:translateY(-50%);
                     cursor:pointer; color:#cbd5e1;">
                    👁️
             </span>
            </div>
        </div>

        <div style="display:flex; align-items:center; gap:8px; margin-bottom:15px;">
            <input type="checkbox" id="remember" name="remember">
            <label for="remember" style="color:#cbd5e1; font-size:14px;">Remember Me</label>
         </div>

       <button type="submit" class="login-btn" id="loginBtn"> Login</button>
    </form>

    <div class="footer">
        Secure admin access only
    </div>
</div>


<script>
function togglePassword() {
    const pass = document.getElementById("password");
    pass.type = pass.type === "password" ? "text" : "password";
}

// Loading animation
document.querySelector("form").addEventListener("submit", function() {
    const btn = document.getElementById("loginBtn");
    btn.classList.add("loading");
    btn.innerText = "Please wait...";
});
</script>

</body>
</html>