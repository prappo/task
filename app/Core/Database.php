<?php
namespace App\Core;
use Illuminate\Database\Capsule\Manager as Capsule;

class Database
{
    public function __construct()
    {
        $capsule = new Capsule;

        $capsule->addConnection([

            "driver" => "mysql",

            "host" => "127.0.0.1",

            "database" => "task",

            "username" => "root",

            "password" => ""

        ]);


        $capsule->setAsGlobal();

        $capsule->bootEloquent();
        $capsule->bootEloquent();
    }
}
