<?php
$login = '';
$mail = '';
$err = array();

if (isset($_POST['registration'])) {
	$login = \Library\Forms\safeText($_POST['login']);
	$mail = \Library\Forms\safeText($_POST['mail']);
	$password = \Library\Forms\safeText($_POST['password']);
	$passwordAgain = \Library\Forms\safeText($_POST['passwordAgain']);
	
	//Validation
	//login
	if (strlen($login) == 0) {
		$err[] = Translation::t($page->_language, 'Login is mandatory field.');
	}
	if (strlen($login) > 255) {
		$err[] = Translation::t($page->_language, 'Login is too long.');
	}
	if ($user->existsLogin($login)) {
		$err[] = Translation::t($page->_language, 'This login is occupied.');
	}
	
	//mail
	if (strlen($mail) == 0) {
		$err[] = Translation::t($page->_language, 'Mail is mandatory field.');
	}
	if (strlen($mail) > 255) {
		$err[] = Translation::t($page->_language, 'Mail is too long.');
	}
	if (!\Library\Forms\validateEMAIL($mail)) {
		$err[] = Translation::t($page->_language, 'Mail has not valid format.');
	}
	if ($user->existsMail($mail)) {
		$err[] = Translation::t($page->_language, 'This mail is occupied.');
	}
	
	//password	
	if (strlen($password) == 0) {
		$err[] = Translation::t($page->_language, 'Password is mandatory field.');
	}
	if ($password !== $passwordAgain) {
		$err[] = Translation::t($page->_language, 'Both passwords are not the same.');
	}
	
	//rules
	if (!isset($_POST['rules'])) {
	    $err[] = Translation::t($page->_language, 'You must agree with rules.');
	}
	
	
	//registration
	if (count($err) == 0) {
		$user->addNew($login, $mail, $password);
		header('Location: '. $page->getLink(3));
	}
}