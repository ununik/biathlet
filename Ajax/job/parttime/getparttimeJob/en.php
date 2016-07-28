<?php
$language = 'en';
define ('HOME_DIR', $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/biathlete');
session_start();
if (!isset($_SESSION['biathlete_user']) || $_SESSION['biathlete_user'] == '') {
    die();
}

require HOME_DIR . '/autoloading.php';

$user = new User($_SESSION['biathlete_user']);
$job = new Job();

$currentJob = $job->getParttimeJobFromId($_POST['id']);

if ($user->_lastActivityTimestamp > time()) {
    echo 'You have different activity right now.';
    return;
}

if ($user->_actualEnergy < $currentJob['energy'.$_POST['type']]) {
    echo 'Lack of energy.';
    return;
}

$user->setActualEnergy($user->_actualEnergy - $currentJob['energy'.$_POST['type']], time() + $user->_howLongToNextEnergy);
$user->setMoney($user->_money + $currentJob['price'.$_POST['type']]);
$user->setLastActivity(time() + $_POST['type']*10*60, 'Part time job (' . $currentJob['title'].')');

echo 'done';
//echo $currentJob->doParttimeJob($_POST['id'], $_POST['type'], $user->_id);