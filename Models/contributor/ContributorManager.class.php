<?php
require_once 'Models/contributor/Comment.class.php';

class ContributorManager extends Manager{

    private $base;

    public function __construct(PDO $base){
        $this->setDb($base);
    }

    // Get comment
    public function getComments($id){

        $resultat = $this->getDb()->prepare(
            "SELECT DISTINCT u.pseudo, u.photo, c.sum, c.comment, c.date
            FROM contribute c
            JOIN pot p
            ON p.id = c.id_pot
            JOIN user u
            ON c.id_user = u.id
            WHERE c.id_pot = ?
            ORDER BY c.date DESC"
        );
        $params = [$id];
        $resultat->execute($params);

        while($ligne = $resultat->fetch()){

            $comment = new Comment();
            $comment->setName($ligne['pseudo']);
            $comment->setPhoto($ligne['photo']);
            $comment->setSum($ligne['sum']);
            $comment->setComment($ligne['comment']);
            $comment->setDate($ligne['date']);

            $comments[] = $comment;
        } 

        $resultat->closeCursor();

        return (isset($comments)) ? $comments : [];
    }
}
?>
