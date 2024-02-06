<?php
function includeClasses($className) {
    // Cette fonction est utilisée pour charger dynamiquement des classes à partir de fichiers
    if(file_exists($file = __DIR__.'/'.$className.'.php')) {
        // Vérifie si le fichier de la classe existe en utilisant la fonction file_exists
        require $file;    
        // Si le fichier de la classe existe, il est chargé avec la déclaration require
    }
}

spl_autoload_register('includeClasses');
// Enregistre la fonction includeClasse en tant que chargeur automatique (autoloader) pour les classes


?>