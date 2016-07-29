<?php
$html->addToJs(URL_PATH . '/js/shop.js');
$profil = new Profil();
$profil = $profil->getUserInfo($user->_id);
$userItem = new UserItem($profil['id']);
$shops = new Shop();