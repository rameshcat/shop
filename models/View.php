<?php
/**
 * Created by PhpStorm.
 * User: roma
 * Date: 29.05.19
 * Time: 21:51
 */

class View
{
    public function getView($data,$template){
        extract($data);
        require ($template);
    }
}