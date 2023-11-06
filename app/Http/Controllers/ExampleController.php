<?php

namespace Lupecat\App\Http\Controllers;

use Lupecat\Error\Exceptions\Routing\PathForRouteException;
use Lupecat\RouteDispatcher;
use Lupecat\Routing\Controller;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ExampleController extends Controller {

    /**
     * @throws PathForRouteException
     */
    public function __invoke(RequestInterface $request, ResponseInterface $response, array $args) {

        // Obtener la carga del servidor
        $load = sys_getloadavg();

        // Obtener el uso de memoria
        $memory_usage = memory_get_usage();
        $memory_peak_usage = memory_get_peak_usage();

        // Obtener el espacio en disco
        $disk_total_space = disk_total_space('/');
        $disk_free_space = disk_free_space('/');

        // Obtener el estado del procesador (uso de CPU)
        $cpu_usage = sys_getloadavg()[0];

        // Crear un array con la información recopilada
        $server_info = [
            'load' => $load,
            'memory_usage' => $memory_usage,
            'memory_peak_usage' => $memory_peak_usage,
            'disk_total_space' => $disk_total_space,
            'disk_free_space' => $disk_free_space,
            'cpu_usage' => $cpu_usage,
        ];

		return $response
			->withJson(
				array(
                    'server' => $server_info,
					'properties' => [
                        'settings' => $this->serviceRegistry->getProperties()['settings'],
                        'route'    => RouteDispatcher::getPathByName('test'),
                        'routes'   => RouteDispatcher::getAllRoutes()
                    ]
				)
			);
	}

}