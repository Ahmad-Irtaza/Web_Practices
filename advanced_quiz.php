<?php
// ✅ Questions + Options + Correct Answers (1 array mein)
$questions = [
    "What does HTML stand for?" => [
        "options" => [
            "a" => "Hyper Text Markup Language",
            "b" => "Home Tool Markup Language",
            "c" => "Hyperlinks and Text Markup Language"
        ],
        "answer" => "a"
    ],
    "Which tag is used to define a paragraph in HTML?" => [
        "options" => [
            "a" => "<para>",
            "b" => "<text>",
            "c" => "<p>"
        ],
        "answer" => "c"
    ],
    "What does CSS stand for?" => [
        "options" => [
            "a" => "Computer Style Sheets",
            "b" => "Cascading Style Sheets",
            "c" => "Colorful Style Sheets"
        ],
        "answer" => "b"
    ],
    "Which HTML element is used to insert an image?" => [
        "options" => [
            "a" => "<img>",
            "b" => "<image>",
            "c" => "<pic>"
        ],
        "answer" => "a"
    ],
    "Which tag is used for largest heading in HTML?" => [
        "options" => [
            "a" => "<h6>",
            "b" => "<heading>",
            "c" => "<h1>"
        ],
        "answer" => "c"
    ]
];

$score = 0;
$total = count($questions);
$userAnswers = [];
$submitted = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $submitted = true;

    foreach ($questions as $q => $data) {
        $questionKey = md5($q); // unique key
        $userAnswer = $_POST[$questionKey] ?? '';
        $userAnswers[$q] = $userAnswer;

        if ($userAnswer == $data['answer']) {
            $score++;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Advanced PHP Quiz</title>
    <style>
        body {
            font-family: Arial;
            background: #f7f7f7;
            padding: 30px;
        }
        form {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }
        .question {
            margin-bottom: 25px;
        }
        .result {
            font-weight: bold;
            text-align: center;
            padding: 15px;
            margin-bottom: 25px;
            background-color: #d1f2eb;
            border-left: 5px solid green;
        }
        .correct {
            color: green;
            font-weight: bold;
        }
        .wrong {
            color: red;
        }
        input[type="submit"] {
            padding: 10px 15px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">Advanced PHP Quiz (Auto-Generated)</h2>

<?php if ($submitted): ?>
    <div class="result">
        You scored <strong><?php echo $score; ?></strong> out of <strong><?php echo $total; ?></strong>
    </div>
<?php endif; ?>

<form method="POST" action="">
    <?php foreach ($questions as $q => $data): 
        $qKey = md5($q); // to avoid special chars in input name
        ?>
        <div class="question">
            <p><strong><?php echo $q; ?></strong></p>
            <?php foreach ($data['options'] as $key => $option): ?>
                <label>
                    <input type="radio" name="<?php echo $qKey; ?>" value="<?php echo $key; ?>" 
                        <?php if ($submitted && ($userAnswers[$q] ?? '') == $key) echo 'checked'; ?>
                    >
                    <?php echo htmlspecialchars($option); ?>
                </label><br>
            <?php endforeach; ?>

            <?php if ($submitted): ?>
                <?php if (($userAnswers[$q] ?? '') == $data['answer']): ?>
                    <p class="correct">✅ Correct</p>
                <?php else: ?>
                    <p class="wrong">❌ Wrong (Correct: <?php echo strtoupper($data['answer']); ?>)</p>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>

    <div style="text-align:center;">
        <input type="submit" value="Submit Quiz">
    </div>
</form>

</body>
</html>
