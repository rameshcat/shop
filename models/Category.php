<?php

class Category
{

    public static function getCategoriesList()
    {

        $db = Db::getConnection();

        $categoryList = array();

        $result = $db->query('SELECT * FROM category ORDER BY sort_order ASC');

        $i = 0;

        while ($row = $result->fetch()){
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $categoryList[$i]['sort_order'] = $row['sort_order'];
            $categoryList[$i]['status'] = $row['status'];

            $i++;
        }

        return $categoryList;
    }
    public static function createCategory($name, $sortOrder, $status, $description, $image)
    {

        $db = Db::getConnection();

        $sql = 'INSERT INTO category (name, sort_order, status, category_description, category_image) '
            . 'VALUES (:name, :sort_order, :status, :category_description, :image)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':sort_order', $sortOrder, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        $result->bindParam(':category_description', $description, PDO::PARAM_STR_CHAR);
        $result->bindParam(':image', $image, PDO::PARAM_STR_CHAR);
        return $result->execute();
    }
    public static function updateCategoryById($id, $name, $sortOrder, $status)
    {
        $db = Db::getConnection();

        $sql = "UPDATE category
            SET 
                name = :name, 
                sort_order = :sort_order, 
                status = :status
            WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':sort_order', $sortOrder, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function getCategoryById($id)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM category WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }
    public static function deleteCategoryById($id)
    {
        $db = Db::getConnection();

        $sql = 'DELETE FROM category WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        return $result->execute();
    }

}