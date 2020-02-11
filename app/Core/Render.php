<?php

namespace App\Core;
class Render
{
    public static function view($param, $vars = false)
    {
        restore_include_path();
        $vars ? extract($vars) : '';
        include_once "app/Views/$param.php";


    }
}