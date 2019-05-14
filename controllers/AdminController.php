<?php
include_once ROOT.'/models/User.php';
include_once ROOT.'/models/Helper.php';
include_once ROOT.'/models/DbVersion.php';
class AdminController
{
    public static function actionIndex()
    {
        User::checkAdmin();
        DbVersion::versionCheck();

        require_once (ROOT.'/views/admin/view.php');

        return true;

    }

}