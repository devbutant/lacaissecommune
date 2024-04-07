<?php
include_once 'Controllers/AbstractController.php';

//Catégories du type de caisse
class Comment{
    // Déclaration des attributs
    private $name;
    private $photo;
    private float $sum;
    private $comment;
    private $date;


    // Name
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }

    // Photo
    public function getPhoto(){
        return $this->photo;
    }
    public function setPhoto($photo){
        $this->photo = $photo;
    }

    // sum
    public function getSum(){
        return $this->sum;
    }
    public function setSum($sum){
        $this->sum = $sum;
    }   

    // Comment
    public function getComment(){
        return $this->comment;
    }
    public function setComment($comment){
        $this->comment = $comment;
    }   

    // Date contribution
    public function getDate(){
        return $this->date;
    }
    public function setDate($date){
        $this->date = $date;
    }   
}