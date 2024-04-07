<?php
// include_once 'Controllers/SecurityController.php';

//Catégories du type de caisse
class PotCategories{
    // Déclaration des attributs
    private $id;
    private $name;
    private $type_name;
    private $photo;
    private $slug;

    // ID category
    public function getIdCategory(){
        return $this->id;
    }
    public function setIdCategory($id){
        $this->id = $id;
    }

    // Name
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }

    // Type name
    public function getTypeName(){
        return $this->type_name;
    }
    public function setTypeName($typeName){
        $this->type_name = $typeName;
    }

    // Photo
    public function getPhoto(){
        return $this->photo;
    }
    public function setPhoto($photo){
        $this->photo = $photo;
    }

    // Slug
    public function getSlug(){
        return $this->slug;
    }
    public function setSlug($slug){
        $this->slug = $slug;
    }
}