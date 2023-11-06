<?php

use Lupecat\App\Http\Controllers\ExampleController;
use Lupecat\App\Http\Controllers\ExampleViewController;
use Lupecat\RouteDispatcher;

RouteDispatcher::get('/pattern', function ($request, $response) {
    return $response->withJson('ok');
});

RouteDispatcher::post('/pattern', function ($request, $response) {
    return $response->withJson('ok');
});

RouteDispatcher::group('/group', function () {

    RouteDispatcher::get('', function ($request, $response) {
        return $response->withJson('route group');
    });

    RouteDispatcher::get('/route', function ($request, $response) {
        return $response->withJson('sub-route');
    });

    RouteDispatcher::group('/group1', function () {

        RouteDispatcher::get('/route', function ($request, $response) {
            return $response->withJson('group');
        });

    })
        ->add(
            function ($request, $response, $next) {
                print 'middleware';
                return $next($request, $response);
            });

});

RouteDispatcher::group('/test', function () {
    $this->get('', ExampleController::class)->setName('test');
});

RouteDispatcher::group('/view', function () {
    $this->get('', ExampleViewController::class)->setName('view');
});