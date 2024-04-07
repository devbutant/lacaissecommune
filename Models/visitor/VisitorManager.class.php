<?php
// require_once 'Models/visitor/Pot.class.php';
// require_once 'Models/visitor/PotTypes.class.php';
// require_once 'Models/visitor/PotCategories.class.php';
// require_once 'Models/user/PreFillPotFinalizationEntity.class.php';

class VisitorManager extends Manager{

    private $base;

    public function __construct(PDO $base){
        $this->setDb($base);
    }

    // Get pot
    public function getPot($slug, $id){

        $resultat = $this->getDb()->prepare('SELECT * FROM pots 
        WHERE slug 
        LIKE ?
        AND id_pots = ?');
        $params = [$slug, $id];
        $resultat->execute($params);

        while($ligne = $resultat->fetch()){

            $pot = new Pot();
            $pot->setId($ligne['id_pots']);
            $pot->setIdType($ligne['id_type']);
            $pot->setName($ligne['name']);
            $pot->setDescription($ligne['description']);
            $pot->setPhoto($ligne['photo']);
            $pot->setSumLimit($ligne['sum_limit']);
            $pot->setRecipient($ligne['recipient']);
            $pot->setOrganizer($ligne['organizer']);
            $pot->setDateStart($ligne['date_start']);
            $pot->setDateEnd($ligne['date_end']);
            $pot->setPublic($ligne['public']);
            $pot->setTotal($ligne['total']);
            $pot->setSlug($ligne['slug']);
            $pots[] = $pot;
        } 
        $resultat->closeCursor();

        return ($pots) ? $pots : [];
    }

    // Get pot types 
    public function getPotTypes(){

        $resultat = $this->getDb()->prepare('SELECT * FROM pot_types WHERE slug NOT LIKE ?');
        $params = ['mes-caisses'];
        $resultat->execute($params);

        while($ligne = $resultat->fetch()){

            $potTypes = new PotTypes();
            $potTypes->setId($ligne['id']);
            $potTypes->setName($ligne['name']);
            $potTypes->setDescription($ligne['description']);
            $potTypes->setSlug($ligne['slug']);

            $potTyp[] = $potTypes;
        } 

        $resultat->closeCursor();
        return $potTyp;
    }

     // Get pot types cat
     public function getPotCategories($slug){
        $result = $this->getDb()->prepare(
            'SELECT pc.name, pc.id_type, pc.slug, pc.photo
            from pot_categories pc
            JOIN pot_types pt 
            on pt.id = pc.id_type
            WHERE pt.slug = ?
            AND pc.id_type != 4'
        );
        $params = [$slug];
        $result->execute($params);

        while($row = $result->fetch()){
            
            $potCategory = new PotCategories();
            $potCategory->setIdCategory($row['id_type']);
            $potCategory->setName($row['name']);
            $potCategory->setPhoto($row['photo']);
            $potCategory->setSlug($row['slug']);

            $typCat[] = $potCategory;
        } 
        $result->closeCursor();
        return $typCat;
    }

    // Get public pots
    public function getPublicPots(){

        $result = $this->getDb()->prepare('SELECT * FROM pots where public like 1 ORDER BY date_start DESC');
        $params = [];
        $result->execute($params);

        while($row = $result->fetch()){

            $pot = new Pot();
            $pot->setId($row['id_pots']);
            $pot->setName($row['name']);
            $pot->setPhoto($row['photo']);
            $pot->setSlug($row['slug']);

            $pots[] = $pot;
        } 
        $result->closeCursor();
        return (!empty($pots)) ?  $pots : null;
        // return $pots;
    }

    // Get infos for contributions
    public function getInfosForContrib($id){

        $sql = 
            'SELECT id, name 
            FROM pots
            WHERE id = ?';

        $result = $this->getDb()->prepare($sql);
        $params = [$id];
        $result->execute($params);

        while($row = $result->fetch()){

            $infosContrib = new preFillContributionEntity();
            $infosContrib->setIdPot($row['id']);
            $infosContrib->setPotName($row['name']);

            $infosContribs[] = $infosContrib;
        } 
        $result->closeCursor();
        return $infosContribs;
    }

    // Ajout de ma contribution 
    public function addContribution(ContributionEntity $ent){

        // $sql = "INSERT INTO contributors (name, e_mail, photo) 
        //         VALUES ( ?, 'def-une-adresse@gmail.fr', ?);
        
        //         -- Insérer contribution du contributeur
        //         INSERT INTO contribute (id_pots, id_contributor, sum, comment) 
        //             VALUES(?, last_insert_id(), ?, ?);
                
        //         -- Ajout de la contribution au TOTAL actuel de la caisse
        //         UPDATE pots 
        //             SET total = total + (SELECT sum 
        //                                 FROM contribute 
        //                                 WHERE id_contributor = last_insert_id()) 
        //         WHERE id_pots = ?;
        //         UPDATE contributors cs set cs.photo = 'logo-lcc.svg' where cs.photo = null;";
        $sql = "INSERT INTO contribute (id_user, id_pot, sum, comment, date)
                VALUES(?, ?, ?, ?, NOW())";

            $params = [
                // $ent->getName(),
                // $ent->getPhoto(),
                // $ent->getIdPots(),
                // $ent->getSum(),
                // $ent->getComment(),
                // $ent->getIdPots()
                $ent->getIdUser(),
                $ent->getPot(),
                $ent->getSum(),
                $ent->getComment(),
            ];
            
        $res = $this->getDb()->prepare($sql);
        $res->execute($params);
        $res->closeCursor();
        return $res;
    }

}