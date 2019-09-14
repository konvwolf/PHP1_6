<?php
include ("./engine/func.php");



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calculator</title>
    <?php foreach (scanDIR4Files ("./public/css/") as $file): ?>
        <link rel="stylesheet" href="./public/css/<?= $file ?>">
    <?php endforeach; ?>
</head>
<body>
    <div class="calculator">
        <div class="calc-type">9 DIGITS</div>
        <div class="display">0</div>
        <button id="number" class="digit" data-num="7">7</button>
        <button id="number" class="digit" data-num="8">8</button>
        <button id="number" class="digit" data-num="9">9</button>
        <button id="number" class="digit" data-num="4">4</button>
        <button id="number" class="digit" data-num="5">5</button>
        <button id="number" class="digit" data-num="6">6</button>
        <button id="number" class="digit" data-num="1">1</button>
        <button id="number" class="digit" data-num="2">2</button>
        <button id="number" class="digit" data-num="3">3</button>
        <button id="number" class="digit zero" data-num="0">0</button>
        <button id="number" class="digit dot" data-num=".">.</button>
        <button id="action" class="minus" data-act="minus">-</button>
        <button id="action" class="plus" data-act="plus">+</button>
        <button id="action" class="divide" data-act="divide">/</button>
        <button id="action" class="multiply" data-act="multiply">×</button>
        <button class="equals" data-act="equals">=</button>
        <button id="action" class="cancel" data-act="cancel">C</button>
    </div>
    <?php foreach (scanDIR4Files ("./public/js/") as $file): ?>
        <script src="./public/js/<?= $file ?>"></script>
    <?php endforeach; ?>
</body>
</html>