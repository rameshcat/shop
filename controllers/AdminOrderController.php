<?php

class AdminOrderController extends BaseAdminController
{
    public static function actionIndex()
    {
        $data['orderList'] = Order::getAllOrders();
        return $data;
    }

    public static function actionDelete($id)
    {
        if (isset($_POST['submit'])) {

            Order::deleteOrderById($id);

            header("Location: /admin/order");
        }
        return $id;
    }


    public static function actionView($id)
    {
        $order = Order::getOrderById($id);
        $order = $order[0];

        $products = json_decode($order['products'], true);

        $productsIds = array_keys($products);

        $productList = Product::getProductsByIds($productsIds);

        $data = compact('order', 'productList','products', 'id');

        return $data;
    }

}