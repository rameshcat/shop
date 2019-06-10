<section>
    <div class="container">
        <div class="row">
            <h4>Добавить новую категорию</h4>
            <br/>
            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Название</p>
                        <input type="text" name="name" placeholder="" value="" required>

                        <p>Порядковый номер</p>
                        <input type="text" name="sort_order" placeholder="" value="" required>

                        <p>Описание категории</p>
                        <input type="text" name="description" placeholder="" value="" required>

                        <p>Изображение товара</p>
                        <input type="file" name="image" placeholder="" value="">

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
