<?php

namespace App\Controllers;

use App\Models\Buyer;
use App\Core\Render;

class ReportController
{
    /*
     * Report Page
     */
    public static function index()
    {
        $data = Buyer::all();
        return Render::view("report", compact('data'));
    }

}