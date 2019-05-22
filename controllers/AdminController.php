<?php

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