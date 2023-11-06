<?php

namespace Lupecat\App\Http\Handlers;

use Lupecat\Patterns\Error\NotAllowedHandlerInterface;
use Lupecat\Render\Render;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class NotAllowedHandler implements NotAllowedHandlerInterface
{

    /**
     * @throws \Exception
     */
    public function __invoke(RequestInterface $request, ResponseInterface $response, array $methods)
    {
        return Render::load()
            ->createRender(
                'error.405', array()
            );
    }

}