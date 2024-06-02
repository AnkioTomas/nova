<?php

namespace app\controller\index;

use nova\framework\request\Response;

class Main
{
   function json()
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

    function html()
    {
         return Response::asHtml('<h1>Hello Nova</h1>');
    }

    function xml()
    {
        return Response::asXml('<xml><name>nova</name><age>18</age></xml>');
    }

    function text()
    {
        return Response::asText('Hello Nova');
    }

    function file()
    {
        return Response::asFile(ROOT_PATH.'/public/index.php','index.php');
    }

    function static()
    {
        return Response::asStatic(ROOT_PATH.'/public/index.js');
    }


    function redirect()
    {
        return Response::asRedirect('https://www.baidu.com');
    }

    function sse()
    {
        $count = 0;
        return Response::asSse(function ()use (&$count){
            $count++;
            if ($count > 10) {
                return false;
            }
            return [
                "type" => "message",
                "data" => "Hello Nova".$count,
            ];

        });
    }

}