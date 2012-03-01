<?php

class AutoLoader {

    public function __construct() {
        spl_autoload_register(array($this, "load"));
    }
    
    public function load($name) {
        $path = str_replace("_", "/", $name);
        $file = sprintf("%s.php", $path);
        if(!@require_once($file)) {
            throw new RuntimeException("Unable to autoload file: " . $file);
        }
    }
    

}