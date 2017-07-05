<?php

class User{
	public $id;
	public $name;
	public $tel;
	public $email;
	public $birthday;

	public function introSelf(){
		print("id: $this->id, name: $this->name, tel: $this->tel, email: $this->email, birthday: $this->birthday\n");
	}
}

