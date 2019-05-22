<?php

class UserController
{

    public function actionRegistry()
    {
        $name = '';
        $email = '';
        $password = '';
        $result = false;

        if (isset($_POST['submit'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;
            if (!User::checkName($name)){
                $errors[]='Заполните поле Имя';
            }
            if (!User::checkEmail($email)){
                $errors[]='E-mail неверный';
            }
            if (!User::checkPassword($password)){
                $errors[]='Пароль не должен быть менее 8 символов';
            }

            if (!User::checkEmailExist($email)){

                $errors[]='Такой E-mail уже используется';
            }
            if ($errors == false){

                $result = User::registry($name,$email,$password);
            }

        }
        require_once (ROOT.'/views/user/view.php');

        return true;
    }
    public function actionLogin()
    {
        $email = '';
        $password = '';

        if (isset($_POST['submit'])){
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            $user = User::checkUserData($email,$password);
            if (!User::checkEmail($email)){
                $errors[]='E-mail неверный';
            }
            if (!User::checkPassword($password)){
                $errors[]='Пароль не должен быть менее 8 символов';
            }

            if ($user == false){

                $errors[]='Неверные данные';
            } else {
                User::login($user['userId'],$user['role']);
                header("Location: /cabinet/");
            }

        }


        require_once (ROOT.'/views/user/login.php');

        return true;
    }
    public function actionLogOut()
    {
        session_start();
        unset($_SESSION['user']);
        header("Location: /");

    }

}