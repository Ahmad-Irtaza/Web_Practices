<?php 
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
$num1 = $_POST['num1'];
$num2 = $_POST['num2'];
$add = $_POST['add'];
if(isset($add)){
    $res=$num1+$num2;
    echo "<h2>Result: $res</h2>";
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>simple calculator</title>
</head>
<body>
    <h1>Hisab Kitab vala Compluter</h1>
    <form method="post">
<input type="number" name="num1" placeholder="Enter first number" required>
<input type="number" name="num2" placeholder="Enter second number" required>
<input type="submit" name="add" value="Add">



    </form>
</body>
</html>