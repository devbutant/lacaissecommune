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
            "SELECT DISTINCT u.fname, u.photo, c.sum, c.comment, c.date
            FROM contribute c
            JOIN pots p
            ON p.id_pots = c.id_pots
            JOIN users u
            ON c.id_contributor = u.id_user
            WHERE c.id_pots = ?
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
