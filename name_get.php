<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "GET") {
$_name=$_GET['name'];
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>name</h1>
    <?php
        $name="Irtaza Butt";
        echo "Hello, $name!";
        echo "<br>";
    ?>
</body>
</html>