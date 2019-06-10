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
                <h2 class="title text-center">Оформление заказа</h2>
            </div>
            <div class="col-sm-4">
                <?php if ($result): ?>
                    <h2>Заказ оформлен!</h2>
                    <h2>Номер Вашего заказа <?php echo $result ?></h2>
                <?php else: ?>
                    <div class="signup-form"><!--sign up form-->
                        <div>Выбрано товаров: <?php echo Cart::countItems(); ?></div>
                        <div>На сумму: <?php echo Cart::getTotalPrice($products); ?></div>
                        <?php if (isset($errors) && is_array($errors)): ?>
                            <ul>
                                <?php foreach ($errors as $error): ?>
                                    <li><?php echo $error ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                        <form action="#" method="post">
                            <input type="text" name="name" placeholder="Имя" minlength="1"
                                   value="<?php if (isset($_POST['name'])) echo $_POST['name']; else if (isset($username)) echo $username; ?>"
                                   required/>
                            <input type="tel" name="phone" placeholder="Телефон" minlength="8" maxlength="20"
                                   value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>" required
                                   pattern="[0-9]+"/>
                            <input type="email" name="email" placeholder="E-mail"
                                   value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" required/>
                            <input type="text" name="comment" placeholder="Коментарий"
                                   value="<?php if (isset($_POST['comment'])) echo $_POST['comment']; ?>"/>
                            <input type="submit" name="submitOrder" value="Оформить" class="btn btn-default"/>
                        </form>
                    </div><!--/sign up form-->
                <?php endif; ?>
            </div>
        </div>
    </div>
</section><!--/form-->