<?php
include("AddressItem.php");

$index = $_POST["index"];
$name =  $_POST["name"];
$gender = $_POST["gender"];
$email = $_POST["email"];
$phone =  $_POST["phone"];
$birthday = $_POST["birthday"];

//读
$myfile = fopen("tinyList.txt", "r") or die("Unable to open file!");
$file_content = fread($myfile, filesize("tinyList.txt"));
$address_list = unserialize($file_content);

fclose($myfile);


$address_list[intval($index)]->setInfo(
    $name,
    $gender,
    $email,
    $phone,
    $birthday
);


//写
$myfile = fopen("tinyList.txt", "w") or die("Unable to open file!");

fwrite($myfile, serialize($address_list));

fclose($myfile);

echo "<script language='javascript' type='text/javascript'>";
echo "setTimeout(function(){window.location.href = window.location.origin;}, 10);";
echo "</script>";