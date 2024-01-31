<?php

namespace App\Core\Model\Entities;

class User {

    private $id,
            $name,
            $email,
            $password,
            $role,
            $verified,
            $status;

    public function getId() {

        return $this->id;

    }

    public function setId($id) {

        $this->id = $id;

    }

    public function getName() {

        return $this->name;

    }
    
    public function setName($name) {

        $this->name = $name;
        
    }
    
    public function getEmail() {

        return $this->email;

    }
    
    public function setEmail($email) {

        $this->email = $email;
        
    }
    
    public function getPassword() {

        return $this->password;

    }
    
    public function setPassword($password) {

        $this->password = $password;
        
    }
    
    public function getRole() {

        return $this->role;

    }
    
    public function setRole($role) {

        $this->role = $role;
        
    }
    
    public function getVerified() {

        return $this->verified;

    }

    public function setVerified($verified) {

        $this->verified = $verified;
        
    }

    public function getStatus() {

        return $this->status;

    }

    public function setStatus($status) {

        $this->status = $status;
        
    }

}