<?php
class Contact{
    var $name;
    var $email;
    var $tel;
    var $birthday;

    function getName() {
        return $this->name;
    }

    function getEmail() {
        return $this->email;
    }

    function getTel() {
        return $this->email;
    }

    function setName($str){
        $this->name=$str;
    }

    function setTel($str){
        $this->tel=$str;
    }

    function setEmail($str){
        $this->email=$str;
    }

    function setBirthday($str){
        $this->birthday=$str;
    }

}