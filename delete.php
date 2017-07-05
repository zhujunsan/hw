<?php
include("AddressItem.php");

$index = $_POST["index"];

//读
$myfile = fopen("tinyList.txt", "r") or die("Unable to open file!");
$file_content = fread($myfile, filesize("tinyList.txt"));
$address_list = unserialize($file_content);

fclose($myfile);

array_splice($address_list, intval($index), 1);


//写
$myfile = fopen("tinyList.txt", "w") or die("Unable to open file!");

fwrite($myfile, serialize($address_list));

fclose($myfile);

echo "<script language='javascript' type='text/javascript'>";
echo "setTimeout(function(){window.location.href = window.location.origin;}, 10);";
echo "</script>";