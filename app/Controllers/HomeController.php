<?php

namespace App\Controllers;

use App\Core\Render;
class HomeController
{
    /*
     * Home page
     */
    public static function index()
    {
        return Render::view("home");

    }
}