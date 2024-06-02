<?php

namespace app;

use nova\framework\iApplication;
use nova\framework\request\Response;
use nova\framework\request\Route;
use nova\framework\request\RouteObject;

class Application implements iApplication
{
    function onAppEnd()
    {
        // TODO: Implement onAppEnd() method.
    }

    function onRouteNotFound(?RouteObject $route, string $uri): ?Response
    {
        return null;
    }

    function onRoute(RouteObject $route)
    {
        // TODO: Implement onRoute() method.
    }

    function onFrameworkStart()
    {
        // TODO: Implement onFrameworkStart() method.
    }

    function onFrameworkEnd()
    {
        // TODO: Implement onFrameworkEnd() method.
    }

    public function onAppStart()
    {

    }

    function onApplicationError(?RouteObject $route, string $uri): ?Response
    {
       return null;
    }
}