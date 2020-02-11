<?php

namespace App\Core;

use App\Core;

class Boot
{
    public function start()
    {
        try {

            new Database();
            new Router(@$_GET["url"]);
            include_once "app/web.php";
            Router::submit();

        } catch (Exception $a) {

            echo $a->getMessage();

        }

    }
}



