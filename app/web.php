<?php

use App\Controllers\BuyerController;
use App\Controllers\HomeController;
use App\Core\Router;
use App\Core\Render;


Router::post('/action', function () {
    print_r($_POST['name']);
});

Router::post('/store', function () {

    $data = $_POST;
    BuyerController::store($data);

});

Router::get("/", function () {

    return Render::view("home");
});

Router::get('/test', function () {
    HomeController::index();
});




