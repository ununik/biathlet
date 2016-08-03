<?php
$language = 'en';
define ('HOME_DIR', $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/biathlete');
session_start();
if (!isset($_SESSION['biathlete_user']) || $_SESSION['biathlete_user'] == '') {
	die();
}

require HOME_DIR . '/autoloading.php';

$user = new User($_SESSION['biathlete_user']);
$userItem = new UserItem($user->_id);


$return = '';
$userCategory = \Library\extra\getColumnNameInProfilFromEquipmentCategory($_POST['category'], true);

foreach ($userItem->getAllItemsForUser($user->_id, $_POST['category'], $language) as $item) {
	$return .= '<div class="shopItemBoxWrapper">';
	$return .= '<div class="shopItemBox">';
	$return .= '<div class="detail">';
	$return .= '<div class="title">'.$item['title'].'</div>';
	//$return .= '<div>'.$item['description'].'</div>';
	if ($item['image'] != '') {
		$return .= '<img src="'.URL_PATH.$item['image'].'" class="ilustration">';
	}
	$return .= '</div>';
	if ($user->$userCategory == $item['item']) {
		$return .= '<div class="buy noMoney">choosen</div>';
	} else {
		$return .= '<div class="buy" onclick="changeItem(\''.$item['item'].'\', \''.$language.'\')">choose</div>';
	}
	$return .= '</div>';
	$return .= '</div>';
}

echo $return;