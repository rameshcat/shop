<?php
class User
{

    public static function registry($name,$email,$password)
    {
        $db = Db::getConnection();

        $password = password_hash($password, PASSWORD_BCRYPT);

        $sql = 'INSERT INTO user (name, email, password) VALUES (:name, :email, :password)';

        $result = $db->prepare($sql);
        $result->bindParam(':name',$name, PDO::PARAM_STR);
        $result->bindParam(':email',$email, PDO::PARAM_STR);
        $result->bindParam(':password',$password, PDO::PARAM_STR);


        return $result->execute();
    }

    public static function checkName($name)
    {

        if ((strlen($name))>0){
            return true;
        } return false;
    }

    public static function checkEmail($email)
    {

        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        } return false;
    }

    public static function checkPassword($password)
    {

        if ((strlen($password))>=8){
            return true;
        } return false;
    }

    public static function checkPhone($phone)
    {
        if  (strlen($phone)>=10){
            return true;
        } return false;
    }
    public static function checkEmailExist($email)
    {

        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM user WHERE email = :email';

        $result = $db->prepare($sql);

        $result->bindParam(':email',$email,PDO::PARAM_STR);
        $result->execute();
        if ($result->fetchColumn()){
            return false;
        } return true;

    }
    public static function checkUserData($email,$password)
    {

        $db = Db::getConnection();

        $sql = 'SELECT * FROM user WHERE email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email',$email);
        $result->execute();
        $user=$result->fetch();

        if (password_verify($password,$user['password'])){
            return array('userId'=>$user['id'], 'role'=>$user['role']);
        }
        return false;
    }
    public static function login($userId,$role)
    {

        $_SESSION['user'] = $userId;
        $_SESSION['role'] = $role;

    }
    public static function checkLoged()
    {

        if (isset($_SESSION['user'])){
            return $_SESSION['user'];
        } else header("Location: /user/login");

    }
    public static function checkAdmin()
    {
        $userId = self::checkLoged();

        $user = self::getUserById($userId);

        if ($user['role']=='admin'){
            return true;
        } else {
            die('Access denied');
        }

    }

    public static function isGuest()
    {

        if (isset($_SESSION['user'])){
            return false;
        } else return true;
    }

    public static function getUserById($userId)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM user WHERE id = :id';

        $result = $db->prepare($sql);

        $result->bindParam(':id',$userId,PDO::PARAM_STR);
        $result->execute();

        return $result->fetch();
    }

    public static function edit($userId, $name, $password)
    {
        $db = Db::getConnection();
        $password = password_hash($password, PASSWORD_BCRYPT);

        $sql = 'UPDATE user SET password = :password, name = :name WHERE id = :id;';

        $result = $db->prepare($sql);

        $result->bindParam(':id',$userId,PDO::PARAM_INT);
        $result->bindParam(':name',$name,PDO::PARAM_STR);
        $result->bindParam(':password',$password,PDO::PARAM_STR);
        $result->execute();
        return true;
    }
}