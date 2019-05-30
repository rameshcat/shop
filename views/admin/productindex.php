<?php include ROOT . '/views/layouts/headerAdmin.php'; ?>

<section>
    <div class="container">
        <a href="<?php echo Helper::uriLink('productAdd'); ?>" class="btn btn-default back"><i class="fa fa-plus"></i>
            Добавить товар</a>
        <h4>Список товаров</h4>
        <br/>
        <table class="table-bordered table-striped table">
            <tr>
                <th>ID товара</th>
                <th>Артикул</th>
                <th>Название товара</th>
                <th>Цена</th>
                <th></th>
                <th></th>
            </tr>
            <?php foreach ($productsList as $product): ?>
                <tr>
                    <td><?php echo $product['id']; ?></td>
                    <td><?php echo $product['code']; ?></td>
                    <td><?php echo $product['name']; ?></td>
                    <td><?php echo $product['price']; ?></td>
                    <td><a href="<?php echo Helper::uriLink('productUpdate', $product['id']); ?>" title="Редактировать"><i
                                    class="fa fa-pencil-square-o"></i></a></td>
                    <td><a href="<?php echo Helper::uriLink('productDelete', $product['id']); ?>" title="Удалить"><i
                                    class="fa fa-times"></i></a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</section>
<?php include ROOT . '/views/layouts/footer.php'; ?>
