<?php

class Product extends BaseModel
{

    const SHOW_BY_DEFAULT = 6;

    public static function getLatestProduct($count = self::SHOW_BY_DEFAULT)
    {
        $count = intval($count);

        return self::runSelect('SELECT id, name, price, is_new FROM product WHERE status = "1" ORDER BY id DESC LIMIT ' . $count);
    }

    public static function getProductsListByCategory($categoryId = false, $page = 1)
    {
        if ($categoryId) {

            $page = intval($page);

            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

            $sql = "SELECT product.id as id, product.name as name, price, is_new, category.name
                                            as categoryname, category_description, category_image FROM product INNER JOIN 
                                            category ON product.category_id = category.id WHERE product.status = '1' 
                                            AND category_id = '$categoryId' ORDER BY id DESC LIMIT " .
                self::SHOW_BY_DEFAULT . " OFFSET $offset";
            return self::runSelect($sql);
        }
    }

    public static function getProductsList($page = 1)
    {
        $page = intval($page);

        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        $sql = "SELECT code, id, name, price, is_new FROM product WHERE status = '1' ORDER BY id DESC LIMIT " . self::SHOW_BY_DEFAULT . " OFFSET $offset";

        return self::runSelect($sql);
    }

    public static function getAllProducts()
    {
        return self::runSelect('SELECT code, id, name, price, is_new FROM product ORDER BY id');
    }

    public static function getProductById($id)
    {
        $id = intval($id);

        $product = self::runSelect("SELECT * FROM product WHERE id=" . $id);

        return $product[0];
    }

    public static function getTotalProductsInCategory($id)
    {
        $id = intval($id);

        $productsInCategory = self::runSelect("SELECT count(*) FROM product WHERE category_id=" . $id, PDO::FETCH_NUM);

        return $productsInCategory[0][0];
    }

    public static function getTotalProducts()
    {
        $products = self::runSelect("SELECT count(*) FROM product", PDO::FETCH_NUM);

        return $products[0][0];
    }

    public static function getProductsByIds($productsIds)
    {
        $productsIds = implode(',', $productsIds);

        $sql = "SELECT * FROM product WHERE id IN ($productsIds)";

        return self::runSelect($sql);
    }

    public static function deleteProductById($id)
    {
        $id = intval($id);

        $sql = 'DELETE FROM product WHERE id = :id';

        $params = [
          'id' => $id
        ];

       /* if ($id) {
            $db = self::getConnection();

            $sql = 'DELETE FROM product WHERE id = :id';

            $result = $db->prepare($sql);

            $result->bindParam(':id', $id, PDO::PARAM_INT);
            return $result->execute();
        }
        return false;*/
       return self::runExecute($sql,$params);
    }

    public static function createProduct($options)
    {
        $db = self::getConnection();

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

        $db = self::getConnection();

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
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pathToProductImage)) {

            return $pathToProductImage;
        }

        return $path . $noImage;
    }
}
