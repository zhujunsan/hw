<?php
/**
 * User: xukaiwen@baixing.com
 */

$id = $_POST['id'];
$sql = "DELETE FROM `contacts` where `id`=$id;";
require('connectDatabase.php');

$stmt = $db->query($sql);
echo "<script>alert('删除成功');</script>";
echo "<script>window.location.href='index.php';</script>";
