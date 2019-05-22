<?php

class DbVersion
{
    public static function versionCheck()
    {
        $db = Db::getConnection();

        $version = 1;

        $result = $db->query('SELECT version FROM version');

        $result = $result->fetch();


        if ($result[0]<$version){

            $result = self::dbUpdate();

            if ($result){
                $result = self::versionUpdate();
            } else die('call to admin');

            if ($result){
                return true;
            } else die('call to admin');
        }
        return true;

    }

    public static function dbUpdate()
    {
        $db = Db::getConnection();
        //ALTER TABLE `product_order` ADD `user_email` VARCHAR(255) NOT NULL ;
        //$db->query('CREATE TABLE newTable ( new INT(10) NOT NULL , PRIMARY KEY (new)) ENGINE = InnoDB');

        return true;

    }
    public static function versionUpdate()
    {
        $db = Db::getConnection();
        $db->query('UPDATE version SET version = version+1');
        return true;
    }
}