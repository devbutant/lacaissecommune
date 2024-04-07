<?php
include_once 'Controllers/AbstractController.php';

//Catégories du type de caisse
class Pot{
    // Déclaration des attributs
    private $id_pots;
    private $id;
    private $name;
    private $description;
    private $photo;
    private $sum_limit;
    private $recipient;
    private $organizer;
    private $date_start;
    private $date_end;
    private $public;
    private $total;
    private $slug;

    private $name_type;

    // Name type
    public function getNameType(){
        $id = $this->id;
        // return AbstractController::returnType($id);
        $this->name_type = AbstractController::returnType($id);
        return $this->name_type;
    }
    public function setNameType($nameType){
        $this->name_type = $nameType;
    }


    // ID
    public function getId(){
        return $this->id_pots;
    }
    public function setId($id){
        $this->id_pots = $id;
    }

    // ID type
    public function getIdType(){
        return $this->id;
        // return AbstractController::returnType($id);
    }
    public function setIdType($id){
        $this->id = $id;
    }

    // Name
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }

    // Description
    public function getDescription(){
        return $this->description;
    }
    public function setDescription($description){
        $this->description = $description;
    }   
    
    // Photo
    public function getPhoto(){
        return $this->photo;
    }
    public function setPhoto($photo){
        $this->photo = $photo;
    }   

    // sumLimit
    public function getSumLimit(){
        return $this->sum_limit;
    }
    public function setSumLimit($sumLimit){
        $this->sum_limit = $sumLimit;
    }   

    // Recipient
    public function getRecipient(){
        return $this->recipient;
    }
    public function setRecipient($recipient){
        $this->recipient = $recipient;
    }   

    // Organizer
    public function getOrganizer(){
        return $this->organizer;
    }
    public function setOrganizer($organizer){
        $this->organizer = $organizer;
    }   

    // Date start
    public function getDateStart(){
        return $this->date_start;
    }
    public function setDateStart($date){
        $this->date_start = $date;
    }

    // Date end
    public function getDateEnd(){
        return $this->date_end;
    }
    public function setDateEnd($date){
        $this->date_end = $date;
    }

    // Public
    public function getPublic(){
        return ($this->public == 'on') ? 1 : 0;
        // return $this->public;
    }
    public function setPublic($public){
        $this->public = $public;
    }

    // Total
    public function getTotal(){
        return ($this->total == null) ? 0 : $this->total;
    }
    public function setTotal($total){
        $this->total = $total;
    }

    // Slug
    public function getSlug(){
        return $this->slug;
    }
    public function setSlug($slug){
        $slugChecked = SecurityController::checkSlug($slug);
        $this->slug = $slugChecked;
    }

   
}