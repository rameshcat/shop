<?php

class AdminController extends BaseAdminController
{
    public static function actionIndex()
    {
        DbVersion::versionCheck();
        return true;
    }
}