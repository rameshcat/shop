<?php
/**
 * Created by PhpStorm.
 * User: roma
 * Date: 10.06.19
 * Time: 21:23
 */

class BaseModel
{
    static private $dbConnection;

    static protected function getConnection(){
        if (!isset(self::$dbConnection)){
            self::$dbConnection = Db::getConnection();
        }
        return self::$dbConnection;
    }

    static public function runSelect($sql,$fetch = PDO::FETCH_ASSOC){
        if (!$sql){
            return[];
        }
        try {
            $db = self::getConnection();
            $products = array();
            $result = $db->query($sql);
            return $result->fetchAll($fetch);
        } catch (\Exception $e){
            return[];
        }
    }
}