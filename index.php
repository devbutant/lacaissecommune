<?php
    session_start(); 

    // CONST
    define('URL', str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http")."://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));
    define('PATH', dirname($_SERVER['SCRIPT_FILENAME']));

    require_once 'Controllers/visitor/VisitorController.php';
    require_once 'Controllers/user/UserController.php';
    
    $visitor = new VisitorController();
    $user = new UserController();

    try {
        if(empty($_GET['page'])) {
            $visitor->home();

        } else {
            
        $url = explode('/', filter_var($_GET['page'], FILTER_SANITIZE_URL));
        
        switch($url[0]) {
            case 'accueil' : 
                header('Location: '.URL);
                break;

            case 'caisses' : 
                switch($url[1]) {
                    case 'caisses-solidaires' : 
                        $visitor->displayPublicPots();
                        break;
                    case 'mes-caisses' : 
                        if(SecurityController::isLog()) {
                            $visitor->displayMyPots();
                            break;
                        } else {
                            header('Location: '.URL.'connexion');
                            break;
                        }
                        break;
                        
                    case 'cadeau' : 
                    case 'projet' : 
                    case 'depense' : 
                        if(SecurityController::isLog()) {
                            $visitor->displayPotCat($url[1]);
                            break;
                        } else {
                            header('Location: '.URL.'connexion');
                            break;
                        }
                    default: throw new Exception('La page n\'existe pas où à été déplacée.
                    <br> Merci de bien vouloir suivre les indications ci-dessous.<br><br>');
                }
                break;

            case "caisse" : 
                $visitor->potChosen($url[1], $url[2]); // Dans pot chosen, vérifier si la caisse existe sinon, retourner un throw new exception
                break;

            case 'contribution' : 
                $visitor->formContribution($url[2]);
                break;
            
            case 'contributionValidation' : 
                $visitor->contributionValidation();
                break;


            case 'connexion' : 
                $visitor->login();
                break;

            case 'inscription' : 
                $visitor->register();
                break;
            case 'validation-connexion' : 
                $user->loginValidation();
                break;

            case 'validation-inscription' : 
                $user->accountValidation();
                break;

            // If user 

            case 'deconnexion' : 
                $user->logout();
                break;

            case 'potValidation' : 
                $user->potValidation();
                break;

            case 'finalisation' :
                if(SecurityController::isLog()) {
                    $user->potFinalization($url[1]);
                } else {
                    header('Location: '.URL.'connexion');
                }
                break;

            case 'utilisateurs' : 
                if(SecurityController::isLog()) {
                    $user->afficherUtilisateur();
                } else {
                    header('Location: '.URL.'connexion');
                }
            
            default : throw new Exception('La page n\'existe pas où à été déplacée.<br> Merci de bien vouloir suivre les indications ci-dessous.<br><br>');
            }
        }
    } catch(Exception $e) {
        $visitor->error($e->getMessage());
    }
    
?>


