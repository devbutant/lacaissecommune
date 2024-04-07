<?php
// include_once 'Controllers/SecurityController.php';

//Catégories du type de caisse
class PreFillPotFinalizationEntity{
    // Déclaration des attributs
    private $id;
    private $type_name;
    private $cat_name;

    // ID Type
    public function getIdType(){
        return $this->id;
    }
    public function setIdType($IdType){
        $this->id = $IdType;
    }

    // Cat name
    public function getCatName(){
        return $this->cat_name;
    }
    public function setCatName($catName){
        $this->cat_name = $catName;
    }

    // Type name
    public function getTypeName(){
        return $this->type_name;
    }
    public function setTypeName($typeName){
        $this->type_name = $typeName;
    }
}