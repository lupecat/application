<?php

namespace Lupecat\App\Http\Handlers;

use Lupecat\Patterns\Error\ErrorHandlerInterface;
use Lupecat\Render\Render;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ErrorHandler implements ErrorHandlerInterface {

    /**
     * @throws \Exception
     */
    public function __invoke(RequestInterface $request, ResponseInterface $response, \Exception $exception)
    {
        return Render::load()
            ->createRender(
                'error.500', array()
            );
    }

}