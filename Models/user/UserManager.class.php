<?php
require_once 'Models/visitor/Pot.class.php';
require_once 'Models/visitor/PotTypes.class.php';
require_once 'Models/visitor/PotCategories.class.php';
require_once 'Models/user/PreFillPotFinalizationEntity.class.php';

class UserManager extends Manager{

    // Get password user linked at his mail 
    public function getPasswordUser($mail){

        $params = array($mail);
        $resultat = $this->getDb()->prepare('SELECT pass FROM users WHERE email = ?');
        $resultat->execute($params);

        $pass = $resultat->fetch();

        return $pass['pass'];
    }

    // Verfiy password 
    public function verifyPassword($mail, $password){
        $hash = $this->getPasswordUser($mail);
        return password_verify($password, $hash);
    }

    // Verification du compte
    // public function accountValid($mail){
    //     $params = array($mail);
    //     $resultat = $this->getDb()->prepare('SELECT isValid FROM users WHERE email = ?');
    //     $resultat->execute($params);
    //     $isValid = $resultat->fetch();

    //     return ($isValid['isValid'] == 0) ? false : true;
    // }

    // Add account
    public function addAccount(UserEntity $ent){
        $mdpCrypt = password_hash($ent->getPass(), PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (name, fname, photo, email, pass, phone, dob) 
        VALUES(?, ?, ?, ?, ?, ?, ?)";

        $params = [
            $ent->getName(),
            $ent->getFname(),
            $ent->getPhoto(),
            $ent->getEmail(),
            $mdpCrypt,
            $ent->getPhone(),
            $ent->getDob(),
        ];

        $res = $this->getDb()->prepare($sql);
        $res->execute($params);
        $res->closeCursor();

        // return $res->rowCount();
    }

    // // Availablity email
    // public function availablityEmail($email){
    //         $sql = "SELECT nom From user WHERE email = ? ";
    //         $param = [$email];
    //         $res = $this->getDb()->prepare($sql);
    //         $res->execute($param);
    //         $email = $res->fetch(PDO::FETCH_ASSOC);
    //         $res->closeCursor();
    //         return $email;
    //     }

    // Add pot
    public function addPot(Pot $ent){

        $sql = "INSERT INTO pot (id_type, name, description, photo, sum_limit, recipient, id_organizer, date_start, date_end, public, total, slug) 
                VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);
            
                -- INSERT INTO conceive(id_pots, id_user)
                -- VALUES(last_insert_id(), ?)
                ";

        $params = [
            $ent->getIdType(),
            $ent->getName(),
            $ent->getDescription(),
            $ent->getPhoto(),
            $ent->getSumLimit(),
            $ent->getRecipient(),
            // Organizer
            intval($_SESSION['user']['id']['id_user']),

            $ent->getDateStart(),
            $ent->getDateEnd(),
            $ent->getPublic(),
            $ent->getTotal(),
            $ent->getSlug(),

            // intval($_SESSION['user']['id']['id_user'])
        ];
        $res = $this->getDb()->prepare($sql);
        $res->execute($params);
        $res->closeCursor();

        return $res->rowCount();
    }

    // Get my pots
    public function getMyPots($id){
        $sql = 'SELECT *
        FROM pots
        WHERE id_organizer = ?
        ORDER BY date_start DESC';

        $result = $this->getDb()->prepare($sql);

        $params = [$id];
        $result->execute($params);

        while($row = $result->fetch()){
            $pot = new Pot();
            $pot->setId($row['id']);
            $pot->setName($row['name']);
            $pot->setPhoto($row['photo']);
            $pot->setSlug($row['slug']);

            $pots[] = $pot;
        } 
        $result->closeCursor();
        return (!empty($pots)) ? $pots : null;
        // return $pots;
    }

    // Pre-fill pot finalization
    public function preFillPotFinalization($slug){
        $result = $this->getDb()->prepare(
            'SELECT pt.name AS "type_name", pc.name AS "cat_name", pc.id_type AS "id" 
            FROM pot_categories AS pc
            JOIN pot_types AS pt
            ON pt.id = pc.id_type
            WHERE pc.slug = ?'
        );
        $params = [$slug];
        $result->execute($params);

        while($row = $result->fetch()){

            $preFill = new PreFillPotFinalizationEntity();
            $preFill->setCatName($row['cat_name']);
            $preFill->setTypeName($row['type_name']);
            $preFill->setIdType($row['id']);

            $preFillPot[] = $preFill;
        } 
        $result->closeCursor();
        return $preFillPot;
    }

    // Get user by name 
    public function getUsers(){

        $resultat = $this->getDb()->prepare('SELECT * FROM user');
        $params = [];
        $resultat->execute($params);

        while($ligne = $resultat->fetch()){
            $user = new UserEntity();
            $user->setId($ligne['id']);
            $user->setName($ligne['pseudo']);
            $user->setPhoto($ligne['photo']);
            $user->setEmail($ligne['email']);

            $tab[] = $user;
        }
        $resultat->closeCursor();
        return $tab;
    }

    // Get ID by mail 
    public function getIdByMail($mail){
        $result = $this->getDb()->prepare('SELECT id_user FROM users WHERE email LIKE ?');
        $params = [$mail];
        $result->execute($params);

        $userId = $result->fetch();
        return $userId;
    }
}