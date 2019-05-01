<?php include ROOT.'/views/layouts/header.php'; ?>

    <section><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <?php if($result == true):?>
                        <h2>Данные изменены</h2>
                    <?php else:?>
                        <div class="signup-form"><!--sign up form-->
                            <?php if (isset($errors) && is_array($errors)):?>
                                <ul>
                                    <?php foreach ($errors as $error):?>
                                        <li><?php echo $error?></li>
                                    <?php endforeach;?>
                                </ul>
                            <?php endif;?>
                            <h2>Редактирование личных данных</h2>
                            <form action="#" method="post">
                                <input type="text" name="name" placeholder="Имя" value="<?php echo $name;?>"/>
                                <input type="password" name="password" placeholder="Пароль" value="<?php echo $password;?>"/>
                                <input type="submit" name="submit" value="Сохранить" class="btn btn-default"/>
                            </form>
                        </div><!--/sign up form-->
                    <?php endif;?>
                </div>
            </div>
        </div>
    </section><!--/form-->

<?php include ROOT.'/views/layouts/footer.php'; ?>