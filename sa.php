<?php
session_start(); // Session start sabse pehle

// Form submit hone par
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ;
    $password = $_POST['password'] ;

    // Simple condition (Real app mein database hota hai)
    if ($username == "admin" && $password == "1234") {
        $_SESSION['username'] = $username;
        $message = "Login successful!";
    } else {
        $message = "Invalid login. Try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simple PHP Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f0f0;
            padding: 40px;
        }
        .container {
            max-width: 400px;
            background: white;
            padding: 20px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 0 10px #aaa;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0 16px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            padding: 10px 15px;
            background: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
        }
        .message {
            margin-top: 10px;
            color: green;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Login Form (PHP + HTML + CSS + JS)</h2>

    <!-- Message Display -->
    <?php if (!empty($message)): ?>
        <p class="message"><?php echo $message; ?></p>
    <?php endif; ?>

    <!-- Form Start -->
    <form method="POST" action="">
        <label>Username:</label>
        <input type="text" name="username" required>

        <label>Password:</label>
        <input type="password" name="password" required>

        <input type="submit" value="Login">
    </form>

    <!-- Session Data Show -->
    <?php if (isset($_SESSION['username'])): ?>
        <p>Welcome, <strong><?php echo $_SESSION['username']; ?></strong>!</p>
        <button onclick="logout()">Logout (via JS)</button>
    <?php endif; ?>
</div>

<!-- JavaScript Section -->
<script>
    function logout() {
        alert("Session end ho gaya (Sirf alert, real logout PHP se hoga)");
        window.location.href = "?logout=1";
    }
</script>

<?php
// Logout code (via GET)
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}
?>

</body>
</html>
