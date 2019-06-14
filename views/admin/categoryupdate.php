<section>
    <div class="container">
        <div class="row">
            <h4>Редактировать категорию</h4>
            <br/>
            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post">
                        <p>Название</p>
                        <input type="text" name="name" placeholder="" value="<?php echo $category[0]['name']; ?>">
                        <p>Порядковый номер</p>
                        <input type="text" name="sort_order" placeholder=""
                               value="<?php echo $category[0]['sort_order']; ?>">
                        <p>Статус</p>
                        <select name="status">
                            <option value="1" <?php if ($category[0]['status'] == 1) echo ' selected="selected"'; ?>>
                                Отображается
                            </option>
                            <option value="0" <?php if ($category[0]['status'] == 0) echo ' selected="selected"'; ?>>
                                Скрыта
                            </option>
                        </select>
                        <br><br>
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>