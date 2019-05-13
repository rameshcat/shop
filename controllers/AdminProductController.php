<?php
include_once ROOT.'/models/User.php';
include_once ROOT.'/models/Product.php';
include_once ROOT.'/models/Category.php';
include_once ROOT.'/models/Helper.php';


class AdminProductController
{
    public static function actionIndex()
    {
        User::checkAdmin();

        $productsList = Product::getAllProducts();

        require_once (ROOT.'/views/admin/productindex.php');

        return true;

    }
    public static function actionDelete($id)
    {
        User::checkAdmin();

        if (isset($_POST['submit'])){

            Product::deleteProductById($id);

            header("Location: /admin/product");
        }

        require_once (ROOT.'/views/admin/productdelete.php');

        return true;
    }
    public static function actionCreate()
    {
        User::checkAdmin();

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

                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/$id.jpg");
                    }
                };

                header("Location: /admin/product");
            }
        }

        require_once (ROOT.'/views/admin/productcreate.php');

        return true;

    }
    public function actionUpdate($id)
    {

        User::checkAdmin();

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

        require_once(ROOT . '/views/admin/productupdate.php');
        return true;
    }

}