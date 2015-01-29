<?php

/**vider',
        // '\\App\\Media\\Provider\\MediaProvider',
 * Bono App Configuration
 *
 * @category  PHP_Framework
 * @package   Bono
 * @author    Ganesha <reekoheek@gmail.com>
 * @copyright 2013 PT Sagara Xinix Solusitama
 * @license   https://raw.github.com/xinix-technology/bono/master/LICENSE MIT
 * @version   0.10.0
 * @link      http://xinix.co.id/products/bono
 */

$cfg  = array();
$path = __DIR__ . DIRECTORY_SEPARATOR . 'chunks';

if ($handle = opendir($path)) {
    while (false !== ($entry = readdir($handle))) {
        $pathToFile = $path . DIRECTORY_SEPARATOR . $entry;

        if (is_file($pathToFile)) {
            $content = require_once($pathToFile);
            $cfg     = array_merge_recursive($cfg, $content);
        }
    }

    closedir($handle);
}

return $cfg;
