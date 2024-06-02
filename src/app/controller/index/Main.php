<?php

namespace app\controller\index;

use nova\framework\request\Controller;
use nova\framework\request\Response;

class Main extends Controller
{
   function json(): Response
   {
       return Response::asJson([
           'code' => 200,
           'msg' => 'success',
           'data' => [
               'name' => 'nova',
               'age' => 18
           ]
       ]);
   }

    function html(): Response
    {
         return Response::asHtml('<h1>Hello Nova</h1>');
    }

    function xml(): Response
    {
        return Response::asXml([
            'code' => 200,
            'msg' => 'success',
            'data' => [
                'name' => 'nova',
                'age' => 18
            ]

        ]);
    }

    function text(): Response
    {
        return Response::asText('Hello Nova');
    }

    function file(): Response
    {
        return Response::asFile(ROOT_PATH.'/public/index.php','index.php');
    }

    function static(): Response
    {
        return Response::asStatic(ROOT_PATH.'/public/index.js');
    }


    function redirect(): Response
    {
        return Response::asRedirect('https://www.baidu.com');
    }

    function sse(): Response
    {
        $count = 0;
        return Response::asSse(function ()use (&$count){
            $count++;
            if ($count > 10) {
                return false;
            }
            return [
                "event" => "message",
                "data" => "Hello Nova".$count,
            ];

        });
    }

}