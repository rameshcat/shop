<?php

include_once ROOT.'/models/Category.php';
include_once ROOT.'/models/Product.php';
include_once ROOT.'/models/User.php';
include_once ROOT.'/models/Cart.php';
include_once ROOT.'/models/Helper.php';


class SiteController
{
    public function actionIndex()
    {

        $categories = array();
        $categories = Category::getCategoriesList();

        $latestProducts = array();
        $latestProducts = Product::getLatestProduct(3);

        require_once(ROOT . '/views/site/index.php');

        return true;
    }






}