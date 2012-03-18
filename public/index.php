<?php

/**
 *  Require the Slim PHP 5 Framework
 */
require '../submodules/Slim/Slim/Slim.php';
require '../config/core.php';

// TODO: autoloading doesnt work yet and may be removed. for now use require_once() in your scripts
//require 'lib/AutoLoader.php';
//$loader = new AutoLoader();

/**
 * Instantiate the Slim application
 */
$app = new Slim(array(
    'log.enable' => true,
    'log.path' => '../logs',
    'log.level' => 4,
    'templates.path' => '../templates'
));

$directory = "../routes/";
$iterator = new DirectoryIterator($directory);
foreach ($iterator as $fileInfo) {
    if($fileInfo->isDot() || $fileInfo->isDir()) continue;
    require_once($directory . "/" . $fileInfo->getFileName());
}    


/**
 * Run the Slim application
 */
$app->run();