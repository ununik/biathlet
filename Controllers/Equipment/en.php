<?php
$userItem = new UserItem(0);
$equipment = $userItem->getItemById($_GET['id'], $page->_language);
echo $equipment['producer'];
$producer = $userItem->getProducer($equipment['producer'], $page->_language);
$category = $userItem->getCategory($equipment['categoryInShop'], $page->_language);