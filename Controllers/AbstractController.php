<?php 

// Methodes généralistes
abstract class AbstractController{

    public function genererPage($data){
        ob_start();
        extract($data); // Retourne en variables les données du tableau associatif $data
        require_once $view; // Est une variable du tableau associatif $data
        $content = ob_get_clean();
        require_once "Views/template.php";
    }

    // public function createPotPage($data){
    //     ob_start();
    //     extract($data); // Retourne en variables les données du tableau associatif $data
    //     require_once $view; // Est une variable du tableau associatif $data
    //     $content = ob_get_clean();
    //     require_once "Views/potPageTemplate.php";
    // }

     // Check Slug 
     public static function returnType($id){
        switch($id){
            case 1 : 
                return 'Cadeau commun';
                break;
            case 2 : 
                return 'Projet personnel ou solidaire';
                break;
            case 3 : 
                return 'Dépense à plusieurs';
                break;
        }
    }
}
?>