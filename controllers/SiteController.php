<?php
class SiteController
{
    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoriesList();

        $latestProducts = array();
        $latestProducts = Product::getLatestProduct(3);

        $data=compact('categories','latestProducts');

        return $data;
    }






}