<?php
/**
 * User: xukaiwen@baixing.com
 */
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'address_list';
$db_table = 'contacts';

/*  连接mysql  */
$db = new mysqli($db_host,$db_user,$db_password) or die ('数据库连接失败！');

/*  建立数据库  */
$sql = 'CREATE DATABASE `'.$db_name.'` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;';
$db -> query($sql);
$db -> select_db($db_name) or die('数据库选定失败！');

$sqlFile = fopen("createAddressTable.txt", "r") or die("无法打开文件");
$sql = fread($sqlFile,filesize("createAddressTable.txt"));
$sql = 'CREATE TABLE `'.$db_name.'`.`'.$db_table.'` ('.$sql.');';
$db -> query($sql);
