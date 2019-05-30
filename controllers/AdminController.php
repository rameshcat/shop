<?php

class AdminController
{
    public static function actionIndex()
    {
        User::checkAdmin();
        DbVersion::versionCheck();

        return true;

    }

}