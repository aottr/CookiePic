<?php

class UserModel {

	public $ID;
	public $Name;
	public $Hash;
	public $Active;

	function __construct($uID, $uName, $uHash) {

		$this->ID = $uID;
		$this->Name = $uName;
		$this->Hash = $uHash;
		$this->Active = FALSE;
	}

	public function getID() { return $this->ID; }
}