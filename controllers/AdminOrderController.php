<?php
include_once ROOT.'/models/User.php';
include_once ROOT.'/models/Product.php';
include_once ROOT.'/models/Category.php';
include_once ROOT.'/models/Helper.php';
include_once ROOT.'/models/Order.php';


class AdminOrderController
{
    public static function actionIndex()
    {
        User::checkAdmin();

        $orderList = (Order::getAllOrders());

        require_once (ROOT.'/views/admin/orderindex.php');

        return true;

    }
    public static function actionDelete($id)
    {
        User::checkAdmin();

        if (isset($_POST['submit'])){

            Order::deleteOrderById($id);

            header("Location: /admin/order");
        }

        require_once (ROOT.'/views/admin/orderdelete.php');

        return true;
    }


    public static function actionView($id)
    {
        User::checkAdmin();

        $order = Order::getOrderById($id);

        $products = json_decode($order['products'],true);

        $productsIds = array_keys($products);

        $productList = Product::getProductsByIds($productsIds);

        require_once (ROOT.'/views/admin/orderview.php');

        return true;
    }

}