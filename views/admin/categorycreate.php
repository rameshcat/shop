<?php include ROOT . '/views/layouts/headerAdmin.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <h4>Добавить новую категорию</h4>
            <br/>
            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post">

                        <p>Название</p>
                        <input type="text" name="name" placeholder="" value="" required>

                        <p>Порядковый номер</p>
                        <input type="text" name="sort_order" placeholder="" value="" required>

                        <p>Статус</p>
                        <select name="status">
                            <option value="1" selected="selected">Отображается</option>
                            <option value="0">Скрыта</option>
                        </select>

                        <br><br>

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>
