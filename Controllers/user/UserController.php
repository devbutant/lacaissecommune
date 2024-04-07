<?php

require_once 'Models/user/UserManager.class.php';
// require_once 'Models/contributor/ContributorManager.class.php';
require_once 'Models/user/UserEntity.class.php';
include_once 'Controllers/SecurityController.php';


class UserController extends AbstractController{
    private $base;
    private $userManager;

    public function __construct(){
        $this->base = new Dbconnect();
        $this->userManager = new UserManager($this->base);
    }

    public function loginValidation(){
        $data = SecurityController::checkData();
        $connexion = $this->userManager->verifyPassword($data['mail'], $data['pass']);
        
        //Vérification si compte est stocké existe en BDD
        // $compteValide = $this->userManager->accountValid($data['mail']);
       
        // Si le compte existe alors..
        if($connexion){
            
            // if($compteValide){
                // DisplayController::messageAlerte(DisplayController::VERTE, 'Tu es connecté');
                $userId = $this->userManager->getIdByMail($data['mail']);

                $_SESSION['user'] = [
                    'mail' => $data['mail'],
                    'id' => $userId
                ];
                // header('Location: '.URL.'account/profile');
                // var_dump($_SESSION['user']['id']);
                header('Location: '.URL);
            // } else {
                // DisplayController::messageAlerte(DisplayController::ROUGE, 'Attention compte PAS activé');
                // header('Location: '.URL.'login');
                // var_dump($_SESSION);
            //     echo('compte non valide');
            // }
            
        } else {
            // DisplayController::messageAlerte(DisplayController::ROUGE, 'Tu n\'es pas connecté');
            // header('Location: '.URL.'login');
            // var_dump($_SESSION);
            throw new Exception('Connexion échouée');

        }

        // $data= [
        //     'titre' => 'Login Validation',
        //     'view' => 'Views/visitor/loginValidation.view.php'
        // ];
        // $this->genererPage($data);    
    }

    public function accountValidation(){
        $data = SecurityController::checkData();
        $this->userManager->addAccount($this->user($data));

        header('Location: '.URL.'connexion');
    }

    public function potValidation(){
        $data = SecurityController::checkData();
        $this->userManager->addPot($this->pot($data));
        header('Location: '.URL.'caisses/caisses-solidaires');
    }

    public function pot($data){
        $pot = new Pot();

    // Attribution des valeurs si elles sont présentes et non vides
    if (isset($data['name']) && !empty($data['name'])) {
        $pot->setName($data['name']);
    }
    if (isset($data['description']) && !empty($data['description'])) {
        $pot->setDescription($data['description']);
    }
    if (isset($data['sum_limit']) && !empty($data['sum_limit'])) {
        $pot->setSumLimit($data['sum_limit']);
    }
    if (isset($data['recipient']) && !empty($data['recipient'])) {
        $pot->setRecipient($data['recipient']);
    }
    if (isset($data['organizer']) && !empty($data['organizer'])) {
        $pot->setOrganizer($data['organizer']);
    }
    if (isset($data['date_start']) && !empty($data['date_start'])) {
        $pot->setDateStart($data['date_start']);
    }
    if (isset($data['date_end']) && !empty($data['date_end'])) {
        $pot->setDateEnd($data['date_end']);
    }
    if (isset($data['public']) && !empty($data['public'])) {
        $pot->setPublic($data['public']);
    }
    if (isset($data['total']) && !empty($data['total'])) {
        $pot->setTotal($data['total']);
    }
    if (isset($data['slug']) && !empty($data['slug'])) {
        $pot->setSlug($data['slug']);
    }

    // Retourner l'objet Pot
    return $pot;
}

    public function logout(){
        unset($_SESSION['user']);
        // DisplayController::messageAlerte(DisplayController::ROUGE, 'Tu es déconnecté');
        header('Location: '.URL.'accueil');
    }

    public function afficherUtilisateur(){
        $tab = $this->userManager->getUsers();
        $data = [
            'titre' => 'Utilisateurs',
            'keywords' => 'lacaissecommune la caisse commune le pot commun leetchie cagnotte en ligne synonyme utilisateurs users participants créateur caisse gérant économie, argent, tirelire en ligne',
            'description' => 'Liste des utilisateurs utilisant l\'application web la plus réputée, connue, optimisée, sécurisée du monde La Caisse Commune',

            'tableau' => $tab,
            'view' => 'Views/visitor/user.view.php'
        ];
        $this->genererPage($data);
    }

    public function user($data){
        $user = new UserEntity();
        

        $photoUser = SecurityController::checkImg();

        // Ternary condition 
        ($photoUser) ?  $data['photo'] = $_FILES['photo']['name'] : null;

        $user->setName($data['name']);
        $user->setFname($data['fname']);
        $user->setPhoto($data['photo']);
        $user->setEmail($data['email']);
        $user->setPass($data['pass']);
        $user->setPhone($data['phone']);
        $user->setDob($data['dob']);


        return $user;
    }

    // Pot Finalization
    // public function potFinalization($slug, $id){
    public function potFinalization($slug){
        $infosCategory = $this->userManager->preFillPotFinalization($slug);

        $data= [
            'titre' => 'Créer une caisse',
            'keywords' => 'finaliser caisse, formulaire de finalisation lacaissecommune économie, argent, tirelire en ligne',
            'description' => 'formulaire de finalisation de caisse LaCaisseCommune cagnotte en ligne connue, sécurisée, fiable',
            'categories' => $infosCategory,
            'view' => 'Views/user/potFinalization.view.php'
        ];
        $this->genererPage($data);     
    }
} 