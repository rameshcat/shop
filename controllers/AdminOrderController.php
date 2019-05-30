<?php

class AdminOrderController
{
    public static function actionIndex()
    {
        User::checkAdmin();

        $orderList = (Order::getAllOrders());

        $data = compact('orderList');

        return $data;

    }

    public static function actionDelete($id)
    {
        User::checkAdmin();

        if (isset($_POST['submit'])) {

            Order::deleteOrderById($id);

            header("Location: /admin/order");
        }

        return $id;
    }


    public static function actionView($id)
    {
        User::checkAdmin();

        $order = Order::getOrderById($id);

        $products = json_decode($order['products'], true);

        $productsIds = array_keys($products);

        $productList = Product::getProductsByIds($productsIds);

        $data = compact('order', 'productsIds', 'products', 'productList', 'id');

        return $data;
    }

}