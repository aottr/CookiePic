<?php

class UserModel {

	public $ID;
	public $Name;
	public $Hash;
	public $Active;

	function __construct($user_assoc, $active = FALSE) {


		$this->ID = $user_assoc['ID'];
		$this->Name = $user_assoc['Name'];
		$this->Hash = $user_assoc['Hash'];
		$this->Active = $active;	
	}

	public function getID() { return $this->ID; }
}