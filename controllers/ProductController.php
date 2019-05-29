<?php

class ProductController
{

    public function actionView($productId)
    {

        $categories = array();
        $categories = Category::getCategoriesList();

        $product = Product::getProductById($productId);

        $data = compact('categories','product');

        return $data;
    }






}