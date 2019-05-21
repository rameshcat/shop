<?php include ROOT.'/views/layouts/headerAdmin.php'; ?>

<section>
    <div class="container" >
        <h4>Просмотр заказа № <?php echo $id;?></h4>
        <table class="table-bordered table-striped table" style="width: fit-content; font-weight: normal">
            <thead>Информация о заказе</thead>
            <tr>
                <td>Имя</td>
                <td><?php echo $order['user_name'];?></td>
            </tr>
            <tr>
                <td>Телефон</td>
                <td><?php echo $order['user_phone'];?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php echo $order['user_email'];?></td>
            </tr>
            <tr>
                <td>Комментарий</td>
                <td><?php echo $order['user_comment'];?></td>
            </tr>
            <tr>
                <td>Дата Заказа</td>
                <td><?php echo $order['date'];?></td>
            </tr>
        </table>
    </div>
    <div class="container">
        <table class="table-bordered table-striped table" style="width: fit-content; font-weight: normal">
            <thead>Товары в заказе</thead>
            <th>ID товара</th>
            <th>Артикул</th>
            <th>Название товара</th>
            <th>Цена</th>
            <th>Количество</th>
            <?php foreach ($productList as $product):?>
            <tr>
                <td><?php echo $product['id'];?></td>
                <td><?php echo $product['code'];?></td>
                <td><?php echo $product['name'];?></td>
                <td><?php echo $product['price'];?></td>
                <td><?php echo $products[$product['id']];?></td>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
</section>
<?php include ROOT.'/views/layouts/footer.php'; ?>
