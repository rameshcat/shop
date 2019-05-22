<?php


class Order
{
    public static function getAllOrders()
    {

        $db = Db::getConnection();

        $orders = array();

        $result = $db->query("SELECT * FROM product_order ORDER BY id");


        $i = 0;
        while ($row = $result->fetch()) {
            $orders[$i]['id'] = $row['id'];
            $orders[$i]['name'] = $row['user_name'];
            $orders[$i]['phone'] = $row['user_phone'];
            $orders[$i]['comment'] = $row['user_comment'];
            $orders[$i]['userId'] = $row['user_id'];
            $orders[$i]['date'] = $row['date'];
            $orders[$i]['products'] = $row['products'];
            $orders[$i]['status'] = $row['status'];
            $orders[$i]['email'] = $row['user_email'];

            $i++;
        };
        return $orders;

    }

    public static function getOrderById($id)
    {
        $id = intval($id);

        if ($id) {

            $db = Db::getConnection();

            $result = $db->query("SELECT * FROM product_order WHERE id=" . $id);

        }
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public static function deleteOrderById($id)
    {
        $id = intval($id);

        if ($id) {
            $db = Db::getConnection();

            $sql = 'DELETE FROM product_order WHERE id = :id';

            $result = $db->prepare($sql);

            $result->bindParam(':id', $id, PDO::PARAM_INT);
            return $result->execute();
        }
        return false;
    }

}