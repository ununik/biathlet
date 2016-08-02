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


echo 'Thank you for shopping.';