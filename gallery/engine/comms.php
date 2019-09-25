<?php
header('Location:/');

include ($_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'const.php'); // константы сайта
include (ENGINE_PATH.'func.php'); // функции сайта

$name = $_POST['name'];
$comment = $_POST['comm'];
$dataString = "'" . $name . "', '" . $comment . "'";

if ($name) {
    insertIntoSQLtable (COMMENTS, 'user_name, comment_text', $dataString);
}

$commId = $_POST['comment_id'];

if ($commId) {
    deleteFromSQLtable (COMMENTS, 'comment_id', $commId);
}
?>