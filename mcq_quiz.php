<?php
$score = 0;
$total = 3;
$resultMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Correct answers
    $answers = [
        "q1" => "b",
        "q2" => "a",
        "q3" => "c"
    ];

    foreach ($answers as $question => $correctAnswer) {
        if (isset($_POST[$question]) && $_POST[$question] == $correctAnswer) {
            $score++;
        }
    }

    $resultMessage = "You got <strong>$score</strong> out of <strong>$total</strong> correct!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHP MCQ Quiz</title>
    <style>
        body {
            font-family: Arial;
            background: #f7f7f7;
            padding: 40px;
            text-align: left;
        }
        form {
            background: white;
            max-width: 600px;
            margin: auto;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }
        .question {
            margin-bottom: 20px;
        }
        .result {
            text-align: center;
            font-weight: bold;
            color: green;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">Simple PHP Quiz</h2>

<form method="POST" action="">
    <div class="question">
        <p>1. What does HTML stand for?</p>
        <label><input type="radio" name="q1" value="a"> Hyperlinks and Text Markup Language</label><br>
        <label><input type="radio" name="q1" value="b"> Hyper Text Markup Language</label><br>
        <label><input type="radio" name="q1" value="c"> Home Tool Markup Language</label>
    </div>

    <div class="question">
        <p>2. Which tag is used to define a paragraph in HTML?</p>
        <label><input type="radio" name="q2" value="a"> &lt;p&gt;</label><br>
        <label><input type="radio" name="q2" value="b"> &lt;para&gt;</label><br>
        <label><input type="radio" name="q2" value="c"> &lt;text&gt;</label>
    </div>

    <div class="question">
        <p>3. What does CSS stand for?</p>
        <label><input type="radio" name="q3" value="a"> Colorful Style Sheets</label><br>
        <label><input type="radio" name="q3" value="b"> Computer Style Sheets</label><br>
        <label><input type="radio" name="q3" value="c"> Cascading Style Sheets</label>
    </div>

    <input type="submit" value="Submit Quiz">
</form>

<?php if (!empty($resultMessage)): ?>
    <div class="result">
        <?php echo $resultMessage; ?>
    </div>
<?php endif; ?>

</body>
</html>
