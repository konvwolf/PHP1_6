<?php
include ('./config/const.php');
include (ENGINE_PATH.'func.php');

if (isset($_GET['productHURL']) && !empty($_GET['productHURL'])) {
    $productHURL = str_replace('/', '', $_GET['productHURL']);
} elseif (isset($_GET['productHURL']) && empty($_GET['productHURL'])) {
    $productHURL = '';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Our products</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <?php foreach (scanDir4Files(STYLES_PATH) as $file): ?>
        <link rel="stylesheet" href="/public/css/<?= $file ?>">
    <?php endforeach; ?>
</head>
<body>
    <div class="container">
        <?php
            if(isset($productHURL)) {
                include (TEMPLATES_PATH.'product_desc.php');
            } else {
                include (TEMPLATES_PATH.'products_list.php');
            }
        ?>
    </div>
    <?php foreach (scanDir4Files(JS_PATH) as $file): ?>
        <script src="./public/js/<?= $file ?>"></script>
    <?php endforeach; ?>
</body>
</html>