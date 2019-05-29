<?php

class CabinetController
{
    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoriesList();


        $userId = User::checkLoged();

        $data = compact('categories','userId');

        return $data;
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
        $data = compact('userId','user','name','password','errors','result');

        return $data;
    }

}