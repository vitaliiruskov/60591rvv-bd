<section class="catalog">
    <div class="container">
        <h1 class="catalog-title">Наши номера</h1>
        <ol class="pagination">

            <h1 class="catalog-a">Корпус</h1>

            <?php for ($i = 1; $i <= $pages_total; $i = $i + 1): ?>
                <li>
                    <a href="catalog.php?page=<?= $i ?>" class="<?= $i === $page ? 'current' : '' ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>
        </ol>
        <ul class="products-list">

            <?php while ($item = $result->fetch()) {?>
                <li>
                    <a class="product-card"  href="rooms.php?id=<?= $item['id'] ?>">
                        <img src="<?= $item['img_url'] ?>" width="156" height="120" alt="<?= $item['Room_number'] ?>">
                        <div class="product-options">
                            <span class="Room_number"><?= $item['Room_number'] ?></span>
                            <span class="Price"><?= $item['Price'] ?> за ночь</span>
                        </div>
                    </a>
                </li>
            <?php }; ?>
        </ul>
    </div>
</section>