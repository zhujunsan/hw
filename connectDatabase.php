<?php
/**
 * User: xukaiwen@baixing.com
 */

$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'address_list';
$db_table = 'contacts';

/*  连接数据库  */
$db = new mysqli($db_host, $db_user, $db_password,'address_list') or die ('数据库连接失败！');

/*  选择表  */
$db -> select_db($db_name) or die('数据库选定失败！');