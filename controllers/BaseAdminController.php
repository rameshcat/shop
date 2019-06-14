<?php
/**
 * Created by PhpStorm.
 * User: roma
 * Date: 14.06.19
 * Time: 15:52
 */

class BaseAdminController
{
    public function __construct()
    {
        User::checkAdmin();
    }
}