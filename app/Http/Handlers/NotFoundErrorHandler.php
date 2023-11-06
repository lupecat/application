<?php

namespace Lupecat\App\Http\Handlers;

use Lupecat\Patterns\Error\NotFoundHandlerInterface;
use Lupecat\Render\Render;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class NotFoundErrorHandler implements NotFoundHandlerInterface
{

    /**
     * @throws \Exception
     */
    public function __invoke(RequestInterface $request, ResponseInterface $response)
    {
        return Render::load()
            ->createRender(
                'error.404', array()
            );
    }

}