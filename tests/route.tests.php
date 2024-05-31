<?php

use nova\framework\request\Route;
use function nova\framework\route;

include "testHeader.php";

function testRoute(): void
{
    $arrays = [
        "" => route("index", "main", "index"),
        "/" => route("index", "main", "index"),
        "/index/test-{id@number}.html" => route("index", "main", "test"),
        "/index/test-{user@word}-id.html" => route("index", "main", "user"),
        "/index/{hi}/{number}.tpl" => route("index", "hi", "number"),
        "/index/test/{module}/" => route("{module}", "main", "index"),
    ];
    foreach ($arrays as $key => $value) {
        Route::add($key, $value);
    }
    checkObject(Route::dispatch("", "GET"), route("index", "main", "index"));
    checkObject(Route::dispatch("/", "GET") , route("index", "main", "index"));
    checkObject(Route::dispatch("/index/test-1-id.html", "GET"), route("index", "main", "user", ["user" => 1]));
    checkObject(Route::dispatch("/index/test-1.html", "GET") , route("index", "main", "test", ["id" => 1]));
    checkObject(Route::dispatch("/index/hi/1.tpl", "GET"),route("index", "hi", "number", ["hi" => "hi", "number" => 1]));
    checkObject(Route::dispatch("/index/test/module/", "GET"), route("module", "main", "index"));
    checkObject(Route::dispatch("/index/main/module", "GET"), route("index", "main", "module"));
    echo "All tests passed\n";
}

testRoute();