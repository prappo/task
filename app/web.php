<?php

use App\Controllers\BuyerController;
use App\Controllers\HomeController;
use App\Controllers\ReportController;
use App\Core\Router;
use App\Core\Render;


Router::post('/store', function () {

    $data = $_POST;
    BuyerController::store($data);

});

Router::get("/", function () {

    HomeController::index();
});

Router::get('/report', function () {
    ReportController::index();
});




