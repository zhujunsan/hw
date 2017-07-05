<?php

	header('Content-Type: text/json');
	header("Cache-Control: no-cache, must-revalidate");  //当前页面不进行缓存，每次访问的时间必须从服务器上读取最新的数据

	$operate = $_GET["operate"];

	

	class MyDB extends SQLite3
	{
		function __construct(){
         $this->open('test.db');
     	}
	}
	$db = new MyDB();
	if (!$db) {
		$res = ($db->lastErrorMsg());
	} else {
		switch ($operate) {
			case 'insert':
				$name = $_GET["name"];
				$mail = $_GET["mail"];
				$phone = $_GET["phone"];
				$birth = $_GET["birth"];
				$isEmpty = array(
					empty($name), 
					empty($mail), 
					empty($phone), 
					empty($birth)
				);
		   		$sql = "SELECT MAX(ID) FROM ADDRESS";
				$retMaxID = $db->query($sql);
				$rowMaxID = $retMaxID->fetchArray(SQLITE3_ASSOC);
				$ID = $rowMaxID['MAX(ID)'] + 1;
		   		$sql = "
					INSERT INTO ADDRESS (ID, NAME, MAIL, PHONE, BIRTH)
					VALUES ($ID, $name , $mail, $phone, $birth)
		   		";
				$ret = $db->exec($sql);
				if (!$ret) {
					$res = ($db->lastErrorMsg());
				} else {
					$res = 0;
				}
				break;
			case 'select':
				$name = $_GET["name"];
				$mail = $_GET["mail"];
				$phone = $_GET["phone"];
				$birth = $_GET["birth"];
				$isEmpty = array(
					empty($name), 
					empty($mail), 
					empty($phone), 
					empty($birth)
				);
				$sql = "SELECT * FROM ADDRESS";
				$flagFirst = 1;
				for ($i = 0; $i <= 3; $i++) {
					if (!$isEmpty[$i]) {
						if ($flagFirst) {
							$flagFirst = 0;
							$sql = $sql." WHERE ";
						} else {
							$sql = $sql." AND ";
						}
						switch ($i) {
							case 0:
								$sql = $sql."NAME = $name";
								break;
							case 1:
								$sql = $sql."MAIL = $mail";
								break;
							case 2:
								$sql = $sql."PHONE = $phone";
								break;
							case 3:
								$sql = $sql."BIRTH = $birth";
								break;							
							default:
								break;
						}
					}
				}

				$ret = $db->query($sql);
				$i = 0;
				while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
					$tmp = array(
						"id" => $row['ID'],
						"name" => $row['NAME'],
						"mail" => $row['MAIL'],
						"phone" => $row['PHONE'],
						"birth" => $row['BIRTH']
					);
					$res[$i] = $tmp;
					$i = $i + 1;
				}
				if($i == 0) {
					$res = array();
				}
				break;
			case 'delete':
				$id = $_GET["id"];
				$sql = "DELETE FROM ADDRESS WHERE ID = $id";
				$ret = $db->query($sql);
				if (!$ret) {
					$res = ($db->lastErrorMsg());
				} else {
					$res = 0;
				}
				break;
			default:
				# code...
				break;
		}

	}


	$db->close();


// $birthList = explode(',', $birth);
/*
$arrlength = count($id);
for ($x = 0; $x < $arrlength; $x++) {
   $tmp = array(
		"id" => $id[$x],
		"age" => $age[$x]
   );
   $res[$x]=$tmp;
}*/

$json_string = json_encode($res);

echo $json_string;
?>