<?php

class Product
{

    const SHOW_BY_DEFAULT = 6;

    public static function getLatestProduct($count = self::SHOW_BY_DEFAULT)
    {
        $count = intval($count);

        $db = Db::getConnection();

        $productList = array();

        $result = $db->query('SELECT id, name, price, is_new FROM product WHERE status = "1" ORDER BY id DESC LIMIT '.$count);



        $i = 0;
        while ($row = $result->fetch()){
            $productList[$i]['id'] = $row['id'];
            $productList[$i]['name'] = $row['name'];
            $productList[$i]['price'] = $row['price'];
            $productList[$i]['is_new'] = $row['is_new'];
            $i++;
        };

        return $productList;
    }

    public static function getProductsListByCategory($categoryId = false, $page = 1)
    {

        if ($categoryId) {

            $db = Db::getConnection();

            $page = intval($page);

            $offset = ($page-1) * self::SHOW_BY_DEFAULT;

            $products = array();

            $result = $db->query("SELECT id, name, price, is_new FROM product WHERE status = '1' AND category_id ='$categoryId' ORDER BY id DESC LIMIT ".self::SHOW_BY_DEFAULT." OFFSET $offset");


            $i = 0;
            while ($row = $result->fetch()) {
                $products[$i]['id'] = $row['id'];
                $products[$i]['name'] = $row['name'];
                $products[$i]['price'] = $row['price'];
                $products[$i]['is_new'] = $row['is_new'];
                $i++;
            };
            return $products;
        }
    }
    public static function getProductsList($page = 1)
    {

            $db = Db::getConnection();

            $page = intval($page);

            $offset = ($page-1) * self::SHOW_BY_DEFAULT;

            $products = array();

            $result = $db->query("SELECT code, id, name, price, is_new FROM product WHERE status = '1' ORDER BY id DESC LIMIT ".self::SHOW_BY_DEFAULT." OFFSET $offset");


            $i = 0;
            while ($row = $result->fetch()) {
                $products[$i]['code'] = $row['code'];
                $products[$i]['id'] = $row['id'];
                $products[$i]['name'] = $row['name'];
                $products[$i]['price'] = $row['price'];
                $products[$i]['is_new'] = $row['is_new'];
                $i++;
            };
            return $products;

    }
    public static function getAllProducts()
    {

        $db = Db::getConnection();

        $products = array();

        $result = $db->query("SELECT * FROM product ORDER BY id");


        $i = 0;
        while ($row = $result->fetch()) {
            $products[$i]['code'] = $row['code'];
            $products[$i]['id'] = $row['id'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $products[$i]['is_new'] = $row['is_new'];
            $i++;
        };
        return $products;

    }
    public static function getProductById($id)
    {
        $id = intval($id);

        if ($id) {

            $db = Db::getConnection();

            $result = $db->query("SELECT * FROM product WHERE id=" . $id);
        }
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public static function getTotalProductsInCategory($id)
    {
        $id = intval($id);

        if ($id) {

            $db = Db::getConnection();

            $result = $db->query("SELECT count(*) FROM product WHERE category_id=" . $id);

            $result = $result->fetch();

        }
        return $result[0];


    }
    public static function getTotalProducts()
    {

        $db = Db::getConnection();

        $result = $db->query("SELECT count(*) FROM product");

        $result = $result->fetch();

        return $result[0];

    }

    public static function getProductsByIds($productsIds)
    {
        $products = [];
        $productsIds = implode(',', $productsIds);

        $db = Db::getConnection();
        $sql = "SELECT * FROM product WHERE id IN ($productsIds)";

        $result = $db -> query($sql);

        $i = 0;

        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
            $products[$i]['id'] = $row['id'];
            $products[$i]['code'] = $row['code'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $i++;
        } return $products;


    }
    public static function deleteProductById($id)
    {
        $id = intval($id);

        if ($id) {
            $db = Db::getConnection();

            $sql = 'DELETE FROM product WHERE id = :id';

            $result = $db->prepare($sql);

            $result->bindParam(':id',$id,PDO::PARAM_INT);
            return $result->execute();
        }
        return false;


    }
    public static function createProduct($options)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO product '
            . '(name, code, price, category_id, brand, availability,'
            . 'description, is_new, is_recommended, status)'
            . 'VALUES '
            . '(:name, :code, :price, :category_id, :brand, :availability,'
            . ':description, :is_new, :is_recommended, :status)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        if ($result->execute()) {

            return $db->lastInsertId();
        }

        return 0;
    }
    public static function updateProductById($id, $options)
    {

        $db = Db::getConnection();

        $sql = "UPDATE product
            SET 
                name = :name, 
                code = :code, 
                price = :price, 
                category_id = :category_id, 
                brand = :brand, 
                availability = :availability, 
                description = :description, 
                is_new = :is_new, 
                is_recommended = :is_recommended, 
                status = :status
            WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        return $result->execute();
    }
    public static function getImage($id)
    {

        $noImage = 'no-image.jpg';

        $path = '/upload/images/products/';

        $pathToProductImage = $path . $id . '.jpg';
        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToProductImage)) {

            return $pathToProductImage;
        }

        return $path . $noImage;
    }
}
