<?php 

class ContributionEntity {

    // Déclarer des attributs
    // private $id_pots;
    // private $name;
    // private $photo;
    // private float $sum;
    // private $comment;


    private $id_user;
    private $pot;
    private float $sum;
    private $comment;

    // $ent->getUser(),
    // $ent->getPot(),
    // $ent->getSum(),
    // $ent->getComment(),
    // $ent->getDate()

  

   //User
    public function getIdUser(){
        return $this->id_user;
    }   

    public function setIdUser($id_user){
        $this->id_user = $id_user;
    }


    //Pot
    public function getPot(){
        return $this->pot;
    }

    public function setPot($pot){
        $this->pot = $pot;
    }

    //Sum
    public function getSum(){
        return $this->sum;
    }

    public function setSum($sum){
        $floatSum = floatval($sum);
        $this->sum = $floatSum;
    }
  
    //Comment
    public function getComment(){
        return $this->comment;
    }

    public function setComment($comment){
        $this->comment = $comment;
    }


    // ID
    // public function getIdPots(){
    //     return $this->id_pots;
    // }

    // public function setIdPots($idPots){
    //     $this->id_pots = $idPots;
    // }
    
    // // Name
    // public function getName(){
    //     return $this->name;
    // }

    // public function setName($name){
    //     $this->name = $name;
    // }

    // // Photo
    // public function getPhoto(){
    //     return $this->photo;
    // }

    // public function setPhoto($photo){
    //     $this->photo = $photo;
    // }
}