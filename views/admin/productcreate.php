<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 padding-right">
                <h4>Добавить новый товар</h4>
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
                            <p>Название товара</p>
                            <input type="text" name="name" placeholder="" value="" required>
                            <p>Артикул</p>
                            <input type="text" name="code" placeholder="" value="" required>
                            <p>Стоимость</p>
                            <input type="text" name="price" placeholder="" value="" required>
                            <p>Категория</p>
                            <select name="category_id">
                                <?php if (is_array($categoryList)): ?>
                                    <?php foreach ($categoryList as $category): ?>
                                        <option value="<?php echo $category['id']; ?>">
                                            <?php echo $category['name']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            <br/><br/>
                            <p>Производитель</p>
                            <input type="text" name="brand" placeholder="" value="" required>
                            <p>Изображение товара</p>
                            <input type="file" name="image" placeholder="" value="">
                            <p>Детальное описание</p>
                            <textarea name="description" required></textarea>
                            <br/><br/>
                            <p>Наличие на складе</p>
                            <select name="availability">
                                <option value="1" selected="selected">Да</option>
                                <option value="0">Нет</option>
                            </select>
                            <br/><br/>
                            <p>Новинка</p>
                            <select name="is_new">
                                <option value="1" selected="selected">Да</option>
                                <option value="0">Нет</option>
                            </select>
                            <br/><br/>
                            <p>Рекомендуемые</p>
                            <select name="is_recommended">
                                <option value="1" selected="selected">Да</option>
                                <option value="0">Нет</option>
                            </select>
                            <br/><br/>
                            <p>Статус</p>
                            <select name="status">
                                <option value="1" selected="selected">Отображается</option>
                                <option value="0">Скрыт</option>
                            </select>
                            <br/><br/>
                            <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                            <br/><br/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>