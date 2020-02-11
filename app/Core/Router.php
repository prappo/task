<?php

namespace App\Core;

class Router
{

    private static $i = 0;
    protected static $url;
    private static $prappo;
    private static $explode;
    public static $dynamicURL = [];

    public function __construct($url)
    {
        self::$url = trim($url, "/");


        function view($param, $vars = false)
        {
            restore_include_path();
            $vars ? extract($vars) : '';
            include_once "app/Views/$param.php";


        }


    }


    protected static function mainRouter($url, $callback)
    {
        self::$i++;
        $data = gettype($callback);
        if ($data == "object") {

            call_user_func($callback);
        } else {

            $controller_name = explode("@", $callback)[0];


            $method_name = explode("@", $callback)[1];

            if (class_exists($controller_name)) {

                return call_user_func_array(array(new $controller_name(), $method_name), explode("/", self::$url));
            }


        }
    }


    public static function get($url, $callback)
    {


        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $url = ltrim($url, "/");


            if (array_filter(explode("/", self::$url)) == array_filter(explode("/", $url))) {


                self::$dynamicURL = explode("/", self::$url);


                Router::mainRouter($url, $callback);

            } else {

                self::$explode = explode("/", $url);
                self::$prappo = end(self::$explode);
                if (self::$prappo == "*" && explode("/", $url)[0] == explode("/", self::$url)[0]) {
                    self::$dynamicURL = explode("/", self::$url);


                    Router::mainRouter($url, $callback);
                }


            }

        }


    }


    public static function post($url, $callback)
    {


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $url = ltrim($url, "/");


            if (array_filter(explode("/", self::$url)) == array_filter(explode("/", $url))) {


                self::$dynamicURL = explode("/", self::$url);


                Router::mainRouter($url, $callback);

            } else {

                self::$explode = explode("/", $url);
                self::$prappo = end(self::$explode);
                if (self::$prappo == "*" && explode("/", $url)[0] == explode("/", self::$url)[0]) {
                    self::$dynamicURL = explode("/", self::$url);


                    Router::mainRouter($url, $callback);
                }


            }

        }


    }


    public static function submit()
    {

        if (self::$i == 0) {

            return view("404");
        }

    }


}

