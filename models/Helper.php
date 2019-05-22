<?php

class Helper
{
    public static function uriLink($name, $id=null)
    {
        switch ($name) {
            case 'category':
                return "/category/$id";
                break;
            case 'product':
                return "/product/$id";
                break;
            case 'cartAdd':
                return "/cart/add/$id";
                break;
            case 'categoryAdd':
                return "/admin/category/create";
                break;
            case 'categoryUpdate':
                return "/admin/category/update/$id";
                break;
            case 'categoryDelete':
                return "/admin/category/delete/$id";
                break;
            case 'productAdd':
                return "/admin/product/create";
                break;
            case 'productUpdate':
                return "/admin/product/update/$id";
                break;
            case 'productDelete':
                return "/admin/product/delete/$id";
                break;
            case 'adminCategory':
                return "/admin/category";
                break;
            case 'adminProduct':
                return "/admin/product";
                break;
            case 'userDataEdit':
                return "/cabinet/edit";
                break;
            case 'adminPanel':
                return "/admin";
                break;
            case 'adminOrder':
                return "/admin/order";
                break;
            case 'orderDelete':
                return "/admin/order/delete/$id";
                break;
            case 'orderView':
                return "/admin/order/view/$id";
                break;
        }
    }
    public static function imageLink($name)
    {
        switch ($name){
            case 'new':
                return "/template/images/home/new.png";
                break;
        }
    }

}