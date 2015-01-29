<?php

return array(
    'bono.middlewares' => array(
        '\\Bono\\Middleware\\StaticPageMiddleware' => null,
        '\\Bono\\Middleware\\ControllerMiddleware',
        '\\Bono\\Middleware\\ContentNegotiatorMiddleware' => array(
            'extensions' => array(
                'json' => 'application/json',
            ),
            'views' => array(
                'application/json' => '\\Bono\\View\\JsonView',
            ),
        ),
        // '\\ROH\\BonoAuth\\Middleware\\AuthMiddleware' => array(
            // 'driver' => '\\ROH\\BonoAuth\\Driver\\NormAuth'
            // 'driver' => '\\App\\Driver\\CMSAuth'
        // ),
        '\\Bono\\Middleware\\NotificationMiddleware' => null,
        '\\Bono\\Middleware\\SessionMiddleware' => null,
    )
);
