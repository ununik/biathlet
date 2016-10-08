<?php
$html->addToJs(URL_PATH . '/js/profil.js');
$profil = new Profil();
$profil = $profil->getUserInfo($user->_id);
$userItem = new UserItem($profil['id']);
$shops = new Shop();
$weapon = $userItem->getItemById($user->_weapon, $page->_language);
$stock = $userItem->getItemById($user->_stock, $page->_language);
$harness = $userItem->getItemById($user->_harness, $page->_language);
$diopter = $userItem->getItemById($user->_diopter, $page->_language);
$buttPlate = $userItem->getItemById($user->_buttPlate, $page->_language);
$bestCartridgeId = $userItem->getBestCartridgesForUser($user->_id, 'en');
$bestCartridge = $userItem->getItemById($bestCartridgeId, $page->_language);

$flag = '';
if ($profil['country'] != 0) {
    $country = Country::getFlag($profil['country']);
    $flag = ' <div class="flag_name" style="background-image: url('.URL_PATH . $country['flag'].')"></div>';
}