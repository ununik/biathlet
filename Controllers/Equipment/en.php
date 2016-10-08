<?php
$equipmentId = $page->getSpecialValue(1);

$userItem = new UserItem(0);
$equipment = $userItem->getItemById($equipmentId, $page->_language);
$producer = $userItem->getProducer($equipment['producer'], $page->_language);
$category = $userItem->getCategory($equipment['categoryInShop'], $page->_language);