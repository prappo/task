<?php

namespace App\Controllers;

use App\Models\Buyer;

class HomeController
{
    public static function index()
    {
        $buyer = new Buyer();
        $buyer->amount = "123";
        $buyer->buyer = "prince";
        $buyer->receipt_id = "23423432lsk";
        $buyer->items = "Product 1";
        $buyer->buyer_email = "prappo.prince@gmail.com";
        $buyer->buyer_ip = "192.168.0.1";
        $buyer->note = "this is note";
        $buyer->city = "Dhaka";
        $buyer->phone = "01780179511";
        $buyer->hash_key = "$24kjl#";
        $buyer->entry_at = "02-01-2020";
        $buyer->entry_by = 1;
        $buyer->save();
        echo "info saved";

    }
}