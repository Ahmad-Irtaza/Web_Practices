<?php
$name = $email = $password = "";
$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($name) || empty($email) || empty($password)) {
        $error = "All fields are required!";
    } else {
        $success = "Registration successful! 🎉";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registration Form</title>
    <style>
        body {
            font-family: Arial;
            padding: 40px;
            background: #f0f2f5;
            text-align: center;
        }
        form {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
            max-width: 400px;
            margin: auto;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
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

<h2>PHP Registration Form</h2>

<form method="POST" action="">
    <input type="text" name="name" placeholder="Full Name" value=$name; ?>" required>
    <input type="email" name="email" placeholder="Email Address" value=$email; ?>" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="submit" value="Register">
</form>

<?php if (!empty($error)): ?>
    <div class="message error"><?php echo $error; ?></div>
<?php elseif (!empty($success)): ?>
    <div class="message success"><?php echo $success; ?></div>
<?php endif; ?>

</body>
</html>
