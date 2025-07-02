<?php
session_start();

// Login logic
$name = $_POST['name'] ?? '';

if (!empty($name) && !isset($_SESSION['username'])) {
    $_SESSION['username'] = $name;
}

// Logout logic via POST
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['logout'])) {
    session_destroy();
    header("Location: secure_logout_session.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Secure PHP Logout (POST)</title>
    <style>
        body {
            font-family: Arial;
            padding: 40px;
            background: #f4f4f4;
            text-align: center;
        }
        form {
            display: inline-block;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px #ddd;
        }
        input {
            padding: 10px;
            margin: 10px 0;
            width: 100%;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            background: #3498db;
            color: white;
            border: none;
            cursor: pointer;
        }
        .welcome {
            background: #d1f2eb;
            padding: 20px;
            border-radius: 8px;
            margin-top: 30px;
        }
    </style>
</head>
<body>

<h2>PHP Login with POST Logout</h2>

<?php if (isset($_SESSION['username'])): ?>
    <div class="welcome">
        <h3>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?> 👋</h3>
        <form method="POST" action="">
            <input type="hidden" name="logout" value="1">
            <input type="submit" value="Logout">
        </form>
    </div>
<?php else: ?>
    <form method="POST" action="">
        <label>Enter your name:</label><br>
        <input type="text" name="name" required>
        <input type="submit" value="Login">
    </form>
<?php endif; ?>

</body>
</html>
