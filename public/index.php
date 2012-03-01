<?php

/**
 * Step 1: Require the Slim PHP 5 Framework
 *
 * If using the default file layout, the `Slim/` directory
 * will already be on your include path. If you move the `Slim/`
 * directory elsewhere, ensure that it is added to your include path
 * or update this file path as needed.
 */
require '../submodules/Slim/Slim/Slim.php';

// TODO: autoloading doesnt work yet and may be removed. for now use require_once() in your scripts
//require 'lib/AutoLoader.php';
//$loader = new AutoLoader();

/**
 * Step 2: Instantiate the Slim application
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
    require($directory . "/" . $fileInfo->getFileName());
}    


/**
 * Step 4: Run the Slim application
 */
$app->run();