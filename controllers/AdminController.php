<?php
include_once ROOT.'/models/User.php';
include_once ROOT.'/models/Helper.php';
class AdminController
{
    public static function actionIndex()
    {
        User::checkAdmin();

        require_once (ROOT.'/views/admin/view.php');

        return true;

    }

}