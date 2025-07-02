<?php
$age = '';
$message = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $age = $_POST['age'] ?? '';

    if (!is_numeric($age)) {
        $message = "Please enter a valid number.";
    } else {
        $age = (int)$age;

        if ($age < 18) {
            $message = "Access Denied: You are underage. ❌";
        } else {
            $message = "Access Granted: You are allowed. ✅";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Age Check</title>
    <style>
        body {
            font-family: Arial;
            padding: 40px;
            text-align: center;
            background-color: #f9f9f9;
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
            width: 100%;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .result {
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
            color: #2c3e50;
        }
    </style>
</head>
<body>

<h2>Age Validation Form</h2>

<form method="POST" action="">
    <label>Enter your age:</label><br>
    <input type="text" name="age" required>
    <input type="submit" value="Check Age">
</form>

<?php if (!empty($message)): ?>
    <div class="result"><?php echo $message; ?></div>
<?php endif; ?>

</body>
</html>
