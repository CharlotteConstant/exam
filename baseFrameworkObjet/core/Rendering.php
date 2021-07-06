<?php

class Rendering {
/**
 * genere le rendu de données interpolées dans un template.
 * genere affichage du template et garde variable tableau associatif
 * 
 * @param string $template
 * @param array $donnees
 * 
 */

public static function render(string $template, array $donnees): void{
    extract($donnees);

// j'active la mémoire tampon
ob_start();

require_once "templates/".$template.".html.php";
//et ce jusqu'à ce qu'on désactive la memoire tampon


$contenuDeLaPage = ob_get_clean();

require_once "templates/layout.html.php";
    
}

}



?>