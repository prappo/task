<?php

namespace App\Controllers;

use App\Models\Buyer;
use Carbon\Carbon;

class BuyerController
{
    public static function store($data)
    {

        $hash_key = self::generateHash($data['receipt_id']);

        $buyer = new Buyer();
        $buyer->amount = $data['amount'];
        $buyer->buyer = $data['buyer'];
        $buyer->receipt_id = $data['receipt_id'];
        $buyer->items = serialize($data['items']);
        $buyer->buyer_email = $data['buyer_email'];
        $buyer->buyer_ip = "192.168.0.1";
        $buyer->note = $data['note'];
        $buyer->city = $data['city'];
        $buyer->phone = $data['phone'];
        $buyer->hash_key = $hash_key;
        $buyer->entry_at = Carbon::now();
        $buyer->entry_by = 1; // demo user ID
        $buyer->save();
        echo "success";

    }

    private static function generateHash($text)
    {
        $salt = substr(str_replace('+', '.', base64_encode(md5(mt_rand(), true))), 0, 16);
        // how many times the string will be hashed
        $rounds = 9999;

        // $6$ for SHA512
        return crypt('password123', sprintf('$6$rounds=%d$%s$', $rounds, $salt));
    }
}