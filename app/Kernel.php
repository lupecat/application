<?php

namespace Lupecat\App;

use Lupecat\Error\Exceptions\BindRouterException;
use Lupecat\Error\Exceptions\OverridePropertiesException;
use Lupecat\Lupecat;
use Lupecat\Render\Render;

class Kernel {

    public static function prepare() {

        try {

            Render::create(
                dirname(__DIR__) . '/resources/views',
                dirname(__DIR__) . '/storage/cache'
            );

            return Lupecat::boot(
                array(
                    'settings' => array(
                        'displayErrors' => true,
                        'displayErrorDetails' => true
                    )
                )
            );

        } catch (BindRouterException $e) {

        } catch (OverridePropertiesException $e) {

        }

    }

}