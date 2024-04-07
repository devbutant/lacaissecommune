<?php
require_once 'DbConnect.class.php';

class Manager{
    
    private $base;

    public function __construct(PDO $base){
        $this->base = $base;
    }

    public function setDb(PDO $base){
        $this->base = $base;
    }

    public function getDb(){
        return $this->base;
    }
}