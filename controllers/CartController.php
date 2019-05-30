<?php

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

        $data = compact('categories','productsInCart','productsIds','products');

        return $data;
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
            $email = $_POST['email'];

            $errors = false;
            if (!User::checkName($name)){
                $errors[]='Заполните поле Имя';
            }
            if (!User::checkPhone($phone)){
                $errors[]='Телефон не должен быть менее 10 символов';
            }
            if (!User::checkEmail($email)){
                $errors[]='Неверный e-mail';
            }


            if ($errors == false){

                $result = Cart::createOrder($name,$phone,$comment,$email);
            }

        }

        $data = compact('categories','products','username','productsIds','productsInCart','phone','totalPrice', 'result','name','comment','email','errors');
        return $data;
    }
}