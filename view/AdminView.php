<?php
/**
 * Created by PhpStorm.
 * User: roma
 * Date: 10.06.19
 * Time: 22:23
 */

class AdminView extends AbstractView
{
    protected function renderHeader(){
        include ROOT . '/views/layouts/headerAdmin.php';
    }
}