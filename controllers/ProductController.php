<?php

include_once ROOT.'/models/Category.php';
include_once ROOT.'/models/Product.php';
include_once ROOT.'/models/User.php';
include_once ROOT.'/models/Cart.php';
include_once ROOT.'/models/Helper.php';


class ProductController
{

    public function actionView($productId)
    {

        $categories = array();
        $categories = Category::getCategoriesList();

        $product = Product::getProductById($productId);

        require_once (ROOT . '/views/product/view.php');
        return true;
    }






}