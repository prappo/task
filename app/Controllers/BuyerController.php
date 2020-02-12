<?php

namespace App\Controllers;

use App\Models\Buyer;
use Carbon\Carbon;

class BuyerController
{
    /*
     * Validate post data
     */

    public static function validate($data)
    {
        $validation_status = true;
        $message = "";
        if (!preg_match('/^[0-9]+$/', $data['amount'])) {
            $validation_status = false;
            $message .= ' Amount must be number | ';
        }

        if (!preg_match('/^[0-9a-zA-Z\_ ]{0,20}$/', $data['buyer'])) {
            $validation_status = false;
            $message .= '  Only Text spaces Numbers and 20 characters allow in Buyer filed | ';
        }

        if (!preg_match('/^[a-zA-Z ]*$/', $data['receipt_id'])) {
            $validation_status = false;
            $message .= ' Receipt ID: Only Text allow | ';
        }

        if (!preg_match('/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/', $data['buyer_email'])) {
            $validation_status = false;
            $message .= ' Email is Not valid | ';
        }

        if (!preg_match('/^\W*(\w+(\W+|$)){1,30}$/', $data['note'])) {
            $validation_status = false;
            $message .= ' Note: Anything but not more than 30 words | ';
        }

        if (!preg_match('/^[a-zA-Z ]*$/', $data['city'])) {
            $validation_status = false;
            $message .= ' City: Only Text allow | ';
        }

        return [
            'validation_status' => $validation_status,
            'message' => $message
        ];
    }

    /*
     * Insert data into database
     */

    public static function store($data)
    {
        $vs = self::validate($data); // validation

        if ($vs['validation_status']) {
            $hash_key = self::generateHash($data['receipt_id']);

            $buyer = new Buyer();
            $buyer->amount = $data['amount'];
            $buyer->buyer = $data['buyer'];
            $buyer->receipt_id = $data['receipt_id'];
            $buyer->items = serialize($data['items']);
            $buyer->buyer_email = $data['buyer_email'];
            $buyer->buyer_ip = $data['user_ip'];
            $buyer->note = $data['note'];
            $buyer->city = $data['city'];
            $buyer->phone = $data['phone'];
            $buyer->hash_key = $hash_key;
            $buyer->entry_at = Carbon::now();
            $buyer->entry_by = 1; // demo user ID
            $buyer->save();
            echo "success";
        } else {
            echo $vs['message'];
        }


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