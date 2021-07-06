<?php



spl_autoload_register(function ($nomDeClasse) {
   $file = str_replace('\\','/', $nomDeClasse);
   /*
    $file = __DIR__.'\\'.$nomDeClasse.'php';
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $file);*/
    require_once "core/$file.php";
});


?>