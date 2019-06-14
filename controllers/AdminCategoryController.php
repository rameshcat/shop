<?php

class AdminCategoryController extends BaseAdminController
{

    public function actionIndex()
    {
        $categoriesList = Category::getCategoriesList();

        $data = compact('categoriesList');

        return $data;
    }

    public function actionCreate()
    {
        if (isset($_POST['submit'])) {

            $name = $_POST['name'];
            $sortOrder = $_POST['sort_order'];
            $status = $_POST['status'];
            $description = $_POST['description'];
            $image = '/template/images/home/category'.$name.'.jpg';
            $errors = false;

            if (!isset($name) || empty($name)) {
                $errors[] = 'Заполните поля';
            }

            if ($errors == false) {

                $id = Category::createCategory($name, $sortOrder, $status, $description, $image);

                if ($id) {
                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {

                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/template/images/home/category$name.jpg");
                    }
                };


                header("Location: /admin/category");
            }
        }
        $data = compact('name','errors','id');

        return $data;
    }

    public function actionUpdate($id)
    {
        $category = Category::getCategoryById($id);

        if (isset($_POST['submit'])) {

            $name = $_POST['name'];
            $sortOrder = $_POST['sort_order'];
            $status = $_POST['status'];

            Category::updateCategoryById($id, $name, $sortOrder, $status);

            header("Location: /admin/category");
        }
        $data = compact('category');

        return $data;
    }

    public function actionDelete($id)
    {
        if (isset($_POST['submit'])) {

            Category::deleteCategoryById($id);

            header("Location: /admin/category");
        }
        $data = compact('id');

        return $data;
    }
}
