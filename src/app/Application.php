<?php

namespace app;

use app\modules\index\MainController;
use nova\framework\request\Route;

class Application
{
    function onFrameworkStart()
    {
        Route::get("/", [MainController::class, "index"]);
    }
}