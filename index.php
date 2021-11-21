<?php

// autoload

require_once('Routes.php');

spl_autoload_register(function($class) {

    if(file_exists('./classes/' . $class . '.php')) {
        require_once('./classes/' . $class . '.php');
    } 
    else if(file_exists('./controllers/' . $class . '.php')) {
        require_once('./controllers/' . $class . '.php');
    }
    
});