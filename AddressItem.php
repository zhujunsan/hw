<?php
//通讯录记录对象
class AddressItem {
    var $name;
    var $gender;
    var $email_address;
    var $phone;
    var $birthday;
    var $star;

    function AddressItem($name, $gender, $email_address, $phone, $birthday) {
        $this->name = $name;
        $this->gender = $gender;
        $this->email_address = $email_address;
        $this->phone = $phone;
        $this->birthday = $birthday;
        $this->star = false;
    }

    function getName() {
        return $this->name;
    }

    function getGender() {
        return $this->gender;
    }

    function getEmailAddress() {
        return $this->email_address;
    }

    function getPhone() {
        return $this->phone;
    }

    function getBirthday() {
        return $this->birthday;
    }

    function setInfo($name, $gender, $email_address, $phone, $birthday) {
        $this->name = $name;
        $this->gender = $gender;
        $this->email_address = $email_address;
        $this->phone = $phone;
        $this->birthday = $birthday;
    }

    function star($star) {
        $this->star = $star;
    }
}