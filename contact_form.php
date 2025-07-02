<?php
session_start(); 
// PHP code sabse upar hoga
$email = "";
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $message = $_POST['message'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Email Form Example</title>
    <style>
        body {
            font-family: Arial;
            padding: 40px;
            background-color: #f4f4f4;
        }
        form {
            background: white;
            padding: 20px;
            border-radius: 10px;
            max-width: 400px;
            margin: auto;
            box-shadow: 0 0 10px #ccc;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0 20px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        input[type="submit"] {
            background-color: #3498db;
            color: white;
            border: none;
            cursor: pointer;
        }
        .result {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background: #e8ffe8;
            border-left: 5px solid green;
        }
    </style>
</head>
<body>

    <form method="POST" action="">
        <h2>Contact Form</h2>
        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Message:</label>
        <textarea name="message" rows="4" required></textarea>

        <input type="submit" value="Send Message">
    </form>

    <?php if (!empty($email) && !empty($message)): ?>
        <div class="result">
            <h3>Result:</h3>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
            <p><strong>Message:</strong> <?php echo nl2br(htmlspecialchars($message)); ?></p>
        </div>
    <?php endif; ?>

</body>
</html>
