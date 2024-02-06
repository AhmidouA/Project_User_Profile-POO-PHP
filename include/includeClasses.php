<?php
function includeClasses($className) {
    if(file_exists($file = __DIR__.'/'.$className.'.php')) {
        require $file;    
    }
}

spl_autoload_register('includeClasses')
?>