<?php

class Cart
{
    public static function addProductById($id)
    {
        $id = intval($id);
        $productsInCart = [];

        if (isset($_SESSION['products'])){
            $productsInCart = $_SESSION['products'];
        }

        if (key_exists($id,$productsInCart)){
            $productsInCart[$id]++;
        } else $productsInCart[$id] = 1;

        $_SESSION['products'] = $productsInCart;

    }
    public static function countItems()
    {
        if (isset($_SESSION['products'])) {

            return array_sum($_SESSION['products']);
        } else return 0;

    }

    public static function getProducts()
    {
        if (isset($_SESSION['products'])){
            return $_SESSION['products'];
        } else return false;
    }

    public static function getTotalPrice($products)
    {
        $productInCart = self::getProducts();

        if (isset($products)){
            $totalPrice = 0;
            foreach ($products as $product){
                $totalPrice += $product['price'] * $productInCart[$product['id']];
            }
        }

        return $totalPrice;
    }

    public static function deleteProductById($id)
    {
        $id = intval($id);

        if (isset($_SESSION['products'])){
            $productsInCart = $_SESSION['products'];
        }
        if ($productsInCart[$id]>1){
            $productsInCart[$id]--;
        } else unset($productsInCart[$id]);

        $_SESSION['products'] = $productsInCart;
    }

    public static function createOrder($name,$phone,$comment)
    {

        if (isset($_SESSION['user'])){
            $id = $_SESSION['user'];
        } else $id = NULL;

        $id = intval($id);

        $products = self::getProducts();
        $products = json_encode($products);

        $db = Db::getConnection();

        $sql = "INSERT INTO product_order (id, user_name, user_phone, user_comment, user_id, date, products) VALUES"
        . " (NULL, :name, :phone, :comment, :id, CURRENT_TIMESTAMP, :products)";

        $result = $db->prepare($sql);

        $result->bindParam(':name',$name,PDO::PARAM_STR);
        $result->bindParam(':phone',$phone,PDO::PARAM_STR);
        $result->bindParam(':comment',$comment,PDO::PARAM_STR);
        $result->bindParam(':id',$id,PDO::PARAM_INT);
        $result->bindParam(':products',$products,PDO::PARAM_STR);


        $result->execute();

        unset($_SESSION['products']);

        return true;
    }
}