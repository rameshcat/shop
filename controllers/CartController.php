<?php
include_once ROOT.'/models/Cart.php';
include_once ROOT.'/models/User.php';
include_once ROOT.'/models/Category.php';
include_once ROOT.'/models/Product.php';
include_once ROOT.'/models/Helper.php';
class CartController
{
    public function actionAdd($id)
    {
        Cart::addProductById($id);

        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
    }

    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoriesList();

        $productsInCart = false;

        $productsInCart = Cart::getProducts();

        if ($productsInCart){
            $productsIds = array_keys($productsInCart);
            $products = Product::getProductsByIds($productsIds);
        }


        require_once (ROOT.'/views/cart/index.php');

        return true;
    }

    public static function actionDelete($id)
    {
        Cart::deleteProductById($id);

        header("Location: /cart/");
    }

    public static function actionCheckOut()
    {
        $categories = array();
        $categories = Category::getCategoriesList();

        $productsInCart = Cart::getProducts();

        if ($productsInCart){
            $productsIds = array_keys($productsInCart);
            $products = Product::getProductsByIds($productsIds);
        }

        $totalPrice = Cart::getTotalPrice($products);

        if (isset($_SESSION['user'])) {
            $name = User::getUserById($_SESSION['user']);
            $username = $name['name'];
        } else $username = '';

        $phone = '';
        $result = false;

        if (isset($_POST['submitOrder'])){
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $comment = $_POST['comment'];

            $errors = false;
            if (!User::checkName($name)){
                $errors[]='Заполните поле Имя';
            }
            if (!User::checkPhone($phone)){
                $errors[]='Телефон не должен быть менее 10 символов';
            }


            if ($errors == false){

                $result = Cart::createOrder($name,$phone,$comment);
            }

        }

        require_once (ROOT.'/views/cart/checkout.php');
        return true;
    }
}