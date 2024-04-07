<?php 

//Participants
class UserEntity{
    // Déclaration des attributs
    private $id_user;
    private $fname;
    private $name;
    private $photo;
    private $email;
    private $pass;
    private $phone;
    private $dob;

    //ID
    public function getId(){
        return $this->id_user;
    }
    public function setId($id){
        $this->id_user = $id;
    }
    
    //Fname
    public function getFname(){
        return $this->fname;
    }
    public function setFname($fname){
        $this->fname = $fname;
    }

    //Name
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }

    //Photo
    public function getPhoto(){
        return $this->photo;
    }
    public function setPhoto($photo){
        $this->photo = $photo;
    }

    //Email
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }

    //Pass
    public function getPass(){
        return $this->pass;
    }
    public function setPass($pass){
        $this->pass = $pass;
    }

    //Phone
    public function getPhone(){
        return $this->phone;
    }
    public function setPhone($phone){
        $this->phone = $phone;
    }

    //DOB
    public function getDob(){
        return $this->dob;
    }
    public function setDob($dob){
        $this->dob = $dob;
    }
}