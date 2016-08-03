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
$itemForUser = $userItem->getConcreteItemForUser($_POST['id']);
$item = $userItem->getItemById($itemForUser['item'], $language);
$field = \Library\extra\getColumnNameInProfilFromEquipmentCategory($item['categoryInShop']);
$userItem->setNewItem($field, $_POST['id']);
return;