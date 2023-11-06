<?php

namespace Lupecat\App\Http\Controllers;

use Lupecat\Routing\RenderController;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ExampleViewController extends RenderController {

    public function __invoke(RequestInterface $request, ResponseInterface $response, array $args) {
        return $this->render($response, 'index', array(
                'variable' => 1
            )
        );
	}

}