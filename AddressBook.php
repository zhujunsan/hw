<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 2017/7/5
 * Time: 14:29
 */
require_once("Person.php");

class AddressBook
{
    static private $db_name = "db_addBook";
    static private $tbl_name = "tbl_person";
    static private $user_name = "test";
    static private $password = "123";

    static function getAllPerson()
    {
        $rnt = array();
        $db = new mysqli("localhost", AddressBook::$user_name, AddressBook::$password, AddressBook::$db_name);
        $sql = "select * from ".AddressBook::$tbl_name;
        $result = $db->query($sql);
        if($result==false){
            return null;
        }

        while ($row = $result->fetch_assoc()) {
            $person = new Person();
            $person->setId($row["id"]);
            $person->setName($row['name']);
            $person->setPhone($row['phone']);
            $person->setEmail($row['email']);
            $person->setBirth($row['birth']);

            $rnt[] = $person;
        }

        mysqli_free_result($result);
        mysqli_close($db);
        return $rnt;
    }

    static function updatePerson($id, $name, $phone, $email, $birth)
    {
        $db = new mysqli("localhost", AddressBook::$user_name, AddressBook::$password, AddressBook::$db_name);
        $sql = $db->prepare("UPDATE ".AddressBook::$tbl_name." SET name = ?, phone = ?, email = ?, filmPrice = ?, birth = ? WHERE id = ?");
        $sql->bind_param($name,$phone,$email,$birth);
        $sql->execute();

        mysqli_close($db);
    }

    static function deletePerson($id)
    {
        $db = new mysqli("localhost", AddressBook::$user_name, AddressBook::$password, AddressBook::$db_name);
        $sql = $db->prepare("DELETE FROM ".AddressBook::$tbl_name." WHERE id = ?");
        $sql->bind_param($id);
        $sql->execute();

        mysqli_close($db);
    }

    static function insertPerson($name, $phone, $email, $birth)
    {
        $db = new mysqli("localhost", AddressBook::$user_name, AddressBook::$password, AddressBook::$db_name);
        $sql = $db->prepare("INSERT INTO ".AddressBook::$tbl_name."(name, phone, email, birthday) VALUES (?, ?, ?, ?)");
        $sql->bind_param($name,$phone,$email,$birth);
        $sql->execute();

        mysqli_close($db);
    }

    static function findPersonById($id){
        $db = new mysqli("localhost", AddressBook::$user_name, AddressBook::$password, AddressBook::$db_name);
        $sql = "select * from ".AddressBook::$tbl_name." where id = ".$id;
        $result = $db->query($sql);
        $person = null;

        if($row = $result->fetch_assoc()){
            $person->setId($row["id"]);
            $person->setName($row["name"]);
            $person->setPhone($row["phone"]);
            $person->setEmail(row["email"]);
            $person->setBirth(row["birth"]);
        }

        mysqli_free_result($result);
        mysqli_close($db);
        return $person;
    }
}