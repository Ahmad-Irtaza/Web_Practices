<?php
$name = "";
$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);

    if (empty($name)) {
        $error = "Name is required.";
    } elseif (!isset($_POST['agree'])) {
        $error = "You must agree to the terms!";
    } else {
        $success = "Thank you, $name! Your response has been recorded ✅";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Checkbox Validation</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f4f4;
            padding: 40px;
            text-align: center;
        }
        form {
            background: white;
            max-width: 400px;
            margin: auto;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .message {
            margin-top: 20px;
            font-weight: bold;
        }
        .error {
            color: red;
        }
        .success {
            color: green;
        }
    </style>
</head>
<body>

<h2>Checkbox Validation Form</h2>

<form method="POST" action="">
    <input type="text" name="name" placeholder="Enter your name" value="<?php echo htmlspecialchars($name); ?>" required><br>

    <label>
        <input type="checkbox" name="agree" value="1"> I agree to the terms and conditions
    </label><br><br>

    <input type="submit" value="Submit">
</form>

<?php if (!empty($error)): ?>
    <div class="message error"><?php echo $error; ?></div>
<?php elseif (!empty($success)): ?>
    <div class="message success"><?php echo $success; ?></div>
<?php endif; ?>

</body>
</html>
