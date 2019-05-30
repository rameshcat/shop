<?php include ROOT . '/views/layouts/header.php'; ?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2 class="title text-center">Каталог</h2>
                    <div class="panel-group category-products">
                        <?php foreach ($categories as $categoryItem): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="/category/<?php echo $categoryItem['id']; ?>">
                                            <?php echo $categoryItem['name']; ?>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-9 padding-right">
                <h2 class="title text-center">Корзина</h2>
                <?php if ($productsInCart): ?>
                    <table class="table-bordered table-striped table">
                        <tr>
                            <td>Код товара</td>
                            <td>Название</td>
                            <td>Цена</td>
                            <td>Колличество</td>
                            <td>Удалить</td>
                        </tr>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <td><?php echo $product['code']; ?></td>
                                <td><a href="/product/<?php echo $product['id']; ?>"><?php echo $product['name']; ?></a>
                                </td>
                                <td><?php echo $product['price']; ?></td>
                                <td><?php echo $productsInCart[$product['id']]; ?></td>
                                <td><a href="/cart/delete/<?php echo $product['id']; ?>">X</a></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td>Сумма :</td>
                            <td></td>
                            <td><?php echo Cart::getTotalPrice($products); ?></td>
                        </tr>
                    </table>
                    <form action="checkout" method="post">
                        <input type="submit" name="submit" value="Оформить заказ" class="btn btn-default">
                    </form>
                <?php endif; ?>
            </div>
        </div>
</section>
<?php include ROOT . '/views/layouts/footer.php'; ?>
