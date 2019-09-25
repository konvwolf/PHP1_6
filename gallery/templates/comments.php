<form method="post" action="./engine/comms.php" class="comments_form">
    <input type="text" name="name" placeholder="Ваше имя" class="name">
    <textarea name="comm" class="comment" placeholder="Напишите комментарий"></textarea>
    <button type="submit" class="comments_button">Отправить</button>
</form>

<?php foreach (getSQLdata (COMMENTS, '*', 'ORDER BY comment_id DESC LIMIT 10') as $data): ?>
    <form class="user_comm" method="post" action="./engine/comms.php">
        <div class="commentator"><span class="commentator_name"><?= $data['user_name'] ?></span><br>
        <?= $data['comment_date'] ?></div>
        <div class="commentator_text"><?= $data['comment_text'] ?></div>
        <input type="text" class="hiddenInput" name="comment_id" value="<?= $data['comment_id'] ?>">
        <button type="submit" class="delete">X</button>
    </form>
<?php endforeach; ?>