<?php include ROOT.'/views/layouts/headerAdmin.php'; ?>

<section>
    <div class="container" >
        <h4>Список заказов</h4>
        <br/>
        <table class="table-bordered table-striped table">
            <tr>
                <th>ID заказа</th>
                <th>Имя</th>
                <th>Телефон</th>
                <th>Комментарий</th>
                <th>Дата Заказа</th>
                <th>Просмотреть</th>
                <th>Удалить</th>
            </tr>
            <?php foreach ($orderList as $order): ?>
                <tr>
                    <td><?php echo $order['id']; ?></td>
                    <td><?php echo $order['name']; ?></td>
                    <td><?php echo $order['phone']; ?></td>
                    <td><?php echo $order['comment']; ?></td>
                    <td><?php echo $order['date']; ?></td>
                    <td><a href="<?php echo Helper::uriLink('orderView', $order['id']); ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                    <td><a href="<?php echo Helper::uriLink('orderDelete', $order['id']); ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</section>
<?php include ROOT.'/views/layouts/footer.php'; ?>
