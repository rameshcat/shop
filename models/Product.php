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

        return self::runExecute($sql, $params);
    }

    public static function createProduct($options)
    {
        $sql = 'INSERT INTO product '
            . '(name, code, price, category_id, brand, availability,'
            . 'description, is_new, is_recommended, status)'
            . 'VALUES '
            . '(:name, :code, :price, :category_id, :brand, :availability,'
            . ':description, :is_new, :is_recommended, :status)';

        $params = [
            'name'              => $options['name'],
            'code'              => $options['code'],
            'price'             => $options['price'],
            'category_id'       => $options['category_id'],
            'brand'             => $options['brand'],
            'availability'      => $options['availability'],
            'description'       => $options['description'],
            'is_new'            => $options['is_new'],
            'is_recommended'    => $options['is_recommended'],
            'status'            => $options['status'],
        ];

        return self::runExecute($sql,$params);
    }

    public static function updateProductById($id, $options)
    {
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

        $params = [
            'id'                => $id,
            'name'              => $options['name'],
            'code'              => $options['code'],
            'price'             => $options['price'],
            'category_id'       => $options['category_id'],
            'brand'             => $options['brand'],
            'availability'      => $options['availability'],
            'description'       => $options['description'],
            'is_new'            => $options['is_new'],
            'is_recommended'    => $options['is_recommended'],
            'status'            => $options['status'],
        ];

       return self::runExecute($sql,$params);
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
