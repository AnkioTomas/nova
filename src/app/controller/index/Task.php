<?php

namespace app\controller\index;

use nova\framework\log\Logger;
use nova\framework\request\Controller;
use nova\framework\request\Response;
use function nova\plugin\task\go;

class Task extends Controller
{
    public function index():Response
    {
        go(function(){
            Logger::info("Log from task");
            $count = 0;
            while ($count < 10){
                Logger::info("Task count: $count");
                $count++;
                sleep(1);
            }
            Logger::info("TaskOver");
        });
        return Response::asText("Hello World");
    }
}