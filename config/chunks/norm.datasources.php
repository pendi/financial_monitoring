<?php

return array(
    'norm.datasources' => array(
        'mysql' => array(
            'driver' => '\\Norm\\Connection\\PDOConnection',
            'prefix' => 'mysql',
            'dbname' => 'catetan',
            // 'host' => '192.168.1.10',
            'host' => 'localhost',
            'username' => 'root',
            'password' => 'password',
        ),
    )
);
