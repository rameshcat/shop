<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
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
                <h2 class="title text-center">Личный кабинет</h2>
                <a href="<?php echo Helper::uriLink('userDataEdit'); ?>" name="edit">Редактировать личные
                    данные</a><br/>
                <a href="#" name="history">История заказов</a><br/>
                <?php if ((isset($_SESSION['role'])) && ($_SESSION['role'] == 'admin')): ?>
                    <a href="<?php echo Helper::uriLink('adminPanel'); ?>" name="edit">Панель администратора</a><br/>
                <?php endif; ?>
            </div>
        </div>
</section>