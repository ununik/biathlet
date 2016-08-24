<?php
$language = 'en';
define ('HOME_DIR', $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/biathlete');
session_start();
if (!isset($_SESSION['biathlete_user']) || $_SESSION['biathlete_user'] == '') {
    die();
}

require HOME_DIR . '/autoloading.php';

$training = new Training();
$user = new User($_SESSION['biathlete_user']);

$return = '<table><thead><th>Name</th><th>Energy</th><th>Time</th><th>Money</th><th></th></thead>';
foreach ($training->getAllTrainingsSubcategories($language, $_POST['id']) as $subcategory) {
	$return .= '<tr>';
    $return .= '<td>'.$subcategory['title'].'</td>';
    $return .= '<td>'.$subcategory['energy'].'</td>';
    $return .= '<td>'.\Library\Extra\getEasiestTimeFormSeconds($subcategory['time']).'</td>';
    $return .= '<td>'.\Library\Extra\moneyFormat($subcategory['price']).'</td>';
    if (
    	($user->_actualEnergy < $subcategory['energy']) || ($user->_lastActivityTimestamp > time() || $user->_money < $subcategory['price'])
    ) {
    	$return .= '<td>--</td>';
    } else {
    	$return .= '<td onclick="doTraining(\''.$subcategory['id'].'\')">GO</td>';
    }
    $return .= '</tr>';
}
$return .= '</table>';

echo $return;