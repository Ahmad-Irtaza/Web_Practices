<?php
$conn = new mysqli("localhost", "root", "mi", "demo_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    if (!empty($name)) {
        $stmt = $conn->prepare("INSERT INTO users (name) VALUES (?)");
        $stmt->bind_param("s", $name);
        if ($stmt->execute()) {
            $success = "Name saved successfully!";
        } else {
            $success = "Error saving name.";
        }
        $stmt->close();
    } else {
        $success = "Please enter a name.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Insert Name</title>
    <style>
        body { font-family: Arial; background: #f4f4f4; padding: 40px; text-align: center; }
        form { background: white; padding: 25px; border-radius: 10px; max-width: 400px; margin: auto; box-shadow: 0 0 10px #ccc; }
        input[type="text"] { width: 100%; padding: 10px; margin: 15px 0; }
        input[type="submit"] { background: #2ecc71; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; }
        .success { margin-top: 20px; font-weight: bold; color: green; }
    </style>
</head>
<body>

<h2>Save Your Name</h2>

<form method="POST" action="">
    <input type="text" name="name" placeholder="Enter your name" required>
    <input type="submit" value="Save">
</form>

<?php if (!empty($success)): ?>
    <div class="success"><?php echo $success; ?></div>
<?php endif; ?>

</body>
</html>
