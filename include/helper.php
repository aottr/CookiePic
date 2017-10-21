<?php
	require_once "include/UserModel.php";
	require_once "include/configuration.php";
/**
 *	Validate User by hash
 * 	If the User doesn't exists or is already active, it will return false
 *	Prevents other people from reactivating the the access and getting the cookie.
 */
function validateUser($hash) {

	$assc = json_decode(file_get_contents(USR_DATA), true);

	$user = NULL;

	foreach ($assc as $userm) {

		$userm = new UserModel($userm, $userm['Active']);
		if($userm->Hash == $hash)
			$user = $userm;
	}

	if($user == NULL) {

		$view = new View('error');
		$view->set("message", "User doesn't exist.");
		$view->render();
		return false;
	}

	if($user->Active == TRUE) {

		$view = new View('error');
		$view->set("message", "This Hash has already been used.");
		$view->render();
		return false;
	}

	$user->Active = TRUE;

	// save Users
	file_put_contents (USR_DATA, json_encode (array_replace($assc, [ $user->ID => $user ])));
	return $user->ID;
}

function getUserFromId($id) {

	$assc = json_decode(file_get_contents(USR_DATA), true);

	$user = NULL;

	foreach ($assc as $userm) {

		$userm = new UserModel($userm, $userm['Active']);
		if($userm->ID == $id)
			$user = $userm;
	}

	if($user == NULL) {

		$view = new View('error');
		$view->set("message", "User doesn't exist.");
		$view->render();
		return false;
	}
	if($user->Active == FALSE) {

		$view = new View('error');
		$view->set("message", "User is not activated.");
		$view->render();
		return false;
	}

	return $user;
}

class View {

	protected $variables = array();
	protected $action;

	/**
     * Funktion zum Setzen von Variablen
     * @param $name Name der Variable
     * @param $value Wert der Variable
     */
    function set($name, $value) {
	    
	    $this->variables[$name] = $value;
    }

    function __construct($action) {
    
    	$this->action = $action;
    }

	public function render() {
    
    	if($this->variables != NULL)
    		extract($this->variables);
        
        ob_start();
        
            //require_once ( 'data/views/' . "overall_header.tpl");
            require_once ( 'data/views/' . $this->action . ".tpl");
            //require_once ( 'data/views/' . "overall_footer.tpl");
        
        $output = ob_get_contents();
        ob_end_clean();
        echo $output;
    }

}