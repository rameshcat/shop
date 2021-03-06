<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        <?php foreach ($categories as $categoryItem): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="<?php echo Helper::uriLink('category', $categoryItem['id']); ?>">
                                            <?php echo $categoryItem['name']; ?>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div><!--/category-products-->
                </div>
            </div>
            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img src="<?php echo Product::getImage($product['id']); ?>" alt=""/>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->
                                <?php if ($product['is_new'] == 1): ?>
                                    <img src="<?php echo Helper::imageLink('new'); ?>" class="newarrival" alt=""/>
                                <?php endif; ?>
                                <h2><?php echo $product['name']; ?></h2>
                                <p>Код товара: <?php echo $product['code']; ?></p>
                                <span>
                                            <span>US $ <?php echo $product['price']; ?></span>
                                            <a href="<?php echo Helper::uriLink('cartAdd', $product['id']); ?>">
                                                <button type="button" class="btn btn-fefault cart">
                                                    <i class="fa fa-shopping-cart"></i>
                                                    В корзину
                                                </button>
                                            </a>
                                        </span>
                                <p><b>Наличие:</b>
                                    <?php if ($product['availability'] == 1) {
                                        echo 'На складе';
                                    } else echo 'Под заказ';
                                    ?>
                                </p>
                                <p><b>Состояние:</b> Новое</p>
                                <p><b>Производитель:</b> <?php echo $product['brand']; ?></p>
                            </div><!--/product-information-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <h5>Описание товара</h5>
                            <p>
                                <?php echo $product['description']; ?>
                            </p>
                        </div>
                    </div>
                </div><!--/product-details-->
            </div>
        </div>
    </div>
</section>
<br/>
<br/>