<?php
$language = 'en';
define ('HOME_DIR', $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/biathlete');
session_start();
if (!isset($_SESSION['biathlete_user']) || $_SESSION['biathlete_user'] == '') {
    die();
}

require HOME_DIR . '/autoloading.php';

$user = new User($_SESSION['biathlete_user']);
$level = $user->getLevel();

echo $level;

$stoProcent = $user->expirienceInLevel($level+1) - $user->expirienceInLevel($level);
$aktualniPocetProcent = $user->getActualExpirience() - $user->expirienceInLevel($level);

$pocetProcent = round($aktualniPocetProcent/$stoProcent, 2) * 100;

echo '<div id="toNextLevelWrapper"><div id="toNextLevelInner" style="width: '.$pocetProcent.'%;"></div><div id="toNextLevelNumber">'.$pocetProcent.'%</siv></div>';