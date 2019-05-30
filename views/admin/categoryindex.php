<?php include ROOT . '/views/layouts/headerAdmin.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <br/>
            <a href="<?php echo Helper::uriLink('categoryAdd'); ?>" class="btn btn-default back"><i
                        class="fa fa-plus"></i> Добавить категорию</a>
            <h4>Список категорий</h4>
            <br/>
            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID категории</th>
                    <th>Название категории</th>
                    <th>Порядковый номер</th>
                    <th>Статус</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($categoriesList as $category): ?>
                    <tr>
                        <td><?php echo $category['id']; ?></td>
                        <td><?php echo $category['name']; ?></td>
                        <td><?php echo $category['sort_order']; ?></td>
                        <td><?php echo $category['status']; ?></td>
                        <td><a href="<?php echo Helper::uriLink('categoryUpdate', $category['id']); ?>"
                               title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="<?php echo Helper::uriLink('categoryDelete', $category['id']); ?>?>"
                               title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>
