<?php

class CatalogController
{
    public function actionIndex($page = 1)
    {

        $categories = array();
        $categories = Category::getCategoriesList();

        $latestProducts = array();
        $latestProducts = Product::getProductsList($page);

        $total = Product::getTotalProducts();
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        $data = compact('categories', 'latestProducts', 'pagination');

        return $data;
    }

    public function actionCategory($categoryId, $page = 1)
    {

        $categories = array();
        $categories = Category::getCategoriesList();

        $categoryProducts = array();
        $categoryProducts = Product::getProductsListByCategory($categoryId, $page);

        $total = Product::getTotalProductsInCategory($categoryId);
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        $data = compact('categories','categoryProducts','pagination', 'categoryId');

        return $data;
    }




}