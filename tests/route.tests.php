<?php

use nova\framework\request\Route;
use function nova\framework\route;

include "testHeader.php";
function check($obj1, $obj2)
{
    foreach (get_object_vars($obj1) as $key => $value) {
        try {
            assert($obj1->$key == $obj2->$key);
        }catch (AssertionError $e){
            echo "Error: obj1->$key: ".print_r($value,true)." != obj2->$key: " . print_r($obj2->$key ,true). "\n";
        }
    }
}
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
    check(Route::dispatch("", "GET"), route("index", "main", "index"));
    check(Route::dispatch("/", "GET") , route("index", "main", "index"));
    check(Route::dispatch("/index/test-1-id.html", "GET"), route("index", "main", "user", ["user" => 1]));
    check(Route::dispatch("/index/test-1.html", "GET") , route("index", "main", "test", ["id" => 1]));
    check(Route::dispatch("/index/hi/1.tpl", "GET"),route("index", "hi", "number", ["hi" => "hi", "number" => 1]));
    check(Route::dispatch("/index/test/module/", "GET"), route("module", "main", "index"));
    check(Route::dispatch("/index/main/module", "GET"), route("index", "main", "module"));
    echo "All tests passed\n";
}

testRoute();