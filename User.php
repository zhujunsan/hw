<?php

class User{
	public $id;
	public $name;
	public $tel;
	public $email;
	public $birthday;

	public function introSelf(){
		$idString = empty($this->id) ? "" : "id: $this->id, ";
		return $idString."name: $this->name, tel: $this->tel, email: $this->email, birthday: $this->birthday\n";
	}
}

