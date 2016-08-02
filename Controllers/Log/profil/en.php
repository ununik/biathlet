<?php
$html->addToJs(URL_PATH . '/js/profil.js');
$profil = new Profil();
$profil = $profil->getUserInfo($user->_id);
$userItem = new UserItem($profil['id']);
$shops = new Shop();
$weapon = $userItem->getItemById($user->_weapon, $page->_language);
$stock = $userItem->getItemById($user->_stock, $page->_language);
$harness = $userItem->getItemById($user->_harness, $page->_language);