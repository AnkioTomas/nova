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


    function sseExample():Response
    {
        return Response::asHtml(
            <<<HTML
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SSE Example</title>
</head>
<body>
    <h1>Server-Sent Events Example</h1>
    <div id="messages"></div>
    <script>
        if (typeof(EventSource) !== "undefined") {
            var source = new EventSource("sse");
            source.addEventListener("message", function(event) {
                var data = event.data;
                var messagesDiv = document.getElementById("messages");
                messagesDiv.innerHTML += "<p>" + data + "</p>";
            });
        } else {
            document.getElementById("messages").innerHTML = "Sorry, your browser does not support server-sent events...";
        }
    </script>
</body>
</html>

HTML
        );
    }

    function sse(): Response
    {

        $count = 0;
        return Response::asSse(function ()use (&$count){

            if ($count > 10) {
                return false;
            }

            // 有50%的概率返回null
            if (rand(0, 1) == 0) {
                return null;
            }
            $count++;
            // if no data , return null
            return [
                "event" => "message",
                "data" => "Hello Nova".$count,
            ];

        });
    }

}