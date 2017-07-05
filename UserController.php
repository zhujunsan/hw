<?php

class UserController{
	public function __construct(){
		MysqlConnection::connect();
	}

	public function __destruct(){
		MysqlConnection::close();
	}

	public function route($action, $request){
		$this->$action($request);
	}

	public function newUser($request){
		$user = $this->getUser($request);
		if ($this->isAvailableUser($user)){
			MysqlConnection::insertUser($user);
		}
	}

	public function deleteUser($request){
		MysqlConnection::deleteUser($request['id']);
	}

	public function updateUser($request){
		$user = $this->getUser($request);
		$user->id = $request['id'];
		if ($this->isAvailableUser($user)){
			MysqlConnection::updateUser($user);
		}
	}

	public function getAllUser(){
		$userList = MysqlConnection::selectUsers();
		return $userList; 
	}

	function getUser($request){
		$user = new User();
		$user->name = $request['userName'];
		$user->tel = $request['phoneNumber'];
		$user->email = $request['email'];
		$user->birthday = $request['birthday'];

		return $user;
	}

	function isAvailableUser($user){
		$avail = true;
		$avail &= !empty($user->name);
		$avail &= !empty($user->tel);
		$avail &= !empty($user->email);
		$avail &= !empty($user->birthday);
		return $avail;
	}
}
