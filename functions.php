<?php

function autoLoad($className) {
    $className = explode('\\', $className);
    $className = end($className);
    $pathToFile = '../classes/' . $className . '.php';

    if (file_exists($pathToFile)) {
        require $pathToFile;
    } else {
        echo 'class bestaat niet';
    }
}









spl_autoload_register('autoLoad');