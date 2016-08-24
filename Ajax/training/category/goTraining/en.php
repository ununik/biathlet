<?php
$language = 'en';
define ('HOME_DIR', $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/biathlete');
session_start();
if (!isset($_SESSION['biathlete_user']) || $_SESSION['biathlete_user'] == '') {
    die();
}

require HOME_DIR . '/autoloading.php';
$user = new User($_SESSION['biathlete_user']);
$training = new Training();

$actualTraining = $training->getTraining($_POST['id'], $language);

if ($user->_lastActivityTimestamp > time()) {
	echo 'You have different activity right now.';
	return;
}

if ($user->_money < $actualTraining['price']) {
	echo 'No money';
	return;
}

if ($user->_actualEnergy < $actualTraining['energy']) {
	echo 'Lack of energy.';
	return;
}

$user->setActualEnergy($user->_actualEnergy - $actualTraining['energy'], time() + $user->_howLongToNextEnergy);
$user->setMoney($user->_money - $actualTraining['price']);
$user->setLastActivity(time() + $actualTraining['time'], $actualTraining['message']);
$user->setAccuracy($user->_accuracy + ($actualTraining['accuracy']));
$user->setEndurance($user->_endurance + ($actualTraining['endurance']));
$user->setHandPower($user->_handPower + ($actualTraining['handPower']));
$user->setLegPower($user->_legPower + ($actualTraining['legPower']));
$user->setStability($user->_stability + ($actualTraining['stability']));
