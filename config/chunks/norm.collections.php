<?php

function parseMapper($chunkFolder = 'chunks', $collectionsFolder = 'norm.collections')
{
    $list   = null;
    $app    = \Bono\App::getInstance();

    $config = array('norm.collections' => array(
        'default' => array(
            'observers' => array(
                '\\Norm\\Observer\\Ownership' => array(),
                '\\Norm\\Observer\\Timestampable' => array(),
                // '\\App\\Observer\\Status' => array(),
            ),
        ),
        'mapping' => array()
    ));

    $path   = $app->config('config.path') .
        DIRECTORY_SEPARATOR . $chunkFolder .
        DIRECTORY_SEPARATOR . $collectionsFolder;

    if ($directoryHandler = opendir($path)) {
        while (($fileName = readdir($directoryHandler)) !== false) {


            if (is_file($path . DIRECTORY_SEPARATOR . $fileName)) {
                $content  = require_once($path . DIRECTORY_SEPARATOR . $fileName);
                $fileName = basename($fileName, '.php');
                $config['norm.collections']['mapping'][$fileName] = $content;
            }
        }

        closedir($directoryHandler);
    }

    return $config;
}

return parseMapper();
