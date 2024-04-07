<?php 

class preFillContributionEntity {

    // Déclarer des attributs
    private $pot_name;
    private $id_pot;
    // private $name;
    // private $sum;
    // private $comment;

  
    // ID
    public function getIdPot(){
        return $this->id_pot;
    }

    public function setIdPot($idPot){
        $this->id_pot = $idPot;
    }

    // Pot name

    public function getPotName(){
        return $this->pot_name;
    }

    public function setPotName($potName){
        $this->pot_name = $potName;
    }
    
    // //Name
    // public function getName(){
    //     return $this->name;
    // }

    // public function setName($name){
    //     $this->name = $name;
    // }

    // //Sum
    // public function getSum(){
    //     return $this->sum;
    // }

    // public function setSum($sum){
    //     $this->sum = $sum;
    // }
  
    // //Comment
    // public function getComment(){
    //     return $this->comment;
    // }

    // public function setComment($comment){
    //     $this->comment = $comment;
    // }


}