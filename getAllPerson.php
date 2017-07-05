<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2017/7/5
 * Time: 15:51
 */
require_once("Person.php");
require_once ("AddressBook.php");
$persons = AddressBook::getAllPerson();

$json = json_encode($persons);
echo $json;