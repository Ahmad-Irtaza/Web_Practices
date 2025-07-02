<?php
$name = "";
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    if (!empty($name)) {
        $message = "Thank you, <strong>$name</strong>! Form submitted successfully. ✅";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Confirm Before Submit</title>
    <style>
        body {
            font-family: Arial;
            background: #f0f0f0;
            padding: 40px;
            text-align: center;
        }
        form {
            background: white;
            padding: 25px;
            display: inline-block;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }
        input[type="text"] {
            padding: 10px;
            width: 100%;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            background: #3498db;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .message {
            margin-top: 20px;
            font-weight: bold;
            color: green;
        }
    </style>

    <script>
        function confirmSubmission() {
            return confirm("Are you sure you want to submit?");
        }
    </script>
</head>
<body>

<h2>JS Confirm Before Form Submit</h2>

<form method="POST" action="" onsubmit="return confirmSubmission();">
    <input type="text" name="name" placeholder="Enter your name" required><br>
    <input type="submit" value="Submit">
</form>

<?php if (!empty($message)): ?>
    <div class="message"><?php echo $message; ?></div>
<?php endif; ?>

</body>
</html>
