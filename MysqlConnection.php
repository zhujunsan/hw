<?php
//jixunzhen@baixing.com

class MysqlConnection{
	private static $con;

	public static function connect(){
		if (!MysqlConnection::$con) {
			MysqlConnection::$con = mysqli_connect("115.159.222.144", "bxhw3dba", "123qweasd", "bxhw3db");
			if (!MysqlConnection::$con){
				print("Could not connect:".mysql_error());
				return null;
			}
			MysqlConnection::createUserTable();
		}
		return MysqlConnection::$con;
	}

	public static function close(){
		if (!MysqlConnection::$con) {
			MysqlConnection::$con.close();
		}
	}

	private static function createUserTable(){
		$createUserSql = "CREATE TABLE if not exists User(
				id int primary key not null auto_increment,
				tel varchar(20),
				name varchar(255),
				email varchar(255),
				birthday varchar(20))";
		mysqli_query(MysqlConnection::$con, $createUserSql);
	}

	public static function selectUsers(){
		$querySql = "SELECT * FROM User";
		$userResult = mysqli_query(MysqlConnection::$con, $querySql);
		$userList = [];
		if (mysqli_num_rows($userResult) > 0){
			while ($row = mysqli_fetch_assoc($userResult)){
				$user = new User();
				$user->id = $row['id'];
				$user->name = $row['name'];
				$user->tel = $row['tel'];
				$user->email = $row['email'];
				$user->birthday = $row['birthday'];

				$userList[] = $user;
			}
		}
		return $userList;
	}

	public static function isUserExist($user){
		$querySql = "SELECT * FROM User WHERE tel = $user->tel OR email = $user->email";
		$result = mysqli_query(MysqlConnection::$con, $querySql);
		if ($result == false){
			return false;
		}
		return true;
	}

	public static function insertUser($newUser){
		$insertSql = "INSERT INTO User (name, tel, email, birthday) VALUES ('$newUser->name', '$newUser->tel', '$newUser->email', '$newUser->birthday')";
		if (mysqli_query(MysqlConnection::$con, $insertSql)) {
			print("Insert Success: id = ".mysqli_insert_id(MysqlConnection::$con)."\n");
		} else {
			print("Insert Fail:\n".$newUser->introSelf());
		}
	}

	public static function updateUser($user){
		$updateSql = "UPDATE User SET name = '$user->name', tel = '$user->tel', email = '$user->email', birthday = '$user->birthday' WHERE id = '$user->id'";

		if (mysqli_query(MysqlConnection::$con, $updateSql)){
			print("Update Success: id = $user->id\n");
		} else {
			print("Update Fail: id = $user->id\n");
		}
	}

	public static function deleteUser($id){
		$deleteSql = "DELETE FROM User WHERE id = $id";
		if (mysqli_query(MysqlConnection::$con, $deleteSql)){
			print("Delete Success: id = $id\n");
		} else {
			print("Delete Fail: id = $id\n");
		}
	}
}

