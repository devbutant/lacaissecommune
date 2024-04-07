<?php
// Pourquoi importer manager ? On ne l'utilise pas 
require_once 'Models/Manager.class.php';

require_once 'Controllers/AbstractController.php';
require_once 'Controllers/contributor/ContributionEntity.class.php';
require_once 'Controllers/contributor/PreFillContributionEntity.class.php';
include_once 'Controllers/SecurityController.php';


require_once 'Models/DbConnect.class.php';
require_once 'Models/user/UserManager.class.php';
require_once 'Models/visitor/VisitorManager.class.php';
require_once 'Models/contributor/ContributorManager.class.php';

class VisitorController extends AbstractController{
    // Grisé, ne sert à rien .. ?
    // private $manager;

    // Pourquoi les déclarer, si je commente, ça fonctionne aussi ? 
    private $base;
    private $userManager;
    private $contributorManager;
    private $visitorManager;


    public function __construct(){
        // Ne sert à rien .. ?
        // $this->manager = new Manager($this->base);

        $this->base = new Dbconnect();
        $this->userManager = new UserManager($this->base);
        $this->contributorManager = new ContributorManager($this->base);
        $this->visitorManager = new VisitorManager($this->base);
    }

    
    // Homepage 
    public function error($err) {
        $data = [
            'titre' => 'Page inexistante',
            'keywords' => 'page erreur lacaissecommune économie, argent, tirelire en ligne',
            'description' => 'Page erreur la caisse commune cagnotte en ligne, pot commun, économie, argent, tirelire en ligne',
            'err' => $err,
            'view' => 'Views/error.view.php'
        ];
        $this->genererPage($data);  
    }
    
    // Homepage 
    public function home() {
        $typCat = $this->visitorManager->getPotTypes();
        $data = [
            'titre' => 'Accueil',
            'keywords' => 'page accueil lacaissecommune économie, argent, tirelire en ligne homepage',
            'description' => 'page d\'accueil la caisse commune cagnotte en ligne, créez votre caisse cagnotte pot tirelire et gérez votre argent money comme vous le souhaitez',
            'typCat' => $typCat,
            'view' => 'Views/visitor/home.view.php'
        ];
        $this->genererPage($data);  
    }

    // Display Pots
    public function displayPotCat($slug) { 
        $potTyp = $this->visitorManager->getPotTypes();
        $potTypCat = $this->visitorManager->getPotCategories($slug);

        $data= [
            'titre' => 'Créer une caisse',
            'keywords' => 'page création de caisse lacaissecommune économie, argent, tirelire en ligne homepage',
            'description' => 'page création de caisse la caisse commune cagnotte en ligne, créez votre caisse cagnotte pot tirelire et gérez votre argent money comme vous le souhaitez',
            'potTyp' => $potTyp,
            'cat' => $potTypCat,
            'view' => 'Views/visitor/create-pot.view.php'
        ];
        $this->genererPage($data);      
    }

    // Personal pots page
    public function displayMyPots() { 
        $userId = intval($_SESSION['user']['id']['id_user']);
        $potTypCat = $this->userManager->getMyPots($userId);

        $data= [
            'titre' => 'Mes caisses',
            'keywords' => 'page mes caisses lacaissecommune voir mes caisses, mes créations, caisses personnelles ou publiques',
            'description' => 'page mes caisses la caisse commune cagnotte en ligne je gère mes caisses, ma caisse, caisse publique ou privée',
            'cat' => $potTypCat,
            'view' => 'Views/user/personalPots.view.php'
        ];
        $this->genererPage($data);      
    }
    
    // Publics pots
    public function displayPublicPots() { 
        $potTyp = $this->visitorManager->getPotTypes();
        $pot = $this->visitorManager->getPublicPots();

        $data= [
            'titre' => 'Caisses solidaires',
            'keywords' => 'page caisses solidaires lacaissecommune les caisses solidaire, entraide, humanitaire, medical, etudes, environnement, entrepreneuriat',
            'description' => 'page caisses solidaires, voir les caisses solidaires, caisses acceptant tout participants, anonyme ou non, aide, urgence',
            'potTyp' => $potTyp,
            'pot' => $pot,
            'view' => 'Views/visitor/publicPots.view.php'
        ];
        $this->genererPage($data);      
    }

    // Pot chose
    public function potChosen($slug, $id) { 
        $pots = $this->visitorManager->getPot($slug, $id);
        $comments = $this->contributorManager->getComments($id);
        
        // Get pot Name for the <title>
        foreach($pots as $p){
            $potName = $p->getName();
        }

        $data= [
            'titre' => $potName,
            'keywords' => 'page caisse lacaissecommune les caisses solidaire, entraide, humanitaire, medical, etudes, environnement, entrepreneuriat',
            'description' => 'page caisse, voir les caisses solidaires, caisses acceptant tout participants, anonyme ou non, aide, urgence',
            'pots' => $pots,
            'comments' => $comments,
            'view' => 'Views/visitor/single-pot.view.php'
        ];
        $this->genererPage($data);      
    }

    // Form contribution
    public function formContribution($id) { 
        // $data = SecurityController::checkData();
        $contributions = $this->visitorManager->getInfosForContrib($id);
        // $potInfos = $this->visitorManager->getContribution($id);

        $data= [
            'titre' => 'Contribution',
            'keywords' => 'page contribution lacaissecommune les caisses solidaire, entraide, humanitaire, medical, etudes, environnement, entrepreneuriat, contribuer, aider, participer',
            'description' => 'page contribution, voir les caisses solidaires, caisses acceptant tout participants, anonyme ou non, aide, urgence, contribuer, aider, participer',
            'contributions' => $contributions,
            'view' => 'Views/visitor/contribution.view.php'
        ];
        $this->genererPage($data);      
    }

    public function contributionValidation(){
        
        $data = SecurityController::checkData();
        $this->visitorManager->addContribution($this->contribution($data));

        var_dump($this->contribution($data));
        die;    

        header('Location: '.URL.'caisses/caisses-solidaires');
    }

    public function contribution($data){
        $contribution = new ContributionEntity();
        $photoContributor = SecurityController::checkImg();
        $userId = intval($_SESSION['user']['id']['id_user']);


        // Ternary condition 
        ($photoContributor) ?  $data['photo'] = $_FILES['photo']['name'] : null;
        
        // $contribution->setIdPots($data['id_pot']);
        // $contribution->setName($data['name']);
        // $contribution->setPhoto($data['photo']);
        $contribution->setIdUser($userId);
        $contribution->setPot($data['id_pot']);
        $contribution->setSum(floatval($data['sum']));
        $contribution->setComment($data['comment']);


        return $contribution;
    }



    // Login page 
    public function login() {
        $data= [
            'titre' => 'Connexion',
            'keywords' => 'page connexion lacaissecommune les caisses solidaire, entraide, humanitaire, medical, etudes, environnement, entrepreneuriat, accéder aux caisses, se connecter, connexion, login',
            'description' => 'page connexion, voir les caisses solidaires, caisses acceptant tout participants, anonyme ou non, aide, urgence, se connecter, connexion, login',
            'view' => 'Views/visitor/login.view.php'
        ];
        $this->genererPage($data);    
    }

    // Sign up page 
    public function register(){
        $data= [
            'titre' => 'Inscription',
            'keywords' => 'page inscription lacaissecommune les caisses solidaire, entraide, humanitaire, medical, etudes, environnement, entrepreneuriat, accéder aux caisses, s\'inscrire, inscription, register',
            'description' => 'page connexion, voir les caisses solidaires, caisses acceptant tout participants, anonyme ou non, aide, urgence, s\'inscrire, inscription, resgister',
            'view' => 'Views/visitor/register.view.php'
        ];
        $this->genererPage($data);   
    }
    // // ? Login validation : On peut pas faire sur la même page ? 

}