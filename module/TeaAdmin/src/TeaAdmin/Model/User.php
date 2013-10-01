<?php

namespace TeaAdmin\Model;

use TakeATea\Model\AbstractModel;

class User extends AbstractModel
{
    protected $user_id;
    protected $role_id;
    protected $username;
    protected $firstname;
    protected $lastname;
    protected $email;
    protected $is_active;
    protected $password;
    protected $created_at;
    protected $updated_at;
    
    public function getUserId() {
        return $this->user_id;
    }

    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }
    
    public function getRoleId() {
        return $this->role_id;
    }

    public function setRoleId($role_id) {
        $this->role_id = $role_id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }
    
    public function getFirstname() {
        return $this->firstname;
    }

    public function setFirstname($firstname) {
        $this->firstname = $firstname;
    }
    
    public function getLastname() {
        return $this->lastname;
    }

    public function setLastname($lastname) {
        $this->lastname = $lastname;
    }
    
    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
    
    public function getIsActive() {
        return $this->is_active;
    }

    public function setIsActive($is_active) {
        $this->is_active = $is_active;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }

    public function setCreatedAt($created_at) {
        $this->created_at = $created_at;
    }

    public function getUpdatedAt() {
        return $this->updated_at;
    }

    public function setUpdatedAt($updated_at) {
        $this->updated_at = $updated_at;
    }
}