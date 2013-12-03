<?php

namespace TeaAdmin\Model;

use TakeATea\Model\AbstractModel;

class User extends AbstractModel
{
    protected $user_id;
    protected $role_id;
    protected $username;
    protected $user_firstname;
    protected $user_lastname;
    protected $user_avatar;
    protected $user_email;
    protected $user_content;
    protected $user_google;
    protected $user_facebook;
    protected $user_twitter;
    protected $user_status;
    protected $user_password;
    protected $user_created;
    protected $user_updated;
    
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
    
    public function getUserFirstname() {
        return $this->user_firstname;
    }

    public function setUserFirstname($user_firstname) {
        $this->user_firstname = $user_firstname;
    }
    
    public function getUserLastname() {
        return $this->user_lastname;
    }

    public function setUserLastname($user_lastname) {
        $this->user_lastname = $user_lastname;
    }
    
    public function getUserAvatar() {
        return $this->user_avatar;
    }

    public function setUserAvatar($user_avatar) {
        $this->user_avatar = $user_avatar;
    }
    
    public function getUserEmail() {
        return $this->user_email;
    }

    public function setUserEmail($user_email) {
        $this->user_email = $user_email;
    }
    
    public function getUserContent() {
        return $this->user_content;
    }

    public function setUserContent($user_content) {
        $this->user_content = $user_content;
    }
    
    public function getUserGoogle() {
        return $this->user_google;
    }

    public function setUserGoogle($user_google) {
        $this->user_google = $user_google;
    }
    
    public function getUserFacebook() {
        return $this->user_facebook;
    }

    public function setUserFacebook($user_facebook) {
        $this->user_content = $user_facebook;
    }
    
    public function getUserTwitter() {
        return $this->user_twitter;
    }

    public function setUserTwitter($user_twitter) {
        $this->user_twitter = $user_twitter;
    }
    
    public function getUserStatus() {
        return $this->user_status;
    }

    public function setUserStatus($user_status) {
        $this->user_status = $user_status;
    }

    public function getUserPassword() {
        return $this->user_password;
    }

    public function setUserPassword($user_password) {
        $this->user_password = $user_password;
    }

    public function getUserCreated() {
        return $this->user_created;
    }

    public function setUserCreated($user_created) {
        $this->user_created = $user_created;
    }

    public function getUserUpdated() {
        return $this->user_updated;
    }

    public function setUserUpdated($user_updated) {
        $this->user_updated = $user_updated;
    }
}