<?php
include_once ROOT.'/models/Category.php';
include_once ROOT.'/models/User.php';
include_once ROOT.'/models/Cart.php';

class CabinetController
{
    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoriesList();


        $userId = User::checkLoged();

        require_once (ROOT.'/views/cabinet/view.php');

        return true;
    }
    public function actionEdit()
    {
        $userId = User::checkLoged();
        $user = User::getUserById($userId);


        $name = $user['name'];
        $password = $user['password'];
        $result = false;

        if (isset($_POST['submit'])){
            $name = $_POST['name'];
            $password = $_POST['password'];

            $errors = false;

            if (!User::checkName($name)){
                $errors[]='Заполните поле Имя';

            }
            if (!User::checkPassword($password)){

                $errors[]='Пароль не должен быть менее 8 символов';
            }

            if ($errors == false){

                $result = User::edit($userId,$name,$password);
            }

        }
        require_once (ROOT.'/views/user/edit.php');

        return true;
    }

}