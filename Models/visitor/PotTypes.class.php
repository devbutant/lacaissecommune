<?php

//Catégories du type de caisse
class PotTypes{
    // Déclaration des attributs
    private $id;
    private $name;
    private $description;
    private $slug;

    // ID
    public function getId(){
        return $this->id;
    }
    public function setId($id){
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

    // Slug
    public function getSlug(){
        return $this->slug;
    }
    public function setSlug($slug){
        $slugChecked = SecurityController::checkSlug($slug);
        $this->slug = $slugChecked;
    }
}