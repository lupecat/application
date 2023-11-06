<?php

require_once dirname(__DIR__, 1) . '/vendor/autoload.php';

error_reporting(E_ALL);
set_error_handler(function ($severity, $message, $file, $line) {
    if (error_reporting() & $severity) {
        throw new \ErrorException($message, 0, $severity, $file, $line);
    }
});

use Lupecat\App\Http\Handlers\ErrorHandler;
use Lupecat\App\Http\Handlers\NotAllowedHandler;
use Lupecat\App\Http\Handlers\NotFoundErrorHandler;
use Lupecat\App\Kernel;

$kernel = Kernel::prepare();

$kernel->routes(
    dirname(__DIR__, 1) . '/routes/web.php',
    dirname(__DIR__, 1) . '/routes/api.php'
);

$kernel->setErrorHandler(
    new ErrorHandler
);

$kernel->setNotAllowedHandler(
    new NotAllowedHandler
);

$kernel->setNotFoundErrorHandler(
    new NotFoundErrorHandler
);

$kernel->run();