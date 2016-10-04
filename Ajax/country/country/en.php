<?php
$language = 'en';
define ('HOME_DIR', $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/biathlete');
session_start();
if (!isset($_SESSION['biathlete_user']) || $_SESSION['biathlete_user'] == '') {
	die();
}

require HOME_DIR . '/autoloading.php';
$user = new User($_SESSION['biathlete_user']);
if (isset($_POST['country'])) {
	$user->setCountry($_POST['country']);
	echo 1;
} else {
	echo 0;
}