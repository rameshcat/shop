<?php

class Category extends BaseModel
{

    public static function getCategoriesList()
    {
        $sql = 'SELECT * FROM category ORDER BY sort_order ASC';

        return self::runSelect($sql);
    }
    public static function createCategory($name, $sortOrder, $status, $description, $image)
    {
        $sql = 'INSERT INTO category (name, sort_order, status, category_description, category_image) '
            . 'VALUES (:name, :sort_order, :status, :category_description, :image)';
        $params = [
            'name' => $name,
            'sort_order' => $sortOrder,
            'status' => $status,
            'category_description' => $description,
            'image' => $image,
        ];
        return self::runExecute($sql,$params);
    }
    public static function updateCategoryById($id, $name, $sortOrder, $status)
    {
        $sql = "UPDATE category
            SET 
                name = :name, 
                sort_order = :sort_order, 
                status = :status
            WHERE id = :id";
        $params = [
          'id' => $id,
          'name' => $name,
          'sort_order' => $sortOrder,
          'status' => $status,
        ];
        return self::runExecute($sql,$params);
    }

    public static function getCategoryById($id)
    {
        $id = intval($id);

        $sql = 'SELECT * FROM category WHERE id ='.$id;

        return self::runSelect($sql);
    }
    public static function deleteCategoryById($id)
    {
        $sql = 'DELETE FROM category WHERE id = :id';
        $params = [
            'id' => $id
        ];

        return self::runExecute($sql,$params);
    }

}