<?php include ROOT . '/views/layouts/header.php'; ?>

    <section><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="signup-form"><!--sign up form-->
                        <?php if (isset($errors) && is_array($errors)): ?>
                            <ul>
                                <?php foreach ($errors as $error): ?>
                                    <li><?php echo $error ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                        <h2>Авторизация</h2>
                        <form action="#" method="post">
                            <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>"
                                   required/>
                            <input type="password" name="password" placeholder="Пароль" value="<?php echo $password; ?>"
                                   required/>
                            <input type="submit" name="submit" value="Войти" class="btn btn-default"/>
                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section><!--/form-->

<?php include ROOT . '/views/layouts/footer.php'; ?>