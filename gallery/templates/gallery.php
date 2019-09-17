<div class="gallery">
    <!-- Вывожу все картинки из папки public/img -->
    <?php foreach (getSQLdata (PHOTOS, '*') as $data): ?>
        <div class="galleryPic" data-id="<?= $data['id'] ?>">
            <img src="./public/img/<?= $data['file_name'] ?>" alt="<?= $data['description'] ?>" onmouseover="this.style='transform: scale(1.1);'" onmouseout="this.style='transform: scale(1)'">
            <p class="picName">
                <?= $data['description'] ?>
            </p>
            <p class='picViews'>
                <i class="far fa-eye"></i> <span class="counter"><?= $data['counter'] ?></span>
            </p>
        </div>
    <?php endforeach; ?>
</div>
<div class="modalWindow"></div>