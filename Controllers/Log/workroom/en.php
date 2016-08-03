<?php
$html->addToJs(URL_PATH . '/js/profil.js');
$userItem = new UserItem($user->_id);
$weapon = $userItem->getItemById($user->_weapon, $page->_language);
$stock = $userItem->getItemById($user->_stock, $page->_language);
$harness = $userItem->getItemById($user->_harness, $page->_language);
$diopter = $userItem->getItemById($user->_diopter, $page->_language);
$buttPlate = $userItem->getItemById($user->_buttPlate, $page->_language);