<?php
$html->addToJs(URL_PATH . '/js/profilUpdate.js');

$inactiveStepsPersonal = '';
$inactiveStepsLogin = 'inactiveSteps';
$err = array();
$firstname = $user->_firstname;
$lastname = $user->_lastname;
$mail = $user->getMail();
$login = $user->getLogin();

if (isset($_POST['profilUpdate'])) {
    $inactiveStepsPersonal = '';
    $inactiveStepsLogin = 'inactiveSteps';
    $firstname = \Library\Forms\safeText($_POST['firstname']);
    $lastname = \Library\Forms\safeText($_POST['lastname']);
    $mail = \Library\Forms\safeText($_POST['mail']);
    $login = \Library\Forms\safeText($_POST['login']);
    
    if (strlen($firstname) > 255) {
        $err[] = 'Fisrtname is too long.';
    }
    if (strlen($lastname) > 255) {
        $err[] = 'Lastname is too long.';
    }
    
    //mail
    if (strlen($mail) == 0) {
        $err[] = 'Mail is mandatory field.';
    }
    if (strlen($mail) > 255) {
        $err[] = 'Mail is too long.';
    }
    if (!\Library\Forms\validateEMAIL($mail)) {
        $err[] = 'Mail has not valid format';
    }
    if ($user->existsMail($mail, $user->_id)) {
        $err[] = 'This mail is occupied.';
    }
    
    //login
    if (strlen($login) == 0) {
        $err[] = 'Login is mandatory field.';
    }
    if (strlen($login) > 255) {
        $err[] = 'Login is too long.';
    }
    if ($user->existsLogin($login, $user->_id)) {
        $err[] = 'This login is occupied.';
    }
    
    if (count($err) == 0) {
        $user->updateProfil($firstname, $lastname, $mail, $login);
        header('Location: '. $page->getLink(104));
    }
}

if (isset($_POST['passwordUpdate'])) {
    $inactiveStepsPersonal = 'inactiveSteps';
    $inactiveStepsLogin = '';
    $old = \Library\Forms\safeText($_POST['oldPassword']);
    $new = \Library\Forms\safeText($_POST['newPassword']);
    $new2 = \Library\Forms\safeText($_POST['newPassword2']);
    
    if (!$user->checkPassword($old)) {
        $err[] = 'Wrong old password.';
    }
    if (strlen($old) == 0) {
        $err[] = 'Old password is mandatory field.';
    }
    
    if ($new !== $new2) {
		$err[] = 'Both passwords are not the same.';
	}
    if (strlen($new) == 0) {
        $err[] = 'New password is mandatory field.';
    }
    
    if (count($err) == 0) {
        $user->updateProfilPassword($new);
        header('Location: '. $page->getLink(104));
    }
}