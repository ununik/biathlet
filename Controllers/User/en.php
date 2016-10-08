<?php
$userId = $user->getUserByLogin($page->getSpecialValue(1));
if ($userId == false) {
	$userId = $user->_id;
}

$profil = new User($userId);
if ($profil === false) {
    header('Location: '. $page->getLink($page->getHomepageId()));
}
$userItem = new UserItem($profil->_id);

$weapon = $userItem->getItemById($profil->_weapon, $page->_language);
$stock = $userItem->getItemById($profil->_stock, $page->_language);
$harness = $userItem->getItemById($profil->_harness, $page->_language);
$diopter = $userItem->getItemById($profil->_diopter, $page->_language);
$buttPlate = $userItem->getItemById($user->_buttPlate, $page->_language);