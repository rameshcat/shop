<?php

class AdminProductController extends BaseAdminController
{
    public static function actionIndex()
    {
        $productsList = Product::getAllProducts();

        $data = compact('productsList');

        return $data;

    }
    public static function actionDelete($id)
    {
        if (isset($_POST['submit'])){

            Product::deleteProductById($id);

            header("Location: /admin/product");
        }

        return $id;
    }
    public static function actionCreate()
    {
        $categoryList = Category::getCategoriesList();

        if (isset($_POST['submit'])) {

            $options['name'] = $_POST['name'];
            $options['code'] = $_POST['code'];
            $options['price'] = $_POST['price'];
            $options['category_id'] = $_POST['category_id'];
            $options['brand'] = $_POST['brand'];
            $options['availability'] = $_POST['availability'];
            $options['description'] = $_POST['description'];
            $options['is_new'] = $_POST['is_new'];
            $options['is_recommended'] = $_POST['is_recommended'];
            $options['status'] = $_POST['status'];

            $errors = false;

            if (!isset($options['name']) || empty($options['name'])) {
                $errors[] = 'Заполните поля';
            }
            if ($errors == false) {

                $id = Product::createProduct($options);

                if ($id) {

                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {

                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/$id.png");
                    }
                };

                header("Location: /admin/product");
            }
        }

        $data = compact('errors','options','id','categoryList');

        return $data;

    }
    public function actionUpdate($id)
    {
        $categoriesList = Category::getCategoriesList();

        $product = Product::getProductById($id);

        if (isset($_POST['submit'])) {

            $options['name'] = $_POST['name'];
            $options['code'] = $_POST['code'];
            $options['price'] = $_POST['price'];
            $options['category_id'] = $_POST['category_id'];
            $options['brand'] = $_POST['brand'];
            $options['availability'] = $_POST['availability'];
            $options['description'] = $_POST['description'];
            $options['is_new'] = $_POST['is_new'];
            $options['is_recommended'] = $_POST['is_recommended'];
            $options['status'] = $_POST['status'];

            if (Product::updateProductById($id, $options)) {

                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {

                    move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/$id.jpg");
                }
            }

            header("Location: /admin/product");
        }

        $data = compact('id','options','product','categoriesList');

        return $data;
    }
}