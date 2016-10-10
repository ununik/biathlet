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
$userItem = new UserItem($user->_id);

$actualTraining = $training->getTraining($_POST['id'], $language);

if ($user->_lastActivityTimestamp > time()) {
	echo 'You have different activity right now.';
	return;
}

if ($user->getLevel() < $actualTraining['level']) {
    echo 'Low level';
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

if (isset($_POST['ammo'])) {
	$ammo = $userItem->getConcreteItemForUserFromID($_POST['ammo']);
	if ($ammo['count'] < $actualTraining['cartridges']) {
		echo 'Lack of cartridges.';
		return;
	}
	
	 $userItem->setItemCount($ammo['count']-$actualTraining['cartridges'], $ammo['id']);
}

$user->setActualEnergy($user->_actualEnergy - $actualTraining['energy'], time() + $user->_howLongToNextEnergy);
$user->setMoney($user->_money - $actualTraining['price']);
$user->setLastActivity(time() + $actualTraining['time'], $actualTraining['message']);
$user->setAccuracy($user->_accuracy + ($actualTraining['accuracy']));
$user->setEndurance($user->_endurance + ($actualTraining['endurance']));
$user->setHandPower($user->_handPower + ($actualTraining['handPower']));
$user->setLegPower($user->_legPower + ($actualTraining['legPower']));
$user->setStability($user->_stability + ($actualTraining['stability']));
$user->setMaxEnergy($user->_maxEnergy + ($actualTraining['addToEnergy']));
$user->setExpereince($user->getActualExpirience() + $actualTraining['expirience']);