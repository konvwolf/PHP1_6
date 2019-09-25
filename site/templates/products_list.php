<section class="products_list">
    <?php 
        $query = getSQLdata (PRODUCTS,
            'prod_name, prod_price, prod_hurl, '.PHOTOS.'.file_name, '.PHOTOS.'.image_name',
            'JOIN '.PHOTOS.' ON '.PRODUCTS.'.id = '.PHOTOS.'.prod_id GROUP BY '.PRODUCTS.'.id ORDER BY '.PRODUCTS.'.id DESC LIMIT 10');
        foreach ($query as $prods):
    ?>
        <div class="product_card">
            <a href="/product/<?= $prods['prod_hurl'] ?>/" class="product_link">
                <img src="/public/img/<?= $prods['file_name'] ?>" alt="<?= $prods['image_name'] ?>">
                <h2 class="product_name"><?= $prods['prod_name'] ?></h2>
                <span class="product_price"><i class="fas fa-ruble-sign"></i> <?= $prods['prod_price'] ?></span>
            </a>
        </div>
    <?php endforeach; ?>
</section>