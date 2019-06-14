<?php


class Order extends BaseModel
{
    public static function getAllOrders()
    {
        $sql = "SELECT * FROM product_order ORDER BY id";

        return self::runSelect($sql);
    }

    public static function getOrderById($id)
    {
        $id = intval($id);

        $sql = "SELECT * FROM product_order WHERE id=" . $id;

        return self::runSelect($sql);
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