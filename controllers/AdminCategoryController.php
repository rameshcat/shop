<?php
include_once ROOT.'/models/User.php';
include_once ROOT.'/models/Category.php';
include_once ROOT.'/models/Helper.php';

class AdminCategoryController
{

    public function actionIndex()
    {
        User::checkAdmin();

        $categoriesList = Category::getCategoriesList();

        require_once(ROOT . '/views/admin/categoryindex.php');
        return true;
    }

    public function actionCreate()
    {
        User::checkAdmin();

        if (isset($_POST['submit'])) {

            $name = $_POST['name'];
            $sortOrder = $_POST['sort_order'];
            $status = $_POST['status'];

            $errors = false;

            if (!isset($name) || empty($name)) {
                $errors[] = 'Заполните поля';
            }

            if ($errors == false) {

                Category::createCategory($name, $sortOrder, $status);

                header("Location: /admin/category");
            }
        }
        require_once(ROOT . '/views/admin/categorycreate.php');
        return true;
    }

    public function actionUpdate($id)
    {
        User::checkAdmin();

        $category = Category::getCategoryById($id);

        if (isset($_POST['submit'])) {

            $name = $_POST['name'];
            $sortOrder = $_POST['sort_order'];
            $status = $_POST['status'];

            Category::updateCategoryById($id, $name, $sortOrder, $status);

            header("Location: /admin/category");
        }
        require_once(ROOT . '/views/admin/categoryupdate.php');
        return true;
    }

    public function actionDelete($id)
    {
        User::checkAdmin();

        if (isset($_POST['submit'])) {

            Category::deleteCategoryById($id);

            header("Location: /admin/category");
        }

        require_once(ROOT . '/views/admin/categorydelete.php');
        return true;
    }

}
