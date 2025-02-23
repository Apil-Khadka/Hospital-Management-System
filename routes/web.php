<?php


use Illuminate\Support\Facades\Route;

$routes = collect(Route::getRoutes())->filter(function ($route) {
    return strpos($route->uri, 'api') === 0;
});

Route::get("/", function () use ($routes) {
    return view("welcome", ["routes" => $routes]);
});
