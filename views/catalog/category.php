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
                                        <a href="<?php echo Helper::uriLink('category', $categoryItem['id']); ?>"
                                            <?php if ($categoryItem['id'] == $categoryId): ?>
                                                class="active"
                                            <?php endif; ?>
                                        >
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
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Последние товары</h2>
                    <div class="panel-heading" style="text-align: center">
                        <img src="<?php echo $categoryProducts[0]['category_image']; ?>"/>
                    </div>
                    <div style="padding-bottom: 20px; text-align: justify">
                        <?php echo $categoryProducts[0]['category_description']; ?>
                    </div>
                    <?php foreach ($categoryProducts as $product): ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href="<?php echo Helper::uriLink('product', $product['id']); ?>">
                                            <img src="<?php echo Product::getImage($product['id']); ?>" alt=""/>
                                        </a>
                                        <h2>$<?php echo $product['price']; ?></h2>
                                        <p>
                                            <a href="<?php echo Helper::uriLink('product', $product['id']); ?>">
                                                <?php echo $product['name']; ?>
                                            </a>
                                        </p>
                                        <a href="<?php echo Helper::uriLink('cartAdd', $product['id']); ?>"
                                           class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В
                                            корзину</a>
                                    </div>
                                    <?php if ($product['is_new'] == 1): ?>
                                        <img src="<?php echo Helper::imageLink('new'); ?>" class="new" alt="new"/>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php echo $pagination->get(); ?>
            </div>
        </div>
</section>