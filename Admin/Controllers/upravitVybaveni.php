<?php
$language = $_GET['language'];
$id = $_GET['id'];
$equipmentClass = new EquipmentAdmin();
if (isset($_GET['new']) && $_GET['new'] == 'true') {
    if (!$equipmentClass->issetTranslationForItem($id, $language)) {
        $equipmentClass->copyRowAndDeactiveNew($id, $language);
    }
}

if (isset($_POST['save'])) {
    $forAll = array();
    $forLanguage = array();
    
    $forLanguage['title'] = $_POST['title'];
    $forAll['categoryInShop'] = $_POST['category'];
    $forAll['accuracy'] = $_POST['accuracy'];
    $forAll['legPower'] = $_POST['legPower'];
    $forAll['handPower'] = $_POST['handPower'];
    $forAll['endurance'] = $_POST['endurance'];
    $forAll['stability'] = $_POST['stability'];
    if (isset($_POST['active'])) {
        $forLanguage['active'] = 1;
    } else {
        $forLanguage['active'] = 0;
    }
    
    $equipmentClass->saveForAll($id, $forAll);
    $equipmentClass->saveForLanguage($id, $language, $forLanguage);
}

$item = $equipmentClass->getItem($id, $language);
$categories = $equipmentClass->getAllCategories();
$itemActive = '';
if ($item['active'] == 1) {
    $itemActive = 'checked';
}