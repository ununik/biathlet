<?php
$language = 'en';
define ('HOME_DIR', $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/biathlete');
session_start();
if (!isset($_SESSION['biathlete_user']) || $_SESSION['biathlete_user'] == '') {
    die();
}

require HOME_DIR . '/autoloading.php';

$user = new User($_SESSION['biathlete_user']);
$shop = new Shop();
$item = $shop->getItemFromShop($_POST['id']);

if ($user->_money < $item['price']) {
    echo 'Not enough money!';
    return;
}

$user->setMoney($user->_money - $item['price']);
$userItem = new UserItem($user->_id);
$userItem->newItemForUser($item['equipment']);
$equipment = $userItem->getItemById($item['equipment'], $language);
$bank = new Bank($user->_id);
$bank->addNewEntry($user->_id, 0-$item['price'], 'Shop - '.$equipment['title']);


echo 'Thank you for shopping.';